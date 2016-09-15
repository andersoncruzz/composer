<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\QuestaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="questao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nivel') ?>

    <?= $form->field($model, 'assunto') ?>

    <?= $form->field($model, 'enunciado') ?>

    <?= $form->field($model, 'duracao') ?>

    <?php // echo $form->field($model, 'dica') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
