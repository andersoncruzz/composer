<?php
	include_once('models/ObjSlide.php');
	$titulo = $_POST['titulo'];
	$target_dir = "uploads/slides/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	} else {
	    echo "Sorry, there was an error uploading your file.";
	}

	$s = new ObjSlide();
	$s->titulo = $titulo;
	$s->caminho = $target_file;

	$objJson = json_encode($s);	

	//cria novo arquivo
	$arquivo = fopen("./tmp/slide.json", "w") or die("Unable to open file!");
	fwrite($arquivo, $objJson);
	//fecha o arquivo
	fclose($arquivo);
	print("arquivo criado em /tmp");
?>