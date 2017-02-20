from SOAPpy import SOAPProxy

url = 'http://appserver.di.fc.ul.pt/~asw44309/TugaBuy/ws_serv'
namespace = 'urn:cumpwsdl'
server = SOAPProxy(url, namespace)
x = True
while x:
	s = raw_input("Funcao -> ")
	if(s == "ValorActualDoItem"):
		idp = raw_input("ID Produto -> ")
		print "O valor actual do item: " + server.ValorActualDoItem(idp)
	elif(s == "LicitaItem"):
		idp = raw_input("ID Produto -> ")
		valor = raw_input("Valor -> ")
		username = raw_input("Username -> ")
		password = raw_input("Password -> ")
		print server.LicitaItem(idp, valor, username, password)
	else:
		print "Funcao nao existe"
		x = False