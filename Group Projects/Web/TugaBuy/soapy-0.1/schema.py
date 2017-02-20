import string, time, re
import base64
from types import *


# Representations of XML Schema types
# Standard base type namespace
NS_XSD = "http://www.w3.org/1999/XMLSchema"
NS_XSD102K = "http://www.w3.org/2000/10/XMLSchema"
# Standard namespace namespace
NS_XMLNS = "http://www.w3.org/2000/xmlns/"
# Standard encoding namespace
NS_ENC = "http://schemas.xmlsoap.org/soap/encoding/"
# Pythonware "lab" namespace
NS_LAB = "http://www.pythonware.com/soap/"

# For python 1.5.2 compatibility
try:
	unicode_type = UnicodeType
except:
	unicode_type = None

class ComplexType:
	"""Represents an XML Schema 'complex' type, which is a struct made up of simple types."""

	def __init__(self, name, namespace, items=None):
		self.name = name
		self.namespace = namespace
		self.members = {}
		if items is not None:
			for key in items.keys():
				self.members[key] = items[key]

	def addMember(self, namespace, name, type):
		self.members[name] = type

	def checkType(self, input):
		for key in self.members.keys():
			self.members[key].checkType(input[key])

	def writeXml(self, out, paramname, input, nscount):
		"""Writes the XML for this type to the output.  Returns the input
		nscount plus 1 since it uses this namespace."""
		out.write('<' + paramname + ' xsi:type="q' +
				  str(nscount) + ':' +
				  self.name + '" xmlns:q' + str(nscount) + '="' +
				  self.namespace + '">')
		nscount = nscount + 1
		for k in input.keys():
			paramtype = self.members[k]
			nscount = paramtype.writeXml(out,k,input[k],nscount)
		out.write('</' + paramname + '>\n')
		return nscount + 1

	def getObject(self, nodes):
		"""Given a DOM node representing an element with this type,
		parse out the data representing this type and return as a
		Python dict."""
		
		obj = {}
		node = nodes[0] # not an array type, so we assume only one
		for member_key in self.members.keys():
			ctype = self.members[member_key]
			cnodes = filter(eval('lambda x: (is_element_node(x) and x.tagName == "' + member_key + '")'), node.childNodes)
			if len(cnodes) > 0:
				obj[member_key] = ctype.getObject(cnodes)
		return obj

class ArrayType:
	"""Represents a type which is actually another type which may occur
	multiple times."""

	def __init__(self, actualtype, min=0, max=None):
		self.actualtype = actualtype
		if (type(actualtype) is not StringType and
			type(actualtype) is not unicode_type):
			self.setType(actualtype)
		self.min = min
		self.max = max

	def setType(self, actualtype):
		self.actualtype = actualtype
		self.name = actualtype.name
		self.namespace = actualtype.namespace
		self.members = actualtype.members

	def checkType(self, input):
		for item in input:
			self.actualtype.checkType(item)

	def writeXml(self, out, paramname, input, nscount):
		for item in input:
			self.actualtype.writeXml(out, paramname, item, nscount)
			nscount = nscount + 1
		return nscount

	def getObject(self, nodes):
		"""Given a DOM node representing an element with this type,
		parse out the data representing this type and return as a
		Python dict."""
		
		result = []
		for node in nodes:
			result.append(self.actualtype.getObject([node]))
		return result

