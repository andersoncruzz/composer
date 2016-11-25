def recommender (user, recommender, sumarizer, idQuestion, timestamp):
	
	flagUserExists = False
	#Verificando se o usuario existe na lista do recommender
	for userActives in recommender:
		if userActives[0][0] == user:
			flagUserExists = True
		#adicionando na lista do recomender este usuario
	if flagUserExists == False:
		#print "if"
		recommender.append([[user, timestamp], [[False,False,False,False], [False,False,False,False]],[[False,False,False,False], [False,False,False,False]],[[False,False,False,False], [False,False,False,False]]])

	if len(recommender) > 0:
		i = 0
		recommendation = "ok"
		#gerando a recomendacao para o usuario
		for userActives in recommender:
			if userActives[0][0] == user:
				#Nao passou pela questao facil
				print ""
				if userActives[idQuestion][1][0] == True:
					recommendation = "ok"
					print "Esta Questao ja utilizou todas as adaptacoes"				
				elif timestamp - userActives[0][1] > 7000: 
					userActives[0][1] = timestamp		
					if userActives[idQuestion][0][0] == False:
						if userActives[idQuestion][0][1] == False:
							userActives[idQuestion][0][1] = True
							print "D"+str(idQuestion)+"-hard"	
							recommendation = "D"+str(idQuestion)+"-hard"
						elif userActives[idQuestion][0][2] == False:
							userActives[idQuestion][0][2] = True
							print "C"+str(idQuestion)+"-hard"	
							recommendation = "D"+str(idQuestion)+"-hard" + ";" + "C"+str(idQuestion)+"-hard"
						elif userActives[idQuestion][0][3] == False:
							userActives[idQuestion][0][3] = True
							#Vai passar para questao facil	
							userActives[idQuestion][0][0] = True
							print "Q"+str(idQuestion)+"-easy"
							recommendation = "D"+str(idQuestion)+"-hard" + ";" + "C"+str(idQuestion)+"-hard" + ";" + "Q"+str(idQuestion)+"-easy"

					else:
						if userActives[idQuestion][1][0] == False: 
							if userActives[idQuestion][1][1] == False:
								userActives[idQuestion][1][1] = True
								print "D"+str(idQuestion)+"-easy"	
								recommendation = "D"+str(idQuestion)+"-easy"
							elif userActives[idQuestion][1][2] == False:
								userActives[idQuestion][1][2] = True
								print "C"+str(idQuestion)+"-easy"	
								recommendation = "D"+str(idQuestion)+"-easy" +";" +"C"+str(idQuestion)+"-easy"
							elif userActives[idQuestion][1][3] == False:
								userActives[idQuestion][1][3] = True
								#Vai passar para questao facil	
								userActives[idQuestion][1][0] = True
								print "P"+str(idQuestion)
								recommendation = "D"+str(idQuestion)+"-easy" +";" +"C"+str(idQuestion)+"-easy" + ";" + "P"+str(idQuestion)
				else:
					#userActives[0][1] = -1
					recommendation = "ok"
					print "Enviamos uma adaptacao ha pouco tempo"


		print ""					
		feedback = []
		feedback.append(recommender)
		feedback.append(recommendation)
		#print feedback
		return feedback 																
