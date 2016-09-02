<meta charset="UTF-8">
<?php 
	include_once('models/ObjTexto.php');

	$titulo = $_POST['titulo'];
	$conteudo = $_POST['conteudo'];

	$t = new ObjTexto();
	$t->titulo = $titulo;
	$t->conteudo = base64_encode($conteudo);

	$objJson = json_encode($t);

	//cria novo arquivo
	$arquivo = fopen("./tmp/texto.json", "w") or die("Unable to open file!");
	fwrite($arquivo, $objJson);
	//fecha o arquivo
	fclose($arquivo);
	print("arquivo criado em /tmp");

?>