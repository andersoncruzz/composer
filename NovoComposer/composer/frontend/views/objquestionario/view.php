<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ObjQuestionario */
/* @var $questao common\models\Questao */


$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Obj Questionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-questionario-view">

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
            'assunto',
        ],
    ]) ?>

    <?php
        foreach ($model->questaos as $questao) {
            echo "<br> Id:".$questao->id;
            echo "<br> Nivel:".$questao->nivel;
            echo "<br> Assunto:".$questao->assunto;
            echo "<br> enunciado:".$questao->enunciado;
            echo "<br> duracao:".$questao->duracao;
            echo "<br> dica:".$questao->dica;
        }

     ?>

</div>
