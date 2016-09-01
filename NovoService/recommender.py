def recommender (user, recommender, sumarizer):
	
	flagUserExists = False
	#Verificando se o usuario existe na lista do recommender
	for userActives in recommender:
		if userActives[0][0] == user:
			flagUserExists = True
		#adicionando na lista do recomender este usuario
	if flagUserExists == False:
		print "if"
		recommender.append([user,[False,False,False,False], [False,False,False,False]])

	if len(recommender) > 0:
		i = 0
		recommendation = ""
		#gerando a recomendacao para o usuario	
		for userActives in recommender:
			if userActives[0] == user:
				#Nao passou pela questao facil
				if userActives[1][0] == False:
					if userActives[1][1] == False:
						userActives[1][1] = True
						print "conteudo QHARD"	
						recommendation = "conteudo"
					elif userActives[1][2] == False:
						userActives[1][2] = True
						print "dica QHARD"	
						recommendation = "dica"
					elif userActives[1][3] == False:
						userActives[1][3] = True
						#Vai passar para questao facil	
						userActives[1][0] = True
						print "questaofacil QHARD"
						recommendation = "questaofacil"

				else: 
					if userActives[2][1] == False:
						userActives[2][1] = True
						print "conteudo QEASY"	
						recommendation = "conteudo"
					elif userActives[2][2] == False:
						userActives[2][2] = True
						print "dica QEASY"	
						recommendation = "dica"
					elif userActives[2][3] == False:
						userActives[2][3] = True
						#Vai passar para questao facil	
						userActives[2][0] = True
						print "professor QEASY"
						recommendation = "professor"
		feedback = []
		feedback.append(recommender)
		feedback.append(recommendation)
		print feedback
		return feedback																