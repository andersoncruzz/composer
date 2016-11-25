<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ObjdinamicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Obj Dinamicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-dinamico-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Obj Dinamico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'assunto',
            'caminho',
            'descricao:ntext',
            'topicos:ntext',
            // 'exerciciosResolvidos',
            // 'duracao',
            // 'avaliacao',
            // 'referencias:ntext',
            // 'tipo:ntext',
            // 'serie',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
