#!flask/bin/python
# -*- coding: utf-8 -*-
from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
#from flask.ext.cors import CORS, cross_origin
from sumario import LoadSummarizerByUser
from analytics import analytics
from cut import cut
from recommender import recommender
import os
import thread
import time
import threading

sumario = []
recomendation = list()

app = Flask('storage')
CORS(app)
#moveBufferHttpRest_to_BufferChangeLogger = False
#Criando diretório sessions caso não exista	
if os.path.exists("sessions-Logs") == False:
	os.makedirs("sessions-Logs")

#semaforo_sumarizerLog = True
active_sessions = list()
#recomendationUsers = list()
active_sessions.append("1")

mutex = 0

def moduleSummarizer(user, timestamp, event, idView):

	global mutex
	global sumario
	while mutex:# getSemaforo(session):
		pass
	mutex = 1#setSemaforo(session)
	#atualiza o sumario
	sumario = LoadSummarizerByUser(user, timestamp, event, idView, sumario)
	recomendationUser = analytics(user, sumario)
	#print "sumario"
	#print sumario
	#print "recomendation"
	feedback = []
	if recomendationUser == True:
		feedback = recommender (user, recomendation, sumario)
	mutex = 0#releaseSemaforo	
	print "feedback sumarizer"
	print feedback
	return feedback


@app.route("/storage/<idSession>", methods=["POST"])
def receive_data(idSession):
	if request.method == "POST":
		if verify_active_session(idSession) == False:
			create_session(idSession)
		idUser = request.form["idUser"]					
		event = request.form["tipo"]		
		resource = request.form["tag"]
		timestamp = request.form["timeStamp"]
		x = request.form["x"]
		y = request.form["y"]
		#idView = request.form["id"]
		tela = request.form["tela"]
		idView = request.form["classId"]    	
		#print tela
		if x == "" and y == "" and resource == "":
			#Neste bloco está sendo atualizado a última linha que significa o timestamp e a tela atual passado pelo Player
			with open("sessions-Logs/"+idSession+"/"+idUser+"_log.csv") as f:
				lines = f.readlines()
				if len(lines) > 0:
					lineOld = lines[-1] #pega ultima linha
					lineNew = idSession+";"+idUser+";"+timestamp+";"+event +";"+ tela+ ";"+idView+";"+resource+";"+x+";"+y+"\n"
					f.close()

					fileaux = open("sessions-Logs/"+idSession+"/"+idUser+"_log.csv",'r')
					filedata = fileaux.read()
					fileaux.close()

					newdata = filedata.replace(lineOld, lineNew)

					fileaux = open("sessions-Logs/"+idSession+"/"+idUser+"_log.csv",'w')
					fileaux.write(newdata)
					fileaux.close()
				else:
					newdata = idSession+";"+idUser+";"+timestamp+";"+event +";"+ tela +";"+idView+";"+resource+";"+x+";"+y+"\n"
					fileaux = open("sessions-Logs/"+idSession+"/"+idUser+"_log.csv",'w')
					fileaux.write(newdata)
					fileaux.close()

		else:
			with open("sessions-Logs/"+idSession+"/"+idUser+"_log.csv") as f:
				lines = f.readlines()
				lineOld = lines[-1] #pega ultima linha
				f.close()
				#print lines

				fileaux = open("sessions-Logs/"+idSession+"/"+idUser+"_log.csv",'r')
				filedata = fileaux.read()
				fileaux.close()

				lineNew = idSession+";"+idUser+";"+timestamp+";"+event +";"+ tela +";"+idView+";"+resource+";"+x+";"+y+"\n"
				newdata = filedata.replace(lineOld, lineNew)
				newdata = newdata + lineOld 
				#print newdata
				fileaux = open("sessions-Logs/"+idSession+"/"+idUser+"_log.csv",'w')
				fileaux.write(newdata)
				fileaux.close()


			#data_received =	idSession+";"+idUser+";"+timestamp+";"+event +";"+idView+";"+resource+";"+x+";"+y+"\n"
			#fileBuffer = open("sessions-Logs/"+idSession+"/"+idUser+"_log.csv", "a")
			#fileBuffer.write(data_received)
			#fileBuffer.close()

		print idSession+";"+idUser+";"+timestamp+";"+event +";"+ tela +";"+idView+";"+resource+";"+x+";"+y
		feedback = moduleSummarizer(idUser, timestamp, event, idView)
		print feedback
		if len(feedback) > 0:
			recomendation = feedback[0]
			return feedback[1], 200
		else:
			return "ok", 200

#@app.route("/analytics/<idSession>", methods=["GET"])
#def receiveAnalytics(idSession):
#	if request.method == "GET":
#		idUser = request.args.get("idUser")
#		timeStamp = request.args.get("timestamp")
#		#print "idUser" + idUser				
#		if moduleSummarizer(idUser, timeStamp, idSession) == True:
#			return "True", 200
#		else:
#			return "False", 200

#Cria diretório que representa a sessão
def create_session(idSession):
	if os.path.exists("sessions-bufferHTTPRest/"+idSession) == False:
		os.makedirs("sessions-bufferHTTPRest/"+idSession)
		active_sessions.append(str(idSession))
		print "Created the directoy:" +idSession

#Verifica em memória se a sessão está ativa
def verify_active_session(idSession):
	#print idSession
	#print active_sessions
	for session in active_sessions:
		if session == idSession:
			#print "The session is active"
			return True
	#print "The session isn't active"
	return False

if __name__ == '__main__':
	app.run(debug=True, host='0.0.0.0')
	#@crossdomain(origin='*')
