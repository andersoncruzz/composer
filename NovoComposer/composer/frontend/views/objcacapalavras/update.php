<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Objcacapalavras */

$this->title = 'Update Objcacapalavras: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Objcacapalavras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="objcacapalavras-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
