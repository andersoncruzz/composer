<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Alternativa */

$this->title = 'Create Alternativa';
$this->params['breadcrumbs'][] = ['label' => 'Alternativas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alternativa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
