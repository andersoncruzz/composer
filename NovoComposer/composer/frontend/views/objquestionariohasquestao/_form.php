<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ObjQuestionarioHasQuestao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obj-questionario-has-questao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ObjQuestionario_id')->textInput() ?>

    <?= $form->field($model, 'Questao_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
