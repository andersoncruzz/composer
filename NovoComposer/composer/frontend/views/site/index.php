<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Composer';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>OpenLab</h1>
        <p class="lead">Composer</p>
        <?= Html::img('@web/img/education-png-4.png',['width'=>'300px', 'height' => '200px']);?>


    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Composer</h2>

                <p>É uma ferramenta para geração de material didático focado na plataforma de educação digital.
                    possibilita a criação de uma aula completa, baseada em recursos multimídia interativos por parte do
                    professor. Estes recursos são transformados em objetos de aprendizagem.</p>

            </div>
            <div class="col-lg-4">
                <h2>Player</h2>

                <p>Onde o professor e o aluno possam logar e ter acesso à aula previamente distribuída.
                    Os alunos podem acompanhar a aula interativa que foi elaborada.</p>

            </div>
            <div class="col-lg-4">
                <h2>Service</h2>

                <p>É o ‘servidor’ através do qual é criada a sala virtual, e onde os dados de todas as atividades
                    relacionadas à aula são processados e armazenados. </p>

            </div>
        </div>

    </div>
</div>
