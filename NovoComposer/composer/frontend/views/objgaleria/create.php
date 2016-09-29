<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ObjGaleria */

$this->title = 'Create Obj Galeria';
$this->params['breadcrumbs'][] = ['label' => 'Obj Galerias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-galeria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
