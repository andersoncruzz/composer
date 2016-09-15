<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Questao */

$this->title = 'Create Questao';
$this->params['breadcrumbs'][] = ['label' => 'Questaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="questao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        echo "<h1>".$_GET['id']."</h1>";
    ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
