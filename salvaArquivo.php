<meta charset="UTF-8">
<?php 

	$enunciado = $_GET['enunciado'];
	$alternativaA = $_GET['alternativaA'];
	$alternativaB = $_GET['alternativaB'];
	$alternativaC = $_GET['alternativaC'];
	$alternativaD = $_GET['alternativaD'];
	$alternativaE = $_GET['alternativaE'];
	$correta = $_GET['alternativa'];
	$nivel = $_GET['nivel'];
	$dica = $_GET['dica'];
	print 'Questionário criado em /tmp';

	//cria novo arquivo
	$arquivo = fopen("./tmp/teste.html", "w") or die("Unable to open file!");

	//insere início do arquivo	
	$escopo = "<!DOCTYPE html>\n<html>\n<head>\n<meta charset=\"UTF-8\">\n<meta name=\"viewport\"\ncontent=\"width=device-width, initial-scale=1\">\n<link rel=\"stylesheet\" href=\"../css/bootstrap.min.css\">\n<script src=\"../js/jquery.min.js\"></script>\n<script src=\"../js/bootstrap.min.js\"></script>\n<title>Questionario</title>\n</head>\n<body>\n<div style=\"display: inline-block;\">\n<div class=\"container\" id=\"menu\">\n<h2>Exercício</h2>\n<div >\n<a class=\"list-group-item\">Questão 1</a>\n<a class=\"list-group-item\">Questão 2</a>\n<a class=\"list-group-item\">Questão 3</a>\n</div>\n</div>\n<div class=\"container\" id=\"containerQuestao\">\n</div>\n</div>";
	fwrite($arquivo, $escopo);
	
	// aqui estão os dados da questão que serão escritos no arquivo
	$conteudo = '<p>'. $enunciado . '</p>'
	. '<p>Alternativa A):'. $alternativaA . '</p>'
	. $conteudo = '<p>Alternativa B):'. $alternativaB . '</p>'
	. $conteudo = '<p>Alternativa C):'. $alternativaC . '</p>'
	. $conteudo = '<p>Alternativa D):'. $alternativaD . '</p>'
	. $conteudo = '<p>Alternativa E):'. $alternativaE . '</p>'
	. $conteudo = '</br><p>Alternativa correta:'. $correta . '</p>'
	. $conteudo = '<p>Essa questao é: '. $nivel . '</p>'
	. $conteudo = '<p>A dica dessa questao é: '. $dica . '</p>';
	fwrite($arquivo, $conteudo);


	//insere o final do arquivo
	$fim = "\n</body>\n<style type=\"text/css\">\n	.questao{\n		visibility: hidden;\n	}\n\n	#menu{\n		width: 200px;\n		float: left;\n	}\n\n	#containerQuestao{\n		width: 500px;\n		float: left;\n	}\n\n</style></html>";
	fwrite($arquivo, $fim);
	
	//fecha o arquivo
	fclose($arquivo);
?>