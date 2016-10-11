<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Questao */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Questaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'nivel',
            'assunto',
            'enunciado:ntext',
            'duracao',
            'dica:ntext',
            [
                'attribute'=>'Correta',
                'value'=> strtoupper($model->correta),
            ],
            [
                'attribute'=>'A',
                'value'=> $model->alternativas[0]->description,
            ],
            [
                'attribute'=>'B',
                'value'=> $model->alternativas[1]->description,
            ],
            [
                'attribute'=>'C',
                'value'=> $model->alternativas[2]->description,
            ],
            [
                'attribute'=>'D',
                'value'=> $model->alternativas[3]->description,
            ],
            [
                'attribute'=>'E',
                'value'=> $model->alternativas[4]->description,
            ],
        ],
    ]) ?>


</div>
