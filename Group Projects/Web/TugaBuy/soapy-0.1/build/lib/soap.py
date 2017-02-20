import string, time, re
import urllib, httplib
from types import *
from cgi import escape
from StringIO import StringIO
import xmllib

from schema import *

# Standard base type namespace
NS_XSD = "http://www.w3.org/1999/XMLSchema"
# Standard namespace namespace
NS_XMLNS = "http://www.w3.org/2000/xmlns/"
# Standard encoding namespace
NS_ENC = "http://schemas.xmlsoap.org/soap/encoding/"
# Pythonware "lab" namespace
NS_LAB = "http://www.pythonware.com/soap/"

NAMESPACES = {"http://www.w3.org/1999/XMLSchema": "xsd",
#			  "http://www.w3.org/1999/XMLSchema/instance/": "xsi",
			  "http://www.w3.org/1999/XMLSchema-instance": "xsi",
			  "http://schemas.xmlsoap.org/soap/envelope/": "soap",
#			  "http://schemas.xmlsoap.org/soap/encoding/": "enc",
			  "http://www.pythonware.com/soap/": "lab"}

# check if a string is valid XML tag
_is_valid_tag = re.compile("^[a-zA-Z_][-a-zA-Z0-9._]*$").match

# version
__version__ = '0.1'
# user agent
__user_agent__ = 'soap.py/%s (Reef SOAP)' % __version__

from xml.dom.ext.reader import PyExpat
import xml.dom
def parseFromUri(uri):
	reader = PyExpat.Reader()
	return reader.fromUri(uri)

def parseFromString(string):
	reader = PyExpat.Reader()
	return reader.fromString(string)

try:
	ignore = httplib.HTTPConnection
	def request(protocol, host, uri_path, soap_action, request_body):
		"""Executes a request to the SOAP server"""
		
		h = None
		if (protocol == 'https'):
			h = httplib.HTTPSConnection(host)
		else:
			h = httplib.HTTPConnection(host)
		#	h.set_debuglevel(1)
		h.putrequest("POST", uri_path)
		h.putheader("User-Agent", __user_agent__)
		h.putheader("Content-Type", "text/xml")
		h.putheader("Content-Length", str(len(request_body)))
		if soap_action != '':
			h.putheader("SOAPAction", soap_action)
		h.endheaders()

		h.send(request_body)

		# Kludge to handle spurious "100 Continue" responses from IIS
		response = None
		while 1:
			response = h.getresponse()
			if response.status != 100:
				break
			h._HTTPConnection__state = httplib._CS_REQ_SENT
			h._HTTPConnection__response = None
			
		return response
except:
	def request(protocol, host, uri_path, soap_action, request_body):
		"""Executes a request to the SOAP server"""
		
		h = None
		if (protocol == 'https'):
			print ("Python 1.x can't do HTTPS, sorry")
			system.exit(1)
		else:
			h = httplib.HTTP(host)
		#	h.set_debuglevel(1)
		h.putrequest("POST", uri_path)
		h.putheader("User-Agent", __user_agent__)
		h.putheader("Content-Type", "text/xml")
		h.putheader("Content-Length", str(len(request_body)))
		if soap_action != '':
			h.putheader("SOAPAction", soap_action)
		h.endheaders()

		h.send(request_body)

		# Kludge to handle spurious "100 Continue" responses from IIS
		while 1:
			replycode, message, headers = h.getreply()
			if replycode != 100:
				break
			
		return h.getfile()
		

