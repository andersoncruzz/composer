<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ObjQuestionarioHasQuestao */

$this->title = 'Create Obj Questionario Has Questao';
$this->params['breadcrumbs'][] = ['label' => 'Obj Questionario Has Questaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-questionario-has-questao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
