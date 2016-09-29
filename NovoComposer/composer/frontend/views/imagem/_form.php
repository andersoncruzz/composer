<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Imagem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imagem-form">

    <?php $form = ActiveForm::begin(); ?>

    <input type="hidden" name="Galeria_id" value=<?= $_GET['Galeria_id'] ?> >

    <?= $form->field($model, 'caminho')->fileInput() ?>

    <?= $form->field($model, 'legenda')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
