<meta charset="utf-8">
<?php
	$arquivo = fopen("./tmp/objeto.json","r+") or die("Unable to open html file!");
	fseek($arquivo,0);
	fwrite($arquivo,"data='[");
	fseek($arquivo, 0, SEEK_END);
	fwrite($arquivo, "]';");
	str_replace("}{", "},{", $arquivo);
	print "Questionário salvo em ./templates";
	fclose($arquivo);
?>