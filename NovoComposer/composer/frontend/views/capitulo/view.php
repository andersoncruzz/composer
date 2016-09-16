<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Capitulo */
/* @var $quiz common\models\ObjQuestionario */
/* @var $texto common\models\Objtexto */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Capitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capitulo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja deletar esse capítulo?',
                'method' => 'post',
            ],
        ]) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titulo',
            'dificuldade',
        ],
    ]) ?>

    <div class="dropup">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Novo Objeto
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><?= Html::a('Texto', ['objtexto/create', 'Capitulo_id' => $model->id])?></li>
            <li><?= Html::a('Galeria', ['objvideo/create'])?></li>
            <li><?= Html::a('Apresentação', ['objapresentacao/create'])?></li>
            <li><?= Html::a('Vídeo', ['objvideo/create'])?></li>
            <li><?= Html::a('Objeto dinâmico', ['objdinamico/create'])?></li>
            <li class="divider"></li>
            <li><?= Html::a('Questionario', ['objquestionario/create', 'catitulo_id' => $model->id])?></li>
        </ul>
    </div>

    <br><label class="control-label" for="objquestionario-capitulo"> Questões </label>

    <div id="w1" class="grid-view">
        <div class="summary">
            Showing <b>1-<?= count($model->objQuestionarios)?></b> of <b>1</b> item.
        </div>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>
                    <a href="#" data-sort="id">ID</a>
                </th>
                <th>
                    <a href="#" data-sort="assunto">Assunto</a>
                </th>

                <th class="action-column">&nbsp;</th>
            </tr>
            </thead>
            <tbody>

            <?php

            foreach ($model->objQuestionarios as $key =>$questionario) {
                ?>

                <tr data-key="<?= $key?>">
                    <td><?=$questionario->id?></td>
                    <td><?=$questionario->assunto?></td>
                    <td>
                        <a href="/NovoCompose/NovoComposer/composer/frontend/web/index.php?r=objquestionario/view&amp;id=<?=$questionario->id ?>" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <a href="/NovoCompose/NovoComposer/composer/frontend/web/index.php?r=objquestionario/update&amp;id=<?=$questionario->id ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="/NovoCompose/NovoComposer/composer/frontend/web/index.php?r=objquestionario/delete&amp;id=<?=$questionario->id ?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php }?>

            </tbody></table>
    </div>

    <!--deve listar os objetos de aprendizagem do capítulo-->


</div>
