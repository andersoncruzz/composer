<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ObjDinamico */

$this->title = 'Objeto dinâmico: '.$model->assunto;
$this->params['breadcrumbs'][] = ['label' => 'Obj Dinamicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-dinamico-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id, 'Capitulo_id'=>$capitulo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id, 'capitulo_id'=>$capitulo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir esse item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'assunto',
            'caminho',
            'descricao:ntext',
            'topicos:ntext',
            'exerciciosResolvidos',
            'duracao',
            'referencias:ntext',
            'tipo:ntext',
            'serie',
        ],
    ]) ?>

</div>
