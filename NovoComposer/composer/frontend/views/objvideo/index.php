<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ObjvideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Obj Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-video-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Obj Video', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'assunto',
            'caminho',
            'topicos:ntext',
            'exerciciosResolvidos',
            // 'tipo:ntext',
            // 'duracao',
            // 'serie',
            // 'avaliacao',
            // 'referencias:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
