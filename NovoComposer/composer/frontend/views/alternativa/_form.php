<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Alternativa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alternativa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textInput() ?>

    <?= $form->field($model, 'corretude')->textInput() ?>

    <?= $form->field($model, 'Questao_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
