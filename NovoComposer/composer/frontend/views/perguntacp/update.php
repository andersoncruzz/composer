<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Perguntacp */

$this->title = 'Update Perguntacp: ' . $model->idPerguntaCP;
$this->params['breadcrumbs'][] = ['label' => 'Perguntacps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPerguntaCP, 'url' => ['view', 'id' => $model->idPerguntaCP]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perguntacp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
