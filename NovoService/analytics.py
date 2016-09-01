def analytics(user, sumario):

	for line in sumario:
		listDataLastLine = line.split(";")	
		if user == listDataLastLine[0] and int(listDataLastLine[2]) > 7000 and (listDataLastLine[3]!="conteudo" and  listDataLastLine[3]!="SemDados"):
			print "ADPTACAO NO CONTEUDO, MAIS DE 7 SEGUNDOS SEM INTERACAO"
			return True				
	return False 
