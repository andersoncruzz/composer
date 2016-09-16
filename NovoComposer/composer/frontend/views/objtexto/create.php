<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ObjTexto */

$this->title = 'Create Obj Texto';
$this->params['breadcrumbs'][] = ['label' => 'Obj Textos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-texto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
