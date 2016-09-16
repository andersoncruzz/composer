<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CapituloHasObjQuestionario */

$this->title = 'Create Capitulo Has Obj Questionario';
$this->params['breadcrumbs'][] = ['label' => 'Capitulo Has Obj Questionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capitulo-has-obj-questionario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
