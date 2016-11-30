<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Alternativa */

$this->title = 'Update Alternativa: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Alternativas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'Questao_id' => $model->Questao_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alternativa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
