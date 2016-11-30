<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ObjQuestionarioHasQuestao */

$this->title = 'Update Obj Questionario Has Questao: ' . $model->ObjQuestionario_id;
$this->params['breadcrumbs'][] = ['label' => 'Obj Questionario Has Questaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ObjQuestionario_id, 'url' => ['view', 'ObjQuestionario_id' => $model->ObjQuestionario_id, 'Questao_id' => $model->Questao_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="obj-questionario-has-questao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
