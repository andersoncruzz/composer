<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Questao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="questao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nivel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assunto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enunciado')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'duracao')->textInput() ?>

    <?= $form->field($model, 'dica')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
