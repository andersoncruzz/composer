<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Capitulo */

$this->title = 'Atualizar Capítulo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Capitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '';
?>
<div class="capitulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-update', [
        'model' => $model,
    ]) ?>

</div>
