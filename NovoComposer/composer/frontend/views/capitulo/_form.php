<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Capitulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capitulo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dificuldade')->textInput() ?>

    <?= $form->field($model, 'Aula_id')->hiddenInput(['value' => $_GET['Aula_id']])->label(false)?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Novo' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
