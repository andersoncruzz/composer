<?php

use common\models\ObjquestionariohasquestaoSearch;
use common\models\QuestaoSearch;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ObjQuestionario */
/* @var $questao common\models\Questao */


$this->title = 'Questionário: '. $model->assunto;
$this->params['breadcrumbs'][] = ['label' => 'Obj Questionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$aux = explode("/",Url::canonical());
$aux = $aux[2];
?>

<style>
    #view{
        width: 70%;
        float: left;
    }
    #search{
        width: 325px;
        display: ;
        margin-left: 9px;
        border: groove;
        border-radius: 2px;
        float: left;
    }
    #item{
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 100%;
        background-color: #f1f1f1;
    }
    #item button{
        float: right;
        margin-top: 10px;
    }
    #item li{
        list-style: none;
        border-bottom: groove;
    }

    #item li a {
        display: block;
        color: #000;
        padding: 8px 16px;
        text-decoration: none;
    }

    #item li a:hover {
        background-color: #555;
        color: white;
    }

    .container-3{
        width: 300px;
        vertical-align: middle;
        white-space: nowrap;
        position: relative;
    }

    .container-3 input#formsearch{
        width: 300px;
        height: 50px;
        background: #2b303b;
        border: none;
        font-size: 10pt;

        color: #262626;
        padding-left: 45px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        color: #fff;
        margin-bottom: 5px;
    }

</style>

<div id="tudo">
    <div class="obj-questionario-view" id="view">

        <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id, 'capitulo_id'=>$capitulo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id, 'capitulo_id'=>$capitulo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir esse item?',
                'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Adicionar Questão', ['questao/create', 'id' => $model->id,  'capitulo_id'=>$capitulo_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Voltar pro Capítulo', ['capitulo/view', 'id' => $capitulo_id], ['class' => 'btn btn-danger',]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'assunto',
            ],
        ]) ?>

        <label class="control-label" for="objquestionario-capitulo"> Questões </label>

        <div id="w1" class="grid-view"><div class="summary">Showing <b>1-<?= count($model->questaos)?></b> of <b>1</b> item.</div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>
                            <a href="#" data-sort="id">ID</a>
                        </th>
                        <th>
                            <a href="#" data-sort="nivel">Nivel</a>
                        </th>
                        <th>
                            <a href="#" data-sort="assunto">Assunto</a>
                        </th>
                        <th>
                            <a href="#" data-sort="enunciado">Enunciado</a>
                        </th>
                        <th>
                            <a href="#" data-sort="duracao">Duracao</a>
                        </th>
                        <th class="action-column">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                    foreach ($model->questaos as $key =>$questao) {
                    ?>

                    <tr data-key="<?= $questao->id?>">
                        <td><?=$key?></td>
                        <td><?= $questao->id?></td>
                        <td><?= $questao->nivel?></td>
                        <td><?= $questao->assunto?></td>
                        <td><?= $questao->enunciado?></td>
                        <td><?= $questao->duracao?></td>

                        <td>
                            <?=Html::a(
                                'Visualizar',
                                ['questao/view', 'id'=>$questao->id]
                            )?>
                            <?=Html::a(
                                'Editar',
                                ['questao/update', 'id'=>$questao->id]
                            )?>
                            <?=Html::a(
                                'Excluir',
                                ['questao/delete', 'id'=>$questao->id, 'idquestionario'=>$model->id],
                                ['data' => [
                                    'confirm' => 'Tem certeza que deseja deletar esse item?',
                                    'method' => 'post',
                                ],
                                ])?>
                        </td>
                    </tr>
                 <?php }?>

                </tbody></table>
        </div>

    </div>


    <script>
        var itens;
        function searchObejects(e){
            console.log(e.value);
            var ip = "<?= $aux ?>";
            console.log(ip);
            $.get("http://"+ip+"/OpenLab/NovoComposer/composer/frontend/web/index.php?r=objquestionario/find&titulo="+e.value, function(data, status){
                /**
                 * Converte o JSON(string) em objetos do tipo javascript
                 */
                itens = JSON.parse(data);

                var ul = document.getElementById("item");

                $("#item").empty();

                for(var i=0;i< itens.length; i++){
                    var pathImg = "";
                    if(itens[i].tipo == "questao") pathImg = "img/ico-preview-html.svg";

                    $("#item").append('<li ><a> <img  src=\"'+pathImg+'\"><label>'+itens[i].assunto.substring(0,20)+'...</label> <button onclick="addObject(this)" id= \"'+i+'\" class="btn btn-success">+</button></a></a></li>');
                    console.log("id: " + itens[i].id+" assunto: "+itens[i].assunto+" - tipo: "+itens[i].tipo);
                }
            });
        }


        function  addObject(e){
            var indice = parseInt(e.id);
            var category = <?= $model->id?>

                console.log(indice);
            console.log(itens[indice].assunto);

            var url = "http://"+window.location.hostname+"/OpenLab/NovoComposer/composer/frontend/web/index.php?r=objquestionario/add&idCat="+category+"&idObj="+itens[indice].id+"&type="+itens[indice].tipo;
            console.log(url);

            $.get(url, function(data, status){
                console.log(data)
            });
        }

    </script>

    <div id="search">
        <p><center><label>Pesquise aqui</label></center></p>
        <div class="container-3">
            <span class="icon"><i class="fa fa-search"></i></span>
            <input type="search" id="formsearch" placeholder="Título da questão" onkeyup="searchObejects(this)"/>
        </div>
        <ul id="item">
            <li><a><label style="width: 350px">Digite o título da questão deseja buscar</label></a> </li>

        </ul>

    </div>
</div>
