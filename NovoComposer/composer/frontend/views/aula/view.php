<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Capitulo;

/* @var $this yii\web\View */
/* @var $model common\models\Aula */
/* @var $capitulo common\models\Capitulo */

$this->title = $model->subject;
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja deletar essa aula?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Novo Capitulo', ['capitulo/create', 'Aula_id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <!--<?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'subject',
            'Disciplina_id',
        ],
    ]) ?>-->

    <p>
        <?php
        foreach ($model->capitulos as $capitulo){
            echo Html::a($capitulo->titulo, ['capitulo/view', 'id' => $capitulo->id], ['class' => 'btn btn-defaut']);
        }
        ?>
    </p>
</div>
