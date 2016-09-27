<?php

use common\models\ObjquestionariohasquestaoSearch;
use common\models\QuestaoSearch;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ObjQuestionario */
/* @var $questao common\models\Questao */


$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Obj Questionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obj-questionario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Adicionar Questão', ['questao/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'assunto',
        ],
    ]) ?>

    <label class="control-label" for="objquestionario-capitulo"> Questões </label>

    <div id="w1" class="grid-view"><div class="summary">Showing <b>1-<?= count($model->questaos)?></b> of <b>1</b> item.</div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>
                        <a href="#" data-sort="id">ID</a>
                    </th>
                    <th>
                        <a href="#" data-sort="nivel">Nivel</a>
                    </th>
                    <th>
                        <a href="#" data-sort="assunto">Assunto</a>
                    </th>
                    <th>
                        <a href="#" data-sort="enunciado">Enunciado</a>
                    </th>
                    <th>
                        <a href="#" data-sort="duracao">Duracao</a>
                    </th>
                    <th class="action-column">&nbsp;</th>
                </tr>
            </thead>
            <tbody>

            <?php

                foreach ($model->questaos as $key =>$questao) {
                ?>

                <tr data-key="<?= $questao->id?>">
                    <td><?=$key?></td>
                    <td><?= $questao->id?></td>
                    <td><?= $questao->nivel?></td>
                    <td><?= $questao->assunto?></td>
                    <td><?= $questao->enunciado?></td>
                    <td><?= $questao->duracao?></td>

                    <td>
                        <?=Html::a(
                            'Visualizar',
                            ['questao/view', 'id'=>$questao->id]
                        )?>
                        <?=Html::a(
                            'Editar',
                            ['questao/update', 'id'=>$questao->id]
                        )?>
                        <?=Html::a(
                            'Excluir',
                            ['questao/delete', 'id'=>$questao->id],
                            ['data' => [
                                'confirm' => 'Tem certeza que deseja deletar esse item?',
                                'method' => 'post',
                            ],
                            ])?>
                    </td>
                </tr>
             <?php }?>

            </tbody></table>
    </div>

</div>
