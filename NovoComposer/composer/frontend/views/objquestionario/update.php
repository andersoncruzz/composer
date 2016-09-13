<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ObjQuestionario */

$this->title = 'Update Obj Questionario: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Obj Questionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="obj-questionario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
