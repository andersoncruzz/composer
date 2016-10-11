#!flask/bin/python
# -*- coding: utf-8 -*-
from flask import Flask, request, jsonify, render_template, redirect, url_for, send_from_directory
from flask_cors import CORS, cross_origin
#from flask.ext.cors import CORS, cross_origin
from sumario import LoadSummarizerByUser
from sumario import LoadQuestionTime
from analytics import analytics
from cut import cut
from recommender import recommender
import os
from banco import newTeacher, searchTeacher
from werkzeug import secure_filename

sumario = []
recomendation = list()
timeQuestions = list()
idQ = list()
status_class = False


app = Flask('storage')
CORS(app)
#moveBufferHttpRest_to_BufferChangeLogger = False
#Criando diretório sessions caso não exista	
if os.path.exists("sessions-Logs") == False:
	os.makedirs("sessions-Logs")

#Verifica se os arquivo com os dados do usuario existe
if os.path.exists("users.csv") == False:
	users_file = open("users.csv",'w')
	users_file.close()

app.config['UPLOAD_FOLDER'] = 'uploads/'
# These are the extension that we are accepting to be uploaded
app.config['ALLOWED_EXTENSIONS'] = set(['zip'])

def allowed_file(filename):
    return '.' in filename and \
           filename.rsplit('.', 1)[1] in app.config['ALLOWED_EXTENSIONS']



@app.route('/')
def index():
    return render_template('index.html')

@app.route('/upload', methods=['POST'])
def upload():
    # Get the name of the uploaded file
    file = request.files['file']
    # Check if the file is one of the allowed types/extensions
    if file and allowed_file(file.filename):
        # Make the filename safe, remove unsupported chars
        filename = secure_filename(file.filename)
        # Move the file form the temporal folder to
        # the upload folder we setup
        file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
        # Redirect the user to the uploaded_file route, which
        # will basicaly show on the browser the uploaded file
        return render_template('ok.html') #redirect(url_for('uploaded_file',
                               # filename=filename))

# This route is expecting a parameter containing the name
# of a file. Then it will locate that file on the upload
# directory and show it on the browser, so if the user uploads
# an image, that image is going to be show after the upload
@app.route('/uploads/<filename>')
def uploaded_file(filename):
    return send_from_directory(app.config['UPLOAD_FOLDER'],
                               filename)



#semaforo_sumarizerLog = True
active_sessions = list()
#recomendationUsers = list()
active_sessions.append("1")

mutex = 0


def searchAdaptation(user, timestamp, event, idView):

	global mutex
	global sumario
	while mutex:# getSemaforo(session):
		pass
	mutex = 1#setSemaforo(session)
	#atualiza o sumario
	sumario = LoadSummarizerByUser(user, timestamp, event, idView, sumario)
	recomendationUser = analytics(user, sumario, idView)
	#print "sumario"
	#print sumario
	#print "recomendation"
	#print recomendation
	idQuestion = idView.split(":")
	feedback = []
	if recomendationUser == True:
		feedback = recommender(user, recomendation, sumario, int(idQuestion[1]), int(timestamp))
	mutex = 0#releaseSemaforo	
	print "feedback sumarizer"
	print feedback
	return feedback

def updateQuestionsTime(user, timestamp, idView):
	idQuestion = idView.split(":")
	idQ.append(idQuestion[1])
	timeQuestion = LoadQuestionTime (user, timeQuestions, int(idQuestion[1]), int(timestamp))
	print timeQuestions


@app.route("/login/<idSession>", methods=["POST"])
def login(idSession):

	global status_class

	if request.method == "POST":
		matricula = request.form["matricula"]

	file_users = open("users.csv",'r')
	for line in file_users:
		user = line.split(";")
		if user[1] == matricula:
			print("Seja Bem Vindo(a) aluno(a) " + user[0])
			file_users.close()
			return "Ok;"+user[0]+";"+user[2], 200
	print ("User Nao encontrado!")
	file_users.close()
	return "Error", 200

#@app.route("/")
#def index():
#	return redirect(url_for("Aula/index.html"))


@app.route("/loginTeacher/<idSession>", methods=["POST"])
def loginTeacher(idSession):

	global status_class

	if request.method == "POST":
		matricula = request.form["matricula"]
		senha = request.form["senha"]
		dados = searchTeacher(int(matricula), senha)
		if dados:
			print("Seja bem Vindo professor(a) " + dados[1])			
			#				nome             id
			#a = 
			return "Ok;"+dados[1]+";"+str(dados[0]), 200

	print ("User Nao encontrado!")
	return "Error", 200



