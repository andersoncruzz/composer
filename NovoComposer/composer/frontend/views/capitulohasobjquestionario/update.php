<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CapituloHasObjQuestionario */

$this->title = 'Update Capitulo Has Obj Questionario: ' . $model->Capitulo_id;
$this->params['breadcrumbs'][] = ['label' => 'Capitulo Has Obj Questionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Capitulo_id, 'url' => ['view', 'Capitulo_id' => $model->Capitulo_id, 'ObjQuestionario_id' => $model->ObjQuestionario_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="capitulo-has-obj-questionario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
