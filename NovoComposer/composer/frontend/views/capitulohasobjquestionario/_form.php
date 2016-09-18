<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CapituloHasObjQuestionario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capitulo-has-obj-questionario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Capitulo_id')->textInput() ?>



    <?= $form->field($model, 'ObjQuestionario_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
