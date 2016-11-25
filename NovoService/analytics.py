def analytics(user, sumario, idView):

	for line in sumario:
		listDataLastLine = line.split(";")	
		if user == listDataLastLine[0] and int(listDataLastLine[2]) > 7000 and idView != "" and idView[0] == "Q":
			#print "ADPTACAO NO CONTEUDO, MAIS DE 7 SEGUNDOS SEM INTERACAO"
			return True				
	return False 
