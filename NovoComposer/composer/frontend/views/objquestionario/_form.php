<?php

use common\models\Capitulo;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ObjQuestionario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obj-questionario-form">

    <?php $form = ActiveForm::begin(); ?>


    <label class="control-label" for="objquestionario-capitulo">Capítulo: <?= Capitulo::findOne($_GET['capitulo_id'])->titulo ?></label>

    <input type="hidden" name="capitulo_id" value=<?= $_GET['capitulo_id'] ?> >
    <?= $form->field($model, 'assunto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
