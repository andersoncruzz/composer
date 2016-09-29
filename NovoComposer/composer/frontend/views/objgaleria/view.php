<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir esse item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Adicionar imagem', ['imagem/create', 'Galeria_id' => $model->id], ['class' => 'btn btn-primary']) ?>
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

</div>