@app.route("/teacherRegistration/<idSession>", methods=["POST"])
def teacherRegistration(idSession):
	global status_class
	if request.method == "POST":
		nameTeacher = request.form["nome"]
		emailTeacher = request.form["email"]
		idTeacher = request.form["matricula"]
		passwordTeacher = request.form["senha"]
		if newTeacher(nameTeacher, emailTeacher, idTeacher, passwordTeacher):
			return "Ok", 200
	return "Erro", 200
			
	


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

		#Solicita recomendacao caso o aluno estiver em uma questao
		if idView != "" and idView[0] == "Q":
			idViewSplit = idView.split(":")
			#print idViewSplit
			updateQuestionsTime(idUser, timestamp, idView)
			feedback = searchAdaptation(idUser, timestamp, event, idView)
			#print feedback
			if len(feedback) > 0:
				recommendation = [{"recommendation": feedback[1]}]
				#print "----Teste Recommendation OOOOOI------", recommendation
				return jsonify({'recommendation': recommendation})
			else:
				recommendation = [{"recommendation": "ok"}]
				return jsonify({'recommendation': recommendation})
		else:
			recommendation = [{"recommendation": "ok"}]
			return jsonify({'recommendation': recommendation})

@app.route("/realtime/<idSession>", methods=["GET"])
def realTimeStateStudents(idSession):
	if request.method == "GET":
		return buildGraphTimeLine(idSession), 200

def buildGraphTimeLine(idSession):
	html = ""
	print idQ[0]
	if idQ[0] == "1":
		html = """<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["timeline"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var container = document.getElementById('graphTimeLine');
    var chart = new google.visualization.Timeline(container);
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn({ type: 'string', id: 'Question' });
    dataTable.addColumn({ type: 'string', id: 'idUser' });
    dataTable.addColumn({ type: 'date', id: 'Start' });
    dataTable.addColumn({ type: 'date', id: 'End' });
    dataTable.addRows([
      [ 'Q1', '1 ', new Date(0), new Date("""+str(timeQuestions[0][1][3])+""") ],
      [ 'Q2', '1', new Date(0), new Date("""+str(timeQuestions[0][2][3])+""") ],
      [ 'Q3', '1', new Date(0), new Date("""+str(timeQuestions[0][3][3])+""") ]]);

    var options = {
      colors: ['#2DB000','#F00'],
    };

    chart.draw(dataTable, options);
  }

</script>

<div id="graphTimeLine"></div>
"""

	elif idQ[0] == "2":
		html = """<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
  google.charts.load("current", {packages:["timeline"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var container = document.getElementById('graphTimeLine');
    var chart = new google.visualization.Timeline(container);
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn({ type: 'string', id: 'Question' });
    dataTable.addColumn({ type: 'string', id: 'idUser' });
    dataTable.addColumn({ type: 'date', id: 'Start' });
    dataTable.addColumn({ type: 'date', id: 'End' });
    dataTable.addRows([
      [ 'Q1', '1', new Date(0), new Date("""+str(timeQuestions[0][1][3])+""") ],
      [ 'Q2', '1 ', new Date(0), new Date("""+str(timeQuestions[0][2][3])+""") ],
      [ 'Q3', '1', new Date(0), new Date("""+str(timeQuestions[0][3][3])+""") ]]);

    var options = {
      colors: ['#2DB000','#F00','#2DB000'],
    };

    chart.draw(dataTable, options);
  }

</script>

<div id="graphTimeLine"></div>
"""
	elif idQ[0] == "3":
		html = """<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
  google.charts.load("current", {packages:["timeline"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var container = document.getElementById('graphTimeLine');
    var chart = new google.visualization.Timeline(container);
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn({ type: 'string', id: 'Question' });
    dataTable.addColumn({ type: 'string', id: 'idUser' });
    dataTable.addColumn({ type: 'date', id: 'Start' });
    dataTable.addColumn({ type: 'date', id: 'End' });
    dataTable.addRows([
      [ 'Q1', '1', new Date(0), new Date("""+str(timeQuestions[0][1][3])+""") ],
      [ 'Q2', '1', new Date(0), new Date("""+str(timeQuestions[0][2][3])+""") ],
      [ 'Q3', '1 ', new Date(0), new Date("""+str(timeQuestions[0][3][3])+""") ]]);

    var options = {
      colors: ['#F00','#F00','#2DB000'],
    };

    chart.draw(dataTable, options);
  }

</script>

<div id="graphTimeLine"></div>
"""
	return html
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
