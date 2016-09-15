<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Capitulo */
/* @var $quiz common\models\ObjQuestionario */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Capitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capitulo-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja deletar esse capítulo?',
                'method' => 'post',
            ],
        ]) ?>

        <!--TODO: <?= Html::a('Novo Objeto', ['capitulo/create', 'Aula_id' => $model->id], ['class' => 'btn btn-primary']) ?>-->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titulo',
            'dificuldade',
        ],
    ]) ?>

    <div class="dropup">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Novo Objeto
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><?= Html::a('Texto', ['objtexto/create'])?></li>
            <li><?= Html::a('Galeria', ['objvideo/create'])?></li>
            <li><?= Html::a('Apresentação', ['objapresentacao/create'])?></li>
            <li><?= Html::a('Vídeo', ['objvideo/create'])?></li>
            <li><?= Html::a('Objeto dinâmico', ['objdinamico/create'])?></li>
            <li class="divider"></li>
            <li><?= Html::a('Questionario', ['objquestionario/create'])?></li>
        </ul>
    </div>

    <!--deve listar os objetos de aprendizagem do capítulo-->
    <p>
        <?php
        foreach ($model->objQuestionarios as $quiz){
            echo Html::a($quiz->assunto, ['objquestionario/view', 'id' => $quiz->id], ['class' => 'btn btn-defaut']);
        }
        ?>
    </p>

</div>
