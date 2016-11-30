<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Capitulo */

$this->title = 'Novo Capítulo';
$this->params['breadcrumbs'][] = ['label' => 'Capitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capitulo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