class SimpleType:
	"""Represents an XML Schema 'simple' type, which is derived from a base
	type.  It may be an enumerated type."""
	trans_dispatch = {}
	python_types = {}
	
	def __init__(self, name, namespace, base_type=None, base_namespace=None, encoding=None):
		self.name = name
		self.namespace = namespace
		self.base_type = base_type
		self.base_namespace = base_namespace
		self.encoding = encoding
		if base_namespace is None or base_type is None:
			self.base_namespace = namespace
			self.base_type = name

		self.enumeration = None

	def addEnumElement(self, element):
		if self.enumeration is None:
			self.enumeration = []
		self.enumeration.append(element)

	# this isn't really meaningful for most types
	def set_encoding(self, encoding):
		self.encoding = encoding

	# FIXME: the below doesn't work with non-simple types like binary
	def checkType(self, input):
		if not (type(input).__name__ ==
				self.python_types[self.base_namespace + self.base_type]):
			raise TypeError(input + " does not match type " + self.name)

		if self.enumeration is not None:
			if input not in self.enumeration:
				raise TypeError(input + " is not in the enumeration list for " + self.name)

	def getObject(self, nodes):
		"""Given a DOM node representing an element with this type,
		parse out the data representing this type and return as a
		simple type."""

		data = []
		node = nodes[0] # not an array type, so we assume only one
		for cnode in node.childNodes:
			if (cnode.nodeType == xml.dom.Node.TEXT_NODE or
				cnode.nodeType == xml.dom.Node.CDATA_SECTION_NODE):
				data.append(cnode.data)
		return self.translate(data)

	def writeXml(self, out, paramname, input, nscount):
		"""Writes the XML for this type to the output.  Returns the input
		nscount plus 1 since it uses this namespace."""
		out.write('<' + paramname + ' xsi:type="q' +
				  str(nscount) + ':' +
				  self.name + '" xmlns:q' + str(nscount) + '="' +
				  self.namespace + '">')
		out.write(str(input))
		out.write('</' + paramname + '>\n')
		return nscount + 1


	def translate(self, input):
		"""Translates the input to the appropriate Python type.  Input
		is a list of strings."""
		
		f = self.trans_dispatch[self.base_namespace + self.base_type]
		return f(self,input)

	def translate_int(self, input):
		return int(string.join(input,""))
	trans_dispatch[NS_XSD + 'int'] = translate_int
	trans_dispatch[NS_XSD + 'byte'] = translate_int
	trans_dispatch[NS_XSD + 'unsignedByte'] = translate_int
	trans_dispatch[NS_XSD + 'short'] = translate_int
	trans_dispatch[NS_XSD + 'unsignedShort'] = translate_int
	trans_dispatch[NS_XSD + 'long'] = translate_int
	python_types[NS_XSD + 'int'] = 'int'
	python_types[NS_XSD + 'byte'] = 'int'
	python_types[NS_XSD + 'unsignedByte'] = 'int'
	python_types[NS_XSD + 'short'] = 'int'
	python_types[NS_XSD + 'unsignedShort'] = 'int'
	python_types[NS_XSD + 'long'] = 'int'

	def translate_str(self, input):
		try:
			ustr = unicode(string.join(input,""))
			return ustr.encode('latin-1')
		except: 		# Python 1.5.2 compatibility
			return string.join(input,"")
	trans_dispatch[NS_XSD + 'string'] = translate_str
	python_types[NS_XSD + 'string'] = 'string'

	def translate_long(self, input):
		return long(string.join(input,""))
	trans_dispatch[NS_XSD + 'integer'] = translate_long
	trans_dispatch[NS_XSD + 'unsignedInt'] = translate_long
	trans_dispatch[NS_XSD + 'unsignedLong'] = translate_long
	python_types[NS_XSD + 'integer'] = 'long'
	python_types[NS_XSD + 'unsignedInt'] = 'long'
	python_types[NS_XSD + 'unsignedLong'] = 'long'

	def translate_float(self, input):
		return float(string.join(input,""))
	trans_dispatch[NS_XSD + 'double'] = translate_float
	trans_dispatch[NS_XSD + 'float'] = translate_float
	python_types[NS_XSD + 'double'] = 'float'
	python_types[NS_XSD + 'float'] = 'float'

	def translate_binary(self, input):
		if self.encoding == 'base64':
			return base64.decodestring(string.join(input,""))
	trans_dispatch[NS_XSD + 'binary'] = translate_binary
	python_types[NS_XSD + 'binary'] = 'string'


class BooleanType(SimpleType):
	"""Represents a SOAP boolean type"""

	def __init__(self, namespace='http://www.w3.org/1999/XMLSchema', name='boolean'):
		SimpleType.__init__(self, name, namespace)

	def checkType(self, input):
		"""For input, we only accept integers, either 1 or 0"""
		if input != 1 and input != 0:
			raise TypeError(str(input) + " must be either 1 or 0.")

	def translate(self, input):
		if type(input) is not TupleType:
			return not not input # force to a boolean
		else:
			return not not input[0]

class DateTimeType(SimpleType):
	"""Represents a SOAP date/time type"""

	def __init__(self, name, namespace='http://www.w3.org/1999/XMLSchema'):
		SimpleType.__init__(self, name, namespace)

	#FIXME: Implement this later
	def checkType(self, input):
		pass

	#FIXME: how should this work?
	def translate(self, input):
		return string.join(input,"")

