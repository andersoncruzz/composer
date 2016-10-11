<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Capitulo */
/* @var $quiz common\models\ObjQuestionario */
/* @var $texto common\models\Objtexto */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Capitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    #view{
        float: left;
    }
    #search{
        margin-left: 30px;
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

    <div class="capitulo-view" id="view">

        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem certeza que deseja deletar esse capítulo?',
                    'method' => 'post',
                ],
            ]) ?>

        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'titulo',
                'dificuldade',
            ],
        ]) ?>

        <div class="dropup">
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Novo Objeto
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><?= Html::a('Texto', ['objtexto/create', 'Capitulo_id' => $model->id])?></li>
                <li><?= Html::a('Galeria', ['objgaleria/create', 'Capitulo_id' => $model->id])?></li>
                <li><?= Html::a('Apresentação', ['objapresentacao/create', 'Capitulo_id'=>$model->id])?></li>
                <li><?= Html::a('Vídeo', ['objvideo/create', 'Capitulo_id'=>$model->id])?></li>
                <li><?= Html::a('Objeto dinâmico', ['objdinamico/create', 'Capitulo_id'=>$model->id])?></li>
                <li class="divider"></li>
                <li><?= Html::a('Questionario', ['objquestionario/create', 'capitulo_id' => $model->id])?></li>
            </ul>
        </div>

        <br><label class="control-label" for="objquestionario-capitulo"> Objetos de Aprendizagem </label>

        <div id="w1" class="grid-view">
            <div class="summary">
                Mostrar <b>1-<?= count($model->objQuestionarios)?></b> of <b>1</b> item.
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>
                        <a href="#" data-sort="id">código</a>
                    </th>
                    <th>
                        <a href="#" data-sort="id">Tipo</a>
                    </th>

                    <th>
                        <a href="#" data-sort="assunto">Assunto</a>
                    </th>

                    <th class="action-column">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $array = json_decode($model->ordem, true);
                //var_dump($array);
                for ($i=0 ; $i<= count($array); $i++) {
                    try {
                        ?>
                        <tr data-key="<?= $i ?>">
                            <td><?= $i+1 ?></td>
                            <td><?= $array[$i]['id'] ?></td>
                            <td><?= $array[$i]['tipo'] ?></td>
                            <td><?= $array[$i]['descricao'] ?></td>
                            <td>
                                <?php

                                /*
                                 * Visualizar
                                 */
                                if ($array[$i]['tipo'] == 'questionario')
                                    echo Html::a('Visualizar', ['objquestionario/view', 'id' => $array[$i]['id'], 'capitulo_id' => $model->id]);
                                else if($array[$i]['tipo'] == 'Texto/Html')
                                    echo Html::a('Visualizar', ['objtexto/view', 'id' => $array[$i]['id'], 'capitulo_id' => $model->id]);
                                else if($array[$i]['tipo'] == 'objgaleria')
                                    echo Html::a('Visualizar', ['objgaleria/view', 'id' => $array[$i]['id'], 'capitulo_id' => $model->id]);
                                //TODO
                                else if($array[$i]['tipo'] == 'objdinamico')
                                    echo Html::a('Visualizar', ['objdinamico/view', 'id' => $array[$i]['id'], 'capitulo_id' => $model->id]);
                                else if($array[$i]['tipo'] == 'objapresentacao')
                                    echo Html::a('Visualizar', ['objapresentacao/view', 'id' => $array[$i]['id'], 'capitulo_id' => $model->id]);
                                else if($array[$i]['tipo'] == 'objvideo')
                                    echo Html::a('Visualizar', ['objvideo/view', 'id' => $array[$i]['id'], 'capitulo_id' => $model->id]);
                                else
                                    echo "<a href='#'>Visualizar</a>";

                                ?>
                                <a href="#">Editar</a>

                                <?php
                                    if($array[$i]['tipo'] == 'questionario')
                                        echo Html::a('Excluir',
                                            ['objquestionario/delete', 'id' => $array[$i]['id'], 'capitulo_id' => $model->id],
                                            ['data' => [
                                                'confirm' => 'Tem certeza que deseja deletar esse Objeto de Aprendizagem?',
                                                'method' => 'post',
                                            ]]);
                                    else if ($array[$i]['tipo'] == 'Texto/Html')
                                        echo Html::a('Excluir',
                                            ['objtexto/delete', 'id' => $array[$i]['id'], 'capitulo_id' => $model->id],
                                            ['data' => [
                                                'confirm' => 'Tem certeza que deseja deletar esse Objeto de Aprendizagem?',
                                                'method' => 'post',
                                            ]]);
                                    else if ($array[$i]['tipo'] == 'objapresentacao')
                                        echo Html::a('Excluir',
                                            ['objapresentacao/delete', 'id' => $array[$i]['id'], 'capitulo_id' => $model->id],
                                            ['data' => [
                                                'confirm' => 'Tem certeza que deseja deletar esse Objeto de Aprendizagem?',
                                                'method' => 'post',
                                            ]]);
                                    else if ($array[$i]['tipo'] == 'objvideo')
                                        echo Html::a('Excluir',
                                            ['objvideo/delete', 'id' => $array[$i]['id'], 'capitulo_id' => $model->id],
                                            ['data' => [
                                                'confirm' => 'Tem certeza que deseja deletar esse Objeto de Aprendizagem?',
                                                'method' => 'post',
                                            ]]);
                                    else if ($array[$i]['tipo'] == 'objdinamico')
                                        echo Html::a('Excluir',
                                            ['objdinamico/delete', 'id' => $array[$i]['id'], 'capitulo_id' => $model->id],
                                            ['data' => [
                                                'confirm' => 'Tem certeza que deseja deletar esse Objeto de Aprendizagem?',
                                                'method' => 'post',
                                            ]]);
                                    else if ($array[$i]['tipo'] == 'objgaleria')
                                        echo Html::a('Excluir',
                                            ['objgaleria/delete', 'id' => $array[$i]['id'], 'capitulo_id' => $model->id],
                                            ['data' => [
                                                'confirm' => 'Tem certeza que deseja deletar esse Objeto de Aprendizagem?',
                                                'method' => 'post',
                                            ]]);
                                    else
                                        echo "<a href='#'>Excluir</a>"

                                ?>



                            </td>
                        </tr>
                        <?php
                    }catch(\Exception $e){
                        continue;
                    }
                }?>

                </tbody></table>
        </div>

        <!--deve listar os objetos de aprendizagem do capítulo-->
    </div>

    <div id="search">
        <p><center><label>Pesquise aqui</label></center></p>
        <div class="container-3">
            <span class="icon"><i class="fa fa-search"></i></span>
            <input type="search" id="formsearch" placeholder="Título do Objeto" />
        </div>
        <ul id="item">
            <li><a> <img src="img/ico-preview-html.svg"><label>O que é prisma</label></a></li>
            <li><a> <img src="img/ico-preview-assessment.svg"><label>Exercício</label></a></li>
        </ul>

    </div>
</div>
