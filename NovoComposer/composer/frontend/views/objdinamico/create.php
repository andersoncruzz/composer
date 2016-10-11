<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ObjDinamico */

$this->title = 'Create Obj Dinamico';
$this->params['breadcrumbs'][] = ['label' => 'Obj Dinamicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-dinamico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
