<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Objcacapalavras */

$this->title = 'Create Objcacapalavras';
$this->params['breadcrumbs'][] = ['label' => 'Objcacapalavras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objcacapalavras-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
