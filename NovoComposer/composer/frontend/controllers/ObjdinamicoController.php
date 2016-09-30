<?php

namespace frontend\controllers;

use common\models\CapituloHasObjDinamico;
use Yii;
use common\models\ObjDinamico;
use common\models\ObjdinamicoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ObjdinamicoController implements the CRUD actions for ObjDinamico model.
 */
class ObjdinamicoController extends Controller
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
     * Lists all ObjDinamico models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjdinamicoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ObjDinamico model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id, $capitulo_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'capitulo_id'=> $capitulo_id
        ]);
    }

    /**
     * Creates a new ObjDinamico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ObjDinamico();
        $model->avaliacao = 0;

        if ($model->load(Yii::$app->request->post())){
            $model->tipo = implode(",", $model->tipo);
            $model->caminho = UploadedFile::getInstance($model, 'caminho');
            $model->upload();

            if($model->save()) {
                $parametros = Yii::$app->request->post();

                $relacao = new CapituloHasObjDinamico();
                $relacao->Capitulo_id = $parametros['Capitulo_id'];
                $relacao->ObjDinamico_id = $model->id;
                $relacao->save();

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ObjDinamico model.
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
     * Deletes an existing ObjDinamico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id, $capitulo_id)
    {
        CapituloHasObjDinamico::find()->where(['ObjDinamico_id'=>$id])
            ->andWhere(['Capitulo_id'=>$capitulo_id])->one()->delete();

        Yii::$app->session->setFlash('success', 'Objeto dinâmico excluído com sucesso.');
        return $this->redirect(['capitulo/view', 'id' => $capitulo_id]);
    }

    /**
     * Finds the ObjDinamico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ObjDinamico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ObjDinamico::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
