<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Perguntacp */

$this->title = 'Create Perguntacp';
$this->params['breadcrumbs'][] = ['label' => 'Perguntacps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perguntacp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
