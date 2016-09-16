<?php

namespace frontend\controllers;

use Yii;
use common\models\CapituloHasObjQuestionario;
use common\models\CapitulohasobjquestionarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CapitulohasobjquestionarioController implements the CRUD actions for CapituloHasObjQuestionario model.
 */
class CapitulohasobjquestionarioController extends Controller
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
     * Lists all CapituloHasObjQuestionario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CapitulohasobjquestionarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CapituloHasObjQuestionario model.
     * @param integer $Capitulo_id
     * @param integer $ObjQuestionario_id
     * @return mixed
     */
    public function actionView($Capitulo_id, $ObjQuestionario_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Capitulo_id, $ObjQuestionario_id),
        ]);
    }

    /**
     * Creates a new CapituloHasObjQuestionario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CapituloHasObjQuestionario();

        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            return $this->redirect(['view', 'Capitulo_id' => $model->Capitulo_id, 'ObjQuestionario_id' => $model->ObjQuestionario_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CapituloHasObjQuestionario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Capitulo_id
     * @param integer $ObjQuestionario_id
     * @return mixed
     */
    public function actionUpdate($Capitulo_id, $ObjQuestionario_id)
    {
        $model = $this->findModel($Capitulo_id, $ObjQuestionario_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Capitulo_id' => $model->Capitulo_id, 'ObjQuestionario_id' => $model->ObjQuestionario_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CapituloHasObjQuestionario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Capitulo_id
     * @param integer $ObjQuestionario_id
     * @return mixed
     */
    public function actionDelete($Capitulo_id, $ObjQuestionario_id)
    {
        $this->findModel($Capitulo_id, $ObjQuestionario_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CapituloHasObjQuestionario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Capitulo_id
     * @param integer $ObjQuestionario_id
     * @return CapituloHasObjQuestionario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Capitulo_id, $ObjQuestionario_id)
    {
        if (($model = CapituloHasObjQuestionario::findOne(['Capitulo_id' => $Capitulo_id, 'ObjQuestionario_id' => $ObjQuestionario_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