SIMPLE_TYPES_BASE = {'int': SimpleType('int', NS_XSD),
					 'byte': SimpleType('byte',NS_XSD),
					 'unsignedByte': SimpleType('unsignedByte',NS_XSD),
					 'short': SimpleType('short',NS_XSD),
					 'unsignedShort': SimpleType('unsignedShort',NS_XSD),
					 'long': SimpleType('long',NS_XSD),
					 'string': SimpleType('string',NS_XSD),
					 'integer': SimpleType('integer',NS_XSD),
					 'unsignedInt': SimpleType('unsignedInt',NS_XSD),
					 'unsignedLong': SimpleType('unsignedLong',NS_XSD),
					 'double': SimpleType('double',NS_XSD),
					 'float': SimpleType('float',NS_XSD),
					 'binary': SimpleType('binary',NS_XSD),
					 'bin.base64': SimpleType('binary',NS_XSD,encoding='base64'),
					 'boolean': BooleanType(),
					 'timeInstant': DateTimeType('timeInstant'),
					 'timePeriod': DateTimeType('timePeriod')}

SIMPLE_TYPES={}
for key in SIMPLE_TYPES_BASE.keys():
	SIMPLE_TYPES[NS_XSD + key] = SIMPLE_TYPES_BASE[key]
	SIMPLE_TYPES[NS_XSD102K + key] = SIMPLE_TYPES_BASE[key]

import xml.dom
def is_element_node(node):
	return node.nodeType == xml.dom.Node.ELEMENT_NODE