class Method:
	"""
	Represents a SOAP/WSDL Method.  Includes the method name, the
	endpoint (i.e. the URL which this method calls to execute), the
	namespace for the method, the 'SOAP action' which should be sent
	in the HTTP 'SOAPAction:' header, and the name and type of all
	input and output parameters for the method.
	"""
	def __init__(self, name, endpoint, req_namespace="", res_namespace="",
				 soap_action="", ns_in_method_call=1):
		self.name = name
		self.endpoint = endpoint
		self.req_namespace = req_namespace
		self.res_namespace = res_namespace
		self.soap_action = soap_action
		self.all_namespaces = NAMESPACES.copy()
		self.params = {}
		self.nscount = 0
		self.response_name = None
		self.response_type = None
		self.ns_in_method_call = ns_in_method_call

	def setResponseName(self, name):
		"""Set this string as the response name for this method."""
		self.response_name = name

	def setResponseType(self, type):
		"""Set this type as the response type for this method."""
		self.response_type = type

	def addParam(self, name, type):
		"Add an input parameter with the given parameter name and type"
		self.params[name] = type
		if not (self.all_namespaces.has_key(type.namespace)):
			self.all_namespaces[type.namespace] = "s%d" % (self.nscount)
			self.nscount = self.nscount + 1

	def setRequestType(self, type):
		"""Add all the members of this type as request params for this
		method."""

		for key in type.members.keys():
			self.addParam(key,type.members[key])


	def checkParams(self, args):
		"""Check a dictionary containing argument names and values against
		the types listed for those input parameters.  Raises a TypeError
		exception if any of the types are not of the right type."""

		for k in args.keys():
			self.params[k].checkType(args[k]) # raises exception if not valid
		return 1

	def writeCallXml(self, out, args):
		"""Outputs XML to the output stream identified by 'out'
		representing a SOAP call to this method with the given
		dictionary containing argument names and values."""

		if self.ns_in_method_call:
			xmlns = 'xmlns:ns1'
			nsprefix = 'ns1:'
		else:
			xmlns = 'xmlns'
			nsprefix = ''

		out.write('<?xml version="1.0"?>\n')
		out.write('<soap:Envelope')
		#out.write(' soap:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"')
		for namespace in self.all_namespaces.keys():
			out.write(' xmlns:' + self.all_namespaces[namespace] +
					  '="' + namespace + '"')
		out.write('>\n')
		out.write('<soap:Body>\n')
		out.write('<' + nsprefix + self.name)
		if not (self.req_namespace is None):
			out.write(' ' + xmlns + '="' + self.req_namespace + '"')
		out.write('>\n')
		nscount = 0
		for k in args.keys():
			paramtype = self.params[k]
			nscount = paramtype.writeXml(out,k,args[k],nscount)
		out.write('</' + nsprefix + self.name + '>\n')
		out.write('</soap:Body>\n')
		out.write('</soap:Envelope>')

	def __call__(self, *pargs, **kwargs):
		buf = StringIO()
		self.checkParams(kwargs)
		self.writeCallXml(buf,kwargs)

		url = self.endpoint
		protocol, uri = urllib.splittype(url)
		host, uri_path = urllib.splithost(uri)
		request_body = buf.getvalue()
		#print "Request:",request_body
		response = request(protocol, host, uri_path, self.soap_action,
						   request_body)
		responsetext = response.read()
		#print "Response:",responsetext
		responseobj = parseFromString(responsetext)
		if self.res_namespace is not None:
			nodes = responseobj.getElementsByTagNameNS(self.res_namespace,
													   self.response_name)
		else:
			nodes = responseobj.getElementsByTagName(self.response_name)
		if (len(nodes) == 0):
			return None

		result = self.response_type.getObject(nodes)
		keys = result.keys()
		if len(keys) == 1:
			return result[keys[0]]
		else:
			return result

def get_proxy(uri, filetype='wsdl'):
	if filetype == 'wsdl':
		return WSDLProxy(uri)
	elif filetype == 'sdl':
		return SDLProxy(uri)

