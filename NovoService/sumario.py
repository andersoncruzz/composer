
def LoadSummarizerByUser(user, timestamp, event, idView, sumario):
	#Percorre o sumario atras do usuario
	exemplo = sumario
	#print "exemplo"
	#print exemplo
	t = []
	i = 0
	if sumario:
		for line in sumario:
			listDataLine = line.split(";")
			if user == listDataLine[0]:
				t = listDataLine
				break	
			i += 1 
		if(t == []):
			Delta = "0"
			Data = user + ";" + timestamp + ";" + Delta + ";" + idView		
			print "Data"
			print Data
			exemplo.append(Data)
		else:
			if(event == "click"):
				Delta = "0"
				Data = user + ";" + timestamp + ";" + Delta + ";" + idView	
			else:
				Delta = str(int(timestamp) - int(t[1]))
				Data = user + ";" + t[1] + ";" + Delta + ";" + idView
				print Data
			exemplo[i] = Data
	else:
		Delta = "0"
		Data = user + ";" + timestamp + ";" + Delta + ";" + idView		
		print "Data"
		print Data
		exemplo.append(Data)
	return exemplo

#print LoadSummarizerByUser("0001", "2000", "null", "conteudo", [])
#print LoadSummarizerByUser("0002", "9000", "null", "conteudo", ['0001;2000;0;conteudo'])
#print LoadSummarizerByUser("0001", "10000", "null", "conteudo", ['0001;2000;0;conteudo', '0002;9000;0;conteudo'])