<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Aula;

/* @var $this yii\web\View */
/* @var $model common\models\Disciplina */
/* @var $aulas common\models\Aula */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Disciplinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplina-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja deletar esse item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Nova Aula', ['aula/create', 'Disciplina_id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
        ],
    ]) ?>


    <p>
    <?php
        foreach ($model->aulas as $aula){
            echo Html::a($aula->subject, ['aula/view', 'id' => $aula->id], ['class' => 'btn btn-defaut']);
        }
    ?>
    </p>
</div>
