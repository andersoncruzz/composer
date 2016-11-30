<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PerguntacpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perguntacp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPerguntaCP') ?>

    <?= $form->field($model, 'pergunta') ?>

    <?= $form->field($model, 'resposta') ?>

    <?= $form->field($model, 'tamanho') ?>

    <?= $form->field($model, 'ObjCacapalavras_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
