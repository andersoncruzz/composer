<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\ObjGaleria;

/* @var $this yii\web\View */
/* @var $model common\models\ObjGaleria */

$this->title = $model->assunto;
$this->params['breadcrumbs'][] = ['label' => 'Obj Galeria', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-galeria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id, 'capitulo_id'=> $capitulo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir esse item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Adicionar imagem', ['imagem/create', 'Galeria_id' => $model->id, 'capitulo_id'=>$_GET['capitulo_id'] ], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Voltar pro Capítulo', ['capitulo/view', 'id' => $capitulo_id], ['class' => 'btn btn-danger']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'assunto',
            'topicos:ntext',
            'exerciciosResolvidos',
            'tipo:ntext',
            'duracao',
            'serie',
            'referencias:ntext',
        ],
    ]) ?>

    <?php
    $imagens = $model->imagems;
    ?>



    <div id="w1" class="grid-view">

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>
                    <a href="#" data-sort="caminho">Imagem</a>
                </th>
                <th>
                    <a href="#" data-sort="legenda">Legenda</a>
                </th>
                <th class="action-column">&nbsp;</th>
            </tr>
            </thead>
            <tbody>

            <?php
                $imagens = $model->imagems;
                foreach ($imagens as $img) {
                    echo "<tr>";
                    echo "<td><img src='$img->caminho' width='100px' height='100px'></td>";
                    echo "<td>$img->legenda</td>";
                    echo "<td>";
                    echo Html::a('Visualizar', ['imagem/view', 'id'=> $img->id]);
                    echo "</td>";
                    echo "</tr>";
                }
            ?>

            </tbody></table>
    </div>

</div>
