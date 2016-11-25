<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ObjQuestionarioHasQuestao */

$this->title = $model->ObjQuestionario_id;
$this->params['breadcrumbs'][] = ['label' => 'Obj Questionario Has Questaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-questionario-has-questao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ObjQuestionario_id' => $model->ObjQuestionario_id, 'Questao_id' => $model->Questao_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ObjQuestionario_id' => $model->ObjQuestionario_id, 'Questao_id' => $model->Questao_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ObjQuestionario_id',
            'Questao_id',
        ],
    ]) ?>

</div>