class SOAPProxy:
	def __init__(self):
		self.methods = {}
		self.namespaces = {}

	def __getattr__(self, name):
		# Magic to make methods appear like real methods
		return self.methods[name]

	def parse_namespace(self, str):
		ns = ''
		if (':' in str):
			nskey = str[:string.index(str,':')]
			if self.namespaces.has_key(nskey):
				ns = self.namespaces[nskey]
			elif nskey == 'tns': # is this a bug or a feature?
				ns = self.targetns
			str = str[string.index(str,':')+1:]
		return ns, str

	def load_namespaces(self, node):
		self.targetns = node.getAttributeNS('','targetNamespace')
		for attrns, attrkey in node.attributes.keys():
			if attrns == NS_XMLNS:
				self.namespaces[attrkey] = node.attributes[(attrns,attrkey)].value


class WSDLProxy(SOAPProxy):
	def __init__(self, uri, ns_in_method_call=1):
		SOAPProxy.__init__(self)
		self.ns_in_method_call = ns_in_method_call
		domobj = parseFromUri(uri)

		nodes = domobj.getElementsByTagName('definitions')
		if len(nodes) == 0:
			print "Couldn't find definitions tag!"
			sys.exit(1)

		descnode = nodes[0]
		self.load_namespaces(descnode)

		schemanodes = domobj.getElementsByTagName('schema')
		self.schema = XMLSchema(schemanodes, self.targetns, self.namespaces)

		self.messages = {}
		self.porttypes = {}
		self.bindings = {}

		self._load_messages(domobj)
		self._load_porttypes(domobj)
		self._load_bindings(domobj)


		servicenodes = domobj.getElementsByTagName('service')
		for servicenode in servicenodes:
			self.name = servicenode.getAttributeNS('','name')
			self._get_methods(servicenode)
		
	def _load_messages(self, domobj):
		messagenodes = domobj.getElementsByTagName('message')
		for messagenode in messagenodes:
			name = messagenode.getAttributeNS('','name')
			message = ComplexType(name, self.targetns)
			partnodes = messagenode.getElementsByTagName('part')
			for partnode in partnodes:
				pname = partnode.getAttributeNS('','name')
				element = partnode.getAttributeNS('','element')
				if element != '':
					ens, ename = self.parse_namespace(element)
					type = self.schema.elements[ens + ename]
				else:
					typename = partnode.getAttributeNS('','type')
					tns, tname = self.parse_namespace(typename)
					type = self.schema.getType(tns + tname)
				message.addMember(self.targetns, pname, type)
			self.messages[self.targetns + name] = message

	def _load_porttypes(self, domobj):
		porttypenodes = domobj.getElementsByTagName('portType')
		for pnode in porttypenodes:
			pname = self.targetns + pnode.getAttributeNS('','name')
			porttype = {}
			opernodes = pnode.getElementsByTagName('operation')
			for onode in opernodes:
				oname = onode.getAttributeNS('','name')
				operation = {}
				innodes = onode.getElementsByTagName('input')
				for innode in innodes:
					mname = innode.getAttributeNS('','message')
					mns = self.targetns
					if ':' in mname:
						mns, mname = self.parse_namespace(mname)
					if mname != '':
						operation['input'] = self.messages[mns + mname]
					else:
						operation['input'] = innode.getAttributeNS('','name')
				outnodes = onode.getElementsByTagName('output')
				for outnode in outnodes:
					mname = outnode.getAttributeNS('','message')
					mns = self.targetns
					if ':' in mname:
						mns, mname = self.parse_namespace(mname)
					if mname != '':
						operation['output'] = self.messages[mns + mname]
						operation['output_name'] = mname
					else:
						operation['output'] = outnode.getAttributeNS('','name')
						operation['output_name'] = outnode.getAttributeNS('','name')
				porttype[oname] = operation
			self.porttypes[pname] = porttype

	def _load_bindings(self, domobj):
		bindingnodes = domobj.getElementsByTagName('binding')
		for bnode in bindingnodes:
			bname = self.targetns + bnode.getAttributeNS('','name')
			binding = {}
			bporttypename = bnode.getAttributeNS('','type')
			bpns, bporttypename = self.parse_namespace(bporttypename)
			binding['porttype'] = self.porttypes[bpns + bporttypename]
			opernodes = bnode.getElementsByTagName('operation')
			for onode in opernodes:
				oname = onode.getAttributeNS('','name')
				binding[oname] = {}
				sonodes = onode.getElementsByTagName('soap:operation')
				binding[oname]['soapAction'] = sonodes[0].getAttributeNS('','soapAction')
				innodes = onode.getElementsByTagName('input')
				if len(innodes) > 0:
					innode = innodes[0]
					bodynodes = innode.getElementsByTagName('soap:body')
					if len(bodynodes) > 0:
						namespace = bodynodes[0].getAttributeNS('','namespace')
						binding[oname]['req_namespace'] = namespace
				outnodes = onode.getElementsByTagName('output')
				if len(outnodes) > 0:
					outnode = outnodes[0]
					bodynodes = outnode.getElementsByTagName('soap:body')
					if len(bodynodes) > 0:
						namespace = bodynodes[0].getAttributeNS('','namespace')
						binding[oname]['res_namespace'] = namespace
			self.bindings[bname] = binding

	def _get_methods(self, servicenode):
		pnodes = servicenode.getElementsByTagName('port')
		for pnode in pnodes:
			pname = pnode.getAttributeNS('','name')
			pbinding = pnode.getAttributeNS('','binding')
			pbns, pbinding = self.parse_namespace(pbinding)
			addressnodes = pnode.getElementsByTagName('soap:address')
			endpoint = addressnodes[0].getAttributeNS('','location')
		
			binding = self.bindings[pbns + pbinding]
			porttype = binding['porttype']

			for method_name in porttype.keys():
				soap_action = binding[method_name]['soapAction']
				if binding[method_name].has_key('req_namespace'):
					req_ns = binding[method_name]['req_namespace']
				else:
					req_ns = self.targetns
				if binding[method_name].has_key('res_namespace'):
					res_ns = binding[method_name]['res_namespace']
				else:
					res_ns = self.targetns
				method = Method(method_name, endpoint, req_ns, res_ns, soap_action)
				method.setRequestType(porttype[method_name]['input'])
				method.setResponseType(porttype[method_name]['output'])
				method.setResponseName(porttype[method_name]['output_name'])
				self.methods[method_name] = method
			
