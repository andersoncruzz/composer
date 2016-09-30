<?php

namespace frontend\controllers;

use common\models\CapituloHasObjApresentacao;
use Yii;
use common\models\ObjApresentacao;
use common\models\ObjapresentacaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ObjapresentacaoController implements the CRUD actions for ObjApresentacao model.
 */
class ObjapresentacaoController extends Controller
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
     * Lists all ObjApresentacao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjapresentacaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ObjApresentacao model.
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
     * Creates a new ObjApresentacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ObjApresentacao();

        if ($model->load(Yii::$app->request->post())){
            $model->tipo = implode(",", $model->tipo);
            $model->caminho = UploadedFile::getInstance($model, 'caminho');
            $model->extension = $model->caminho->extension;
            $model->upload();

            if($model->save()) {
                $parametros = Yii::$app->request->post();

                $relacao = new CapituloHasObjApresentacao();
                $relacao->Capitulo_id = $parametros['Capitulo_id'];
                $relacao->ObjApresentacao_id = $model->id;
                $relacao->save();

                return $this->redirect(['capitulo/view', 'id' => $relacao->Capitulo_id]);
            }else {
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
     * Updates an existing ObjApresentacao model.
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
     * Deletes an existing ObjApresentacao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id, $capitulo_id)
    {
        CapituloHasObjApresentacao::find()->where(['ObjApresentacao_id'=>$id])
            ->andWhere(['Capitulo_id'=>$capitulo_id])->one()->delete();

        Yii::$app->session->setFlash('success', 'Apresentação excluída com sucesso.');
        return $this->redirect(['capitulo/view', 'id' => $capitulo_id]);
    }

    /**
     * Finds the ObjApresentacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ObjApresentacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ObjApresentacao::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
