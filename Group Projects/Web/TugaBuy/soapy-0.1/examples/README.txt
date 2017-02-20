SOAPy Examples:

Two examples of using the SOAPy library:

1) get_temperature.py -- this uses a really simple WSDL/SOAP-based
service from XMethods (http://www.xmethods.com/) which, given a zip
code, returns the temperature.  This is about as close to a "Hello
World" as you can get with this kind of thing. :)

2) terraserver_image.py -- this uses a Microsoft .NET based service,
TerraService, to retrieve a satellite photo tile of the city, state,
and country you specify.  (See http://terraservice.microsoft.net/ for
details on how the service works and what it covers).  This is a
slightly more complex example and also shows an example of a
.NET/SDL-based service.
