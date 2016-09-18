<?php

namespace frontend\controllers;

use Yii;
use common\models\ObjQuestionarioHasQuestao;
use common\models\ObjquestionariohasquestaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ObjquestionariohasquestaoController implements the CRUD actions for ObjQuestionarioHasQuestao model.
 */
class ObjquestionariohasquestaoController extends Controller
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
     * Lists all ObjQuestionarioHasQuestao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjquestionariohasquestaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ObjQuestionarioHasQuestao model.
     * @param integer $ObjQuestionario_id
     * @param integer $Questao_id
     * @return mixed
     */
    public function actionView($ObjQuestionario_id, $Questao_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ObjQuestionario_id, $Questao_id),
        ]);
    }

    /**
     * Creates a new ObjQuestionarioHasQuestao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ObjQuestionarioHasQuestao();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ObjQuestionario_id' => $model->ObjQuestionario_id, 'Questao_id' => $model->Questao_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ObjQuestionarioHasQuestao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ObjQuestionario_id
     * @param integer $Questao_id
     * @return mixed
     */
    public function actionUpdate($ObjQuestionario_id, $Questao_id)
    {
        $model = $this->findModel($ObjQuestionario_id, $Questao_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ObjQuestionario_id' => $model->ObjQuestionario_id, 'Questao_id' => $model->Questao_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ObjQuestionarioHasQuestao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ObjQuestionario_id
     * @param integer $Questao_id
     * @return mixed
     */
    public function actionDelete($ObjQuestionario_id, $Questao_id)
    {
        $this->findModel($ObjQuestionario_id, $Questao_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ObjQuestionarioHasQuestao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ObjQuestionario_id
     * @param integer $Questao_id
     * @return ObjQuestionarioHasQuestao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ObjQuestionario_id, $Questao_id)
    {
        if (($model = ObjQuestionarioHasQuestao::findOne(['ObjQuestionario_id' => $ObjQuestionario_id, 'Questao_id' => $Questao_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
