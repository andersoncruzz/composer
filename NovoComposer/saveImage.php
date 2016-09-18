<?php
	include_once('models/ObjImagem.php');
	$titulo = $_POST['titulo'];
	$legenda = $_POST['legenda'];
	$target_dir = "uploads/imagens/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	} else {
	    echo "Sorry, there was an error uploading your file.";
	}

	$i = new ObjImagem();
	$i->titulo = $titulo;
	$i->caminho = $target_file;
	$i->legenda = $legenda;

	$objJson = json_encode($i);	

	//cria novo arquivo
	$arquivo = fopen("./tmp/imagem.json", "w") or die("Unable to open file!");
	fwrite($arquivo, $objJson);
	//fecha o arquivo
	fclose($arquivo);
	print("arquivo criado em /tmp");
?>