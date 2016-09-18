<meta charset="utf-8">
<?php
	$arquivo = fopen("./tmp/objeto.json","r+") or die("Unable to open html file!");
	$tmp = fopen("./templates/objeto.json","w") or die("Unable to open html file!");
	
	$texto = fread($arquivo, filesize("./tmp/objeto.json"));
	
	$texto = "data='[" . $texto . "]'";

	$tam = strlen($texto);
	$texto[$tam - 3] = " ";
	print ($texto[$tam - 3]);

	fwrite($tmp, $texto);

	print "Questionário salvo em ./templates";
	fclose($tmp);
	fclose($arquivo);
?>