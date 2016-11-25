<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ObjGaleria */

$this->title = 'Update Obj Galeria: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Obj Galerias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="obj-galeria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
