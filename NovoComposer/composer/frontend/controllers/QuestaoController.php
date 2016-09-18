<?php

namespace frontend\controllers;

use common\models\ObjQuestionarioHasQuestao;
use Yii;
use common\models\Questao;
use common\models\QuestaoSearch;
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
