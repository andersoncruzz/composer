<meta charset="UTF-8">
<?php 

	include_once('models/Alternativa.php');
	include_once('models/Questao.php');

	$titulo = $_POST['titulo'];
	$enunciado = $_POST['enunciado'];

	
	$alternativaA = $_POST['alternativaA'];
	$distA = $_POST['distA'];

	$alternativaB = $_POST['alternativaB'];
	$distB = $_POST['distB'];

	$alternativaC = $_POST['alternativaC'];
	$distC = $_POST['distC'];

	$alternativaD = $_POST['alternativaD'];
	$distD = $_POST['distD'];

	$alternativaE = $_POST['alternativaE'];
	$distE = $_POST['distE'];

	$correta = $_POST['alternativa'];

	$nivel = $_POST['nivel'];
	$dica = $_POST['dica'];
	$tempoMax = $_POST['tempoMax'];

	print 'Questionário criado em /tmp';

	//cria novo arquivo
	$arquivo = fopen("./tmp/objeto.json", "w") or die("Unable to open file!");

	$a = new Alternativa();
	$a->descricao = $alternativaA;
	$a->distanciaCorreta = $distA;

	$b = new Alternativa();
	$b->descricao = $alternativaC;
	$b->distanciaCorreta = $distB;

	$c = new Alternativa();
	$c->descricao = $alternativaC;
	$c->distanciaCorreta = $distC;

	$d = new Alternativa();
	$d->descricao = $alternativaD;
	$d->distanciaCorreta = $distD;

	$e = new Alternativa();
	$e->descricao = $alternativaE;
	$e->distanciaCorreta = $distE;

	$q = new Questao();
	$q->titulo = $titulo;
	$q->enunciado = base64_encode($enunciado);
	$q->alternativas = [$a, $b, $c, $d, $e];
	$q->alternativaCorreta = $correta;
	$q->nivel = $nivel;
	$q->tempoMax = $tempoMax;
	$q->dica = base64_encode($dica);

	$objJson = json_encode($q);

	fwrite($arquivo, $objJson);
	
	//fecha o arquivo
	fclose($arquivo);
?>