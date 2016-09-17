<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ObjQuestionario */

$this->title = 'Criar Questionário';
$this->params['breadcrumbs'][] = ['label' => 'Questionário', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-questionario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
