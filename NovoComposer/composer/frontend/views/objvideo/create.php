<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ObjVideo */

$this->title = 'Create Obj Video';
$this->params['breadcrumbs'][] = ['label' => 'Obj Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
