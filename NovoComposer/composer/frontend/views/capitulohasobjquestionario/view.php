<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CapituloHasObjQuestionario */

$this->title = $model->Capitulo_id;
$this->params['breadcrumbs'][] = ['label' => 'Capitulo Has Obj Questionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capitulo-has-obj-questionario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Capitulo_id' => $model->Capitulo_id, 'ObjQuestionario_id' => $model->ObjQuestionario_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Capitulo_id' => $model->Capitulo_id, 'ObjQuestionario_id' => $model->ObjQuestionario_id], [
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
            'Capitulo_id',
            'ObjQuestionario_id',
        ],
    ]) ?>

</div>
