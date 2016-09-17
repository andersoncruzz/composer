<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ObjquestionariohasquestaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Obj Questionario Has Questaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-questionario-has-questao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Obj Questionario Has Questao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ObjQuestionario_id',
            'Questao_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
