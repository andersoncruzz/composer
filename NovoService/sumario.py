
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
			#print "Data"
			#print Data
			exemplo.append(Data)
		else:
			if(event == "click"):
				Delta = "0"
				Data = user + ";" + timestamp + ";" + Delta + ";" + idView	
			else:
				Delta = str(int(timestamp) - int(t[1]))
				Data = user + ";" + t[1] + ";" + Delta + ";" + idView
				#print Data
			exemplo[i] = Data
	else:
		Delta = "0"
		Data = user + ";" + timestamp + ";" + Delta + ";" + idView		
		#print "Data"
		#print Data
		exemplo.append(Data)
	return exemplo

def LoadQuestionTime (user, timeQuestions, idQuestion, timestamp):
	
	flagUserExists = False
	#Verificando se o usuario existe na lista do timeQuestions
	for userActives in timeQuestions:
		if userActives[0][0] == user:
			flagUserExists = True
		#adicionando na lista do recomender este usuario
	if flagUserExists == False:
		#print "if"
		timeQuestions.append([[user, idQuestion], [0,0,0,0], [0,0,0,0], [0,0,0,0]])

	if len(timeQuestions) > 0:
		i = 0
		for userActives in timeQuestions:
			if userActives[0][0] == user:
				#Trocou de questao atualizar os timestamp
				if userActives[0][1] != idQuestion:
					userActives[userActives[0][1]][2] = userActives[userActives[0][1]][1] - userActives[userActives[0][1]][0] + userActives[idQuestion][2]
					userActives[userActives[0][1]][0] = 0
					userActives[userActives[0][1]][1] = 0
					userActives[0][1] = idQuestion
				else:	
					if userActives[idQuestion][0] == 0:
						userActives[idQuestion][0] = timestamp							
					else:
						userActives[idQuestion][1] = timestamp
						userActives[idQuestion][3] = userActives[idQuestion][1] - userActives[idQuestion][0] + userActives[idQuestion][2]
				#print userActives 	
		#print ""					
		#print feedback
		return timeQuestions
#print LoadSummarizerByUser("0001", "2000", "null", "conteudo", [])
#print LoadSummarizerByUser("0002", "9000", "null", "conteudo", ['0001;2000;0;conteudo'])
#print LoadSummarizerByUser("0001", "10000", "null", "conteudo", ['0001;2000;0;conteudo', '0002;9000;0;conteudo'])