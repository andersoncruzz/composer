<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ObjVideo */

$this->title = 'Update Obj Video: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Obj Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="obj-video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-update', [
        'model' => $model,
    ]) ?>

</div>
