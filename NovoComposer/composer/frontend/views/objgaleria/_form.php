<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\touchspin\TouchSpin;

/* @var $this yii\web\View */
/* @var $model common\models\ObjGaleria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obj-galeria-form">

    <?php $form = ActiveForm::begin(); ?>

    <input type="hidden" name="Capitulo_id" value=<?= $_GET['Capitulo_id'] ?> >

    <?= $form->field($model, 'assunto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'topicos')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'exerciciosResolvidos')->checkbox(['uncheck' => '0', 'check' => '1']) ?>

    <?= $form->field($model, 'tipo')->checkboxList(['Conceito'=>'Conceito', 'Formula'=>'Formula', 'Exemplo'=>'Exemplo', 'Tutorial'=>'Tutorial', 'Exercicio Resolvido'=>'Exercicio Resolvido', 'Aplicacao'=>'Aplicacao', 'Representacao Grafica'=> 'Representacao Grafica']) ?>

    <?= $form->field($model, 'duracao')->widget(TouchSpin::classname(), [
        'options' => ['placeholder' => 'Selecione...'],
    ]);?>

    <?= $form->field($model, 'serie')->dropDownList(
        ['1ª ano - Ensino Fundamental'=> '1ª ano - Ensino Fundamental',
            '2ª ano - Ensino Fundamental'=> '2ª ano - Ensino Fundamental',
            '3ª ano - Ensino Fundamental'=> '3ª ano - Ensino Fundamental',
            '4ª ano - Ensino Fundamental'=> '4ª ano - Ensino Fundamental',
            '5ª ano - Ensino Fundamental'=> '5ª ano - Ensino Fundamental',
            '6ª ano - Ensino Fundamental'=> '6ª ano - Ensino Fundamental',
            '7ª ano - Ensino Fundamental'=> '7ª ano - Ensino Fundamental',
            '8ª ano - Ensino Fundamental'=> '8ª ano - Ensino Fundamental',
            '9ª ano - Ensino Fundamental'=> '9ª ano - Ensino Fundamental',
            '1ª ano - Ensino Médio'=> '1ª ano - Ensino Médio',
            '2ª ano - Ensino Médio'=> '2ª ano - Ensino Médio',
            '3ª ano - Ensino Médio'=> '3ª ano - Ensino Médio',
            'Outro(s)'=> 'Outro(s)',
        ]); ?>
    <?= $form->field($model, 'referencias')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