class XMLSchema:
	"""Initializes from a DOM object representing an XML schema, which
	may include multiple inclusions of external schema files (which
	are recursively parsed).

	Has two primary lists: elements, which are most likely message
	types which are accessed by the SDL, and actual named types.
	These are stored as dictionaries keyed by name."""

	def __init__(self, schemaobjs, targetns='', namespaces={}):
		"""Takes a target namespace, a DOM object representing the schema,
		and an optional set of namespaces."""
		self.targetns = targetns
		self.schemaobjs = schemaobjs
		self.namespaces = namespaces

		self.types = SIMPLE_TYPES.copy()
		self.elements = {}

		for schemaobj in schemaobjs:
			self.__load_named_types(schemaobj)
			self.__load_elements(schemaobj)
			self.__load_includes(schemaobj)

	def getType(self, typeName):
		"""Given a type name which may or may not include a
		fully-qualified namespace, return a type.  If a type
		can't be found, we'll try with the local target namespace
		and finally the default namespace."""

		if self.types.has_key(typeName):
			return self.types[typeName]
		elif self.types.has_key(self.targetns + typeName):
			return self.types[self.targetns + typeName]
		elif self.types.has_key(NS_XSD + typeName):
			return self.types[NS_XSD + typeName]

	def getObject(self, domobj, element_name, type=None):
		"""Given a DOM object representing a parsed XML document and
		an element which must exist at the top level of the schema,
		return a list of Python objects, each one representing the
		type for that element and each one containing the data in an
		instance of that data in the document object.  Complex types are
		represented as 'XMLObject' objects so that their attributes
		are directly accessible; simple types are represented by their
		Python equivalents in most cases.  Arrays are represented as
		lists.  If type is provided it is used, otherwise we assume
		that the element has a type listed in the schema."""

		if type is None:
			type = self.elements[element_name]

		nodes = domobj.getElementsByTagName(element_name)
		obj = type.get_object(nodes)

		return objs
	
	def __load_named_types(self, schemaobj):
		# Load the single types
		typenodes = schemaobj.getElementsByTagName('simpleType')
		typenodes = filter(lambda x: x.getAttributeNS('','name') != '',
							 typenodes)
		simple_types = self.__get_simple_types(typenodes)
		self.types.update(simple_types)

		# Get a first pass of complex types
		typenodes = schemaobj.getElementsByTagName('complexType')
		typenodes = filter(lambda x: x.getAttributeNS('','name') != '',
							 typenodes)
		complex_types = self.__get_complex_types(typenodes)
		self.types.update(complex_types)

		# and then do it again so that we make sure to pick up any types whose definitions
		# are found after they are actually used.  Since we're doing dictionaries keyed
		# by namespace + name, we avoid duplication.
		typenodes = schemaobj.getElementsByTagName('complexType')
		typenodes = filter(lambda x: x.getAttributeNS('','name') != '',
							 typenodes)
		complex_types = self.__get_complex_types(typenodes)
		self.types.update(complex_types)

	def __load_elements(self, schemaobj):
		elementnodes = filter(is_element_node, schemaobj.childNodes)
		elementnodes = filter(lambda x: x.tagName == 'element', elementnodes)
		for node in elementnodes:
			name, type = self.__parse_element(node)
			self.elements[self.targetns + name] = type
		
	def __load_includes(self, schemaobj):
		pass
	
	def __get_simple_types(self, typenodes):
		"""From a set of nodes representing named 'simpleType' nodes in an XML
		schema doc, return a dictionary mapping names to SimpleType objects."""

		simple_types = {}
		for node in typenodes:
			name, type = self.__parse_simple_type(node)
			simple_types[name] = type

		return simple_types

	def __parse_simple_type(self, node):
		name = node.getAttributeNS('','name')
		base = node.getAttributeNS('','base')
		basens = None
		if ':' in base:
			basens = base[:string.index(base,":")]
			basens = node.getAttributeNS(NS_XMLNS, basens)
			base = base[string.index(base,":") + 1:]
		type = SimpleType(name, self.targetns, base, basens)
		enumnodes = node.getElementsByTagName('enumeration')
		for enumnode in enumnodes:
			type.addEnumElement(enumnode.getAttributeNS('','value'))
		encodingnodes = node.getElementsByTagName('encoding')
		for encodingnode in encodingnodes:
			type.set_encoding(encodingnode.getAttributeNS('','value'))
		return type.namespace + type.name, type

	def __get_complex_types(self, typenodes):
		"""From a set of nodes representing named 'complexType' nodes in an XML
		schema doc, return a dictionary mapping names to ComplexType
		objects."""

		complex_types = {}
		for node in typenodes:
			name, type = self.__parse_complex_type(node)
			complex_types[name] = type

		return complex_types
	
	def __parse_complex_type(self, node):
		name = node.getAttributeNS('','name')
		type = ComplexType(name, self.targetns)

		# we only support complex types with type 'all' for the moment
		anodes = filter(is_element_node, node.childNodes)
		anodes = filter(lambda x: x.tagName == 'all', anodes)
		for anode in anodes:
			element_nodes = filter(is_element_node,anode.childNodes)
			element_nodes = filter(lambda x: x.tagName == 'element',
								   element_nodes)
			for enode in element_nodes:
				ename, etype = self.__parse_element(enode)
				type.addMember(self.targetns, ename, etype)
		return type.namespace + type.name, type

	def __parse_element(self, node):
		name = node.getAttributeNS('','name')
		typename = node.getAttributeNS('','type')
		typens = None
		type = None
		if (typename == '' and len(node.childNodes) > 0):
			# We probably have an embedded complexType, try that first
			typenodes = filter(is_element_node, node.childNodes)
			typenodes = filter(lambda x: x.tagName == 'complexType',
							  typenodes)
			if len(typenodes) > 0:
				ignore, type = self.__parse_complex_type(typenodes[0])
			else: # Maybe an embedded simpleType
				typenodes = filter(is_element_node, node.childNodes)
				typenodes = filter(lambda x: x.tagName == 'simpleType',
								   typenodes)
				if len(typenodes) > 0:
					ignore, type = self.__parse_simple_type(typenodes[0])
		else:
			# try to get the typename from 
			if ':' in typename:
				typenskey = typename[:string.index(typename,':')]
				typename = typename[string.index(typename,':')+1:]

				typens = node.getAttributeNS(NS_XMLNS, typenskey)
				if typens is None or typens == '':
					if self.namespaces.has_key(typenskey):
						typens = self.namespaces[typenskey]
					else:
						typens = ''

			if self.types.has_key(typens + typename):
				type = self.types[typens + typename]
			else:
				type = typens + typename

		# Handle arrays
		if node.getAttributeNS('','minOccurs') != '':
			min = int(node.getAttributeNS('','minOccurs'))
			max = node.getAttributeNS('','maxOccurs')
			if max == 'unbounded':
				max = None
			else:
				max = int(max)
			type = ArrayType(type, min, max)
		
		return name, type
