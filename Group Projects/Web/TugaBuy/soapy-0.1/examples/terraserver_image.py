#!/usr/bin/env python

# Uses the Microsoft TerraService.  Details can be found at:
#    http://terraserver.microsoft.net/default.aspx
# Usage: terraserver_image.py <City> <State> <Country>
#    Creates a file called "img.jpeg" in the current directory which is a 32m resolution
#    satellite photo of the center of the given city, state, and country.

import sys
import soap

proxy = soap.get_proxy('http://terraserver.microsoft.net/TerraService.asmx?SDL','sdl')

if len(sys.argv) == 1:
	city = "San Francisco"
	state = "CA"
	country = "USA"
else:
	city = sys.argv[1]
	state = sys.argv[2]
	if len(sys.argv) == 4:
		country = sys.argv[3]
	else:
		country = "USA"
	
result = proxy.GetPlaceFacts(place={"City": city,
									"State": state,
									"Country": country})
point = result['Center']
						  
meta = proxy.GetTileMetaFromLonLatPt(point=point, theme="Photo",
									 scale="Scale32m")
print meta

tileid = meta['Id']

imgdata = proxy.GetTile(id=tileid)
file = open("img.jpeg",'w')
file.write(imgdata)
file.close()
