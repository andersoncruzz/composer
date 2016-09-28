<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ObjApresentacao */

$this->title = 'Create Obj Apresentacao';
$this->params['breadcrumbs'][] = ['label' => 'Obj Apresentacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-apresentacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
