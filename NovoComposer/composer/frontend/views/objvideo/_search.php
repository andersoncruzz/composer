<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ObjvideoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obj-video-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'assunto') ?>

    <?= $form->field($model, 'caminho') ?>

    <?= $form->field($model, 'topicos') ?>

    <?= $form->field($model, 'exerciciosResolvidos') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'duracao') ?>

    <?php // echo $form->field($model, 'serie') ?>

    <?php // echo $form->field($model, 'avaliacao') ?>

    <?php // echo $form->field($model, 'referencias') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
