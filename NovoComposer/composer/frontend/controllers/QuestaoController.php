<?php

namespace frontend\controllers;

use common\models\Alternativa;
use common\models\ObjQuestionarioHasQuestao;
use Yii;
use common\models\Questao;
use common\models\QuestaoSearch;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuestaoController implements the CRUD actions for Questao model.
 */
class QuestaoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Questao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuestaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Questao model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Questao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Questao();

        if ($model->load(Yii::$app->request->post()) ) {
            //salva questão =>  pega id
            $param = Yii::$app->request->post();
            $model->correta = $param["correta"];
//            print_r($param);
            /**
             * Salva a questão no Banco.
             */
           $model->save();

            /**
             * Pega o id_questao que está no hidden input.
             */
            echo $param["id_questionario"];

            /**
             * Salva na Tabela Questionario tem questão. [relação M:N]
             */
            $objQuestionarioHasQuestao = new ObjQuestionarioHasQuestao();
            $objQuestionarioHasQuestao->ObjQuestionario_id = $param["id_questionario"];
            $objQuestionarioHasQuestao->Questao_id = $model->id;
            $objQuestionarioHasQuestao->save();

            $a = new Alternativa();
            $a->corretude =  intval($param["corretudeA"]);
            $a->description = $param["alternativaA"];
            $a->Questao_id = intval($model->id);
            echo "A: ".$a->save(false);

            $b = new Alternativa();
            $b->corretude =  intval($param["corretudeB"]);
            $b->description = $param["alternativaB"];
            $b->Questao_id = intval($model->id);
            echo "B: ".$b->save(false);

            $c = new Alternativa();
            $c->corretude =  intval($param["corretudeC"]);
            $c->description = $param["alternativaC"];
            $c->Questao_id = intval($model->id);
            echo "C: ".$c->save(false);

            $d = new Alternativa();
            $d->corretude =  intval($param["corretudeD"]);
            $d->description = $param["alternativaD"];
            $d->Questao_id = intval($model->id);
            echo "D: ".$d->save(false);

            $e = new Alternativa();
            $e->corretude =  intval($param["corretudeE"]);
            $e->description = $param["alternativaE"];
            $e->Questao_id = intval($model->id);
            echo "E: ".$e->save(false);


            /**
             * Redireciona para a tela de visualização do questionario.
             */
            Yii::$app->session->setFlash('success', 'Questão inserida com sucesso.');
            return $this->redirect(['objquestionario/view', 'id' => $param["id_questionario"]]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Questao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $param = Yii::$app->request->post();
            //var_dump($param);

            $a = Alternativa::findOne($param["idA"]);
            $a->corretude =  intval($param["corretudeA"]);
            $a->description = $param["alternativaA"];
            echo "a: ".$a->save(false);

            $b = Alternativa::findOne($param["idB"]);
            $b->corretude =  intval($param["corretudeB"]);
            $b->description = $param["alternativaB"];
            echo "B: ".$b->save(false);

            $c = Alternativa::findOne($param["idC"]);
            $c->corretude =  intval($param["corretudeC"]);
            $c->description = $param["alternativaC"];
            echo "c: ".$c->save(false);

            $d = Alternativa::findOne($param["idD"]);
            $d->corretude =  intval($param["corretudeD"]);
            $d->description = $param["alternativaD"];
            echo "d: ".$d->save(false);

            $e = Alternativa::findOne($param["idE"]);
            $e->corretude =  intval($param["corretudeE"]);
            $e->description = $param["alternativaE"];
            echo "e: ".$e->save(false);

            $model->correta = $param["correta"];
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Questao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id, $idquestionario)
    {
        echo ObjQuestionarioHasQuestao::find()->where(['ObjQuestionario_id'=>$idquestionario])
        ->andWhere(['Questao_id'=>$id])->one()->delete();

        Yii::$app->session->setFlash('success', 'Questão excluída com sucesso.');
        return $this->redirect(['objquestionario/view', 'id' => $idquestionario]);
    }

    /**
     * Finds the Questao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Questao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Questao::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
