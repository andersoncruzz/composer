<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ObjDinamico */

$this->title = 'Update Obj Dinamico: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Obj Dinamicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="obj-dinamico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
