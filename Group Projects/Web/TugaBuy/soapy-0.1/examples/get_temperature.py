#!/usr/bin/env python

# Uses the XMethods temperature service.  Details can be found at:
#    http://www.xmethods.com/detail.html?id=8
# Usage: get_temperature.py <zip code>
# Returns current temperature in Farenheight for the US zip code

import sys
import soap

server = soap.get_proxy('http://www.xmethods.net/sd/TemperatureService.wsdl')
try:
	zip = sys.argv[1]
except:
	zip = '94043'

temperature = server.getTemp(zipcode=zip)
print "Temperature for",zip,"=",temperature,"degrees F"