class SDLProxy(SOAPProxy):
	def __init__(self, uri, ns_in_method_call=0):
		SOAPProxy.__init__(self)
		self.domobj = parseFromUri(uri)
		self.ns_in_method_call = ns_in_method_call
		nodes = self.domobj.getElementsByTagName('serviceDescription')
		if len(nodes) == 0:
			print "Couldn't find serviceDescription tag!"
			sys.exit(1)

		descnode = nodes[0]
		self.load_namespaces(descnode)
		self.name = descnode.getAttributeNS('','name')

		schemanodes = self.domobj.getElementsByTagName('schema')
		self.schema = XMLSchema(schemanodes, self.targetns, self.namespaces)

		soapnodes = self.domobj.getElementsByTagName('soap')
		for soapnode in soapnodes:
			addrnodes = soapnode.getElementsByTagName('address')
			endpoint = addrnodes[0].getAttributeNS('','uri')
			methodnodes = soapnode.getElementsByTagName('requestResponse')
			self.get_methods(endpoint, self.targetns, methodnodes)

	def get_methods(self, endpoint, namespace, methodnodes):
		for node in methodnodes:
			name = node.getAttributeNS('','name')
			soap_action = node.getAttributeNS('','soapAction')
			method = Method(name, endpoint, namespace, namespace,
							soap_action, ns_in_method_call=self.ns_in_method_call)
			for reqnode in node.getElementsByTagName('request'):
				typens, typename = self.parse_namespace(reqnode.getAttributeNS('','ref'))
				method.setRequestType(self.schema.elements[typens + typename])
			for resnode in node.getElementsByTagName('response'):
				typens, typename = self.parse_namespace(resnode.getAttributeNS('','ref'))
				method.setResponseType(self.schema.elements[typens + typename])
				method.setResponseName(typename)
			self.methods[name] = method
