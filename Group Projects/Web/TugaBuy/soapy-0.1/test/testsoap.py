# testwsdl.py
# $Version$
#
# This is a script which runs a variety of web services (found on http://www.xmethods.com/)
# and outputs results.  Some of these services may occasionally be unavailable.

import soap

# Internet Time
proxy = soap.get_proxy('http://www.lemurlabs.com/projects/soap/itime/ITimeService.wsdl')
print "Internet Time test:",proxy.getInternetTime()

# Temperature
proxy = soap.get_proxy('http://www.xmethods.net/sd/TemperatureService.wsdl')
print "Temperature test:",proxy.getTemp(zipcode='94303')

# Algebraic calculator
proxy = soap.get_proxy('http://www.itfinity.net/soap/Calculator/Calculator.wsdl')
ex = '20*30+(sin(189))'
result = proxy.Evaluate(Expression=ex)
print "Algebraic calculator test:",result

# Babelfish test
proxy = soap.get_proxy('http://www.xmethods.net/sd/BabelFishService.wsdl')
print "Babelfish test:",proxy.BabelFish(translationmode='de_en',sourcedata='Ich bin ein Berlinerpfannkuchen!')

# Date calc test
proxy = soap.get_proxy('http://sal006.salnetwork.com:83/freevbcode/datefunctions/ccalcdates.xml')
print "Date calc test:",proxy.DatePreviousMonday(RelativeTo="4/26/01")

# Whois test #1
proxy = soap.get_proxy('http://soap.4s4c.com/whois/soap.asp?WSDL')
print "whois test 1:",proxy.whois(name='sinisterdexter.org')

# Whois test #2
proxy = soap.get_proxy('http://www.SoapClient.com/xml/SQLDataSoap.WSDL')
result = proxy.ProcessSRL(SRLFile='WHOIS.SRI',RequestName='whois',key='sinisterdexter.org')
print "whois test 2:",result

# SDL: Breaking News service
proxy = soap.get_proxy('http://aspx.securewebs.com/prasadv/BreakingNewsService.asmx?SDL','sdl')
result = proxy.GetCNNNews()
print "Breaking news test:",result

# FAILS 4/23/01 -- schema parsing issue
#proxy = soap.get_proxy('http://www.xmethods.net/sd/XMethodsListingsService.wsdl')
#result = proxy.getAllSOAPServices()
#print "SOAP Service listing test:",result
