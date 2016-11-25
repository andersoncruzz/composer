<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CapitulohasobjquestionarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Capitulo Has Obj Questionarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capitulo-has-obj-questionario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Capitulo Has Obj Questionario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Capitulo_id',
            'ObjQuestionario_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
