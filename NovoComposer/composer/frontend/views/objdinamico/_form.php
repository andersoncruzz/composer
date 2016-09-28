<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ObjDinamico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obj-dinamico-form">

    <?php $form = ActiveForm::begin(); ?>

    <input type="hidden" name="Capitulo_id" value=<?= $_GET['Capitulo_id'] ?> >

    <?= $form->field($model, 'assunto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'caminho')->fileInput() ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'topicos')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'exerciciosResolvidos')->checkbox(['uncheck' => '0', 'check' => '1']) ?>

    <?= $form->field($model, 'tipo')->checkboxList(['Conceito'=>'Conceito', 'Formula'=>'Formula', 'Exemplo'=>'Exemplo', 'Tutorial'=>'Tutorial', 'Exercicio Resolvido'=>'Exercicio Resolvido', 'Aplicacao'=>'Aplicacao', 'Representacao Grafica'=> 'Representacao Grafica']) ?>

    <?= $form->field($model, 'duracao')->textInput() ?>

    <?= $form->field($model, 'serie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'referencias')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
