<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\touchspin\TouchSpin;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Questao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="questao-form">

    <?php $form = ActiveForm::begin([]); ?>

    <input type="hidden" name="id_questionario" value="<?=$model->id_questionario?>"/>

    <input type="hidden" name="capitulo_id" value=<?= $_GET['capitulo_id'] ?> >

    <?= $form->field($model, 'nivel')->dropDownList([1 => 'Fácil', 3 => 'Normal', 5 => 'Difícil']); ?>

    <?= $form->field($model, 'assunto')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'enunciado')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'duracao')->widget(TouchSpin::classname(), [
        'options' => ['placeholder' => 'Selecione...'],
    ]);?>

    <?= $form->field($model, 'dica')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?php if(count($model->alternativas)){ ?>
        <input type="radio" name="correta" value="a" <?= ($model->correta == 'a')? 'checked' : "" ?> >
        <input type="hidden" name="idA" value="<?= $model->alternativas[0]->id ?>">
        <input type="text" name="alternativaA" placeholder="descrição da alternativa" value="<?= $model->alternativas[0]->description?>"/>
        <input type="text" name="corretudeA" placeholder="Grau de corretude" value="<?= $model->alternativas[0]->corretude?>"/>
        <br>

        <input type="radio" name="correta" value="b" <?= ($model->correta == 'b')? 'checked' : "" ?> >
        <input type="hidden" name="idB" value="<?= $model->alternativas[1]->id ?>">
        <input type="text" name="alternativaB" placeholder="descrição da alternativa" value="<?= $model->alternativas[1]->description?>"/>
        <input type="text" name="corretudeB" placeholder="Grau de corretude" value="<?= $model->alternativas[1]->corretude?>"/>
        <br>

        <input type="radio" name="correta" value="c" <?= ($model->correta == 'c')? 'checked' : "" ?> >
        <input type="hidden" name="idC" value="<?= $model->alternativas[2]->id ?>">
        <input type="text" name="alternativaC" placeholder="descrição da alternativa" value="<?= $model->alternativas[2]->description?>"/>
        <input type="text" name="corretudeC" placeholder="Grau de corretude" value="<?= $model->alternativas[2]->corretude?>"/>
        <br>

        <input type="radio" name="correta" value="d" <?= ($model->correta == 'd')? 'checked' : "" ?> >
        <input type="hidden" name="idD" value="<?= $model->alternativas[3]->id ?>">
        <input type="text" name="alternativaD" placeholder="descrição da alternativa" value="<?= $model->alternativas[3]->description?>"/>
        <input type="text" name="corretudeD" placeholder="Grau de corretude" value="<?= $model->alternativas[3]->corretude?>"/>
        <br>

        <input type="radio" name="correta" value="e" <?= ($model->correta == 'e')? 'checked' : "" ?> >
        <input type="hidden" name="idE" value="<?= $model->alternativas[4]->id ?>">
        <input type="text" name="alternativaE" placeholder="descrição da alternativa" value="<?= $model->alternativas[4]->description?>"/>
        <input type="text" name="corretudeE" placeholder="Grau de corretude" value="<?= $model->alternativas[4]->corretude?>"/>
        <br>
    <?php }else { ?>
        <input type="radio" name="correta" value="a">
        <input type="text" name="alternativaA" placeholder="descrição da alternativa"/>
        <input type="text" name="corretudeA" placeholder="Grau de corretude"/>
        <br>

        <input type="radio" name="correta" value="b">
        <input type="text" name="alternativaB" placeholder="descrição da alternativa"/>
        <input type="text" name="corretudeB" placeholder="Grau de corretude"/>
        <br>

        <input type="radio" name="correta" value="c">
        <input type="text" name="alternativaC" placeholder="descrição da alternativa"/>
        <input type="text" name="corretudeC" placeholder="Grau de corretude"/>
        <br>

        <input type="radio" name="correta" value="d">
        <input type="text" name="alternativaD" placeholder="descrição da alternativa"/>
        <input type="text" name="corretudeD" placeholder="Grau de corretude"/>
        <br>

        <input type="radio" name="correta" value="e">
        <input type="text" name="alternativaE" placeholder="descrição da alternativa"/>
        <input type="text" name="corretudeE" placeholder="Grau de corretude"/>
        <br>
    <?php    }   ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Novo' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
