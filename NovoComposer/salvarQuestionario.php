<meta charset="utf-8">
<?php
	$arquivo = fopen("./tmp/objeto.json","r+") or die("Unable to open html file!");
	$var = $arquivo;
	fseek($arquivo,0);
	fwrite($arquivo, "");
	fwrite($arquivo,"data='[");
	fwrite($arquivo, $var)
	fseek($arquivo, 0, SEEK_END);
	fwrite($arquivo, "]'");
	str_replace("}{", "},{", $arquivo);
	print "Questionário salvo em ./templates";
	fclose($arquivo);
?>