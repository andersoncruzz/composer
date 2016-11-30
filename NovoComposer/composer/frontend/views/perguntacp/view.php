<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Perguntacp */

$this->title = $model->idPerguntaCP;
$this->params['breadcrumbs'][] = ['label' => 'Perguntacps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perguntacp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idPerguntaCP], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idPerguntaCP], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPerguntaCP',
            'pergunta:ntext',
            'resposta:ntext',
            'tamanho',
            'ObjCacapalavras_id',
        ],
    ]) ?>

</div>
