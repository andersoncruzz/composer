<?php

namespace frontend\controllers;

use common\models\Capitulo;
use common\models\CapituloHasObjVideo;
use Exception;
use frontend\models\ObjetoDeAprendizagem;
use Yii;
use common\models\ObjVideo;
use common\models\ObjvideoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ObjvideoController implements the CRUD actions for ObjVideo model.
 */
class ObjvideoController extends Controller
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
     * Lists all ObjVideo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjvideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ObjVideo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id, $capitulo_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'capitulo_id'=>$capitulo_id
        ]);
    }

    /**
     * Creates a new ObjVideo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ObjVideo();
        $model->avaliacao = 0;

        if ($model->load(Yii::$app->request->post())){
            $model->tipo = implode(",", $model->tipo);
            $arquivo = UploadedFile::getInstance($model, 'caminho');
            $model->caminho = "";

            if($model->save()) {
                $parametros = Yii::$app->request->post();

                $model->caminho = $arquivo;
                $model->upload();
                $model->update();

                $relacao = new CapituloHasObjVideo();
                $relacao->Capitulo_id = $parametros['Capitulo_id'];
                $relacao->ObjVideo_id = $model->id;
                $relacao->save();

                /**
                 * Adiciona esse objeto de aprendizagem ao atributo ordem do Capitulo.
                 */

                $capitulo = Capitulo::findOne($parametros["Capitulo_id"]);

                $ordem = json_decode($capitulo->ordem, true);
                $objeto = new ObjetoDeAprendizagem("objvideo", $model->assunto, count($ordem)+1, $model->id);

                $achou = 0;
                for($i = 0; $i < count($ordem); $i++){
                    if($ordem[$i]['tipo'] == "objvideo" && $ordem[$i]['id'] == $model->id){
                        $achou = 1;
                        break;
                    }
                }

                if($achou == 0) {
                    $ordem[count($ordem) + 1] = $objeto;
                }

                $capitulo->ordem = json_encode($ordem);
                $capitulo->save(true);

                return $this->redirect(['capitulo/view', 'id' => $relacao->Capitulo_id]);
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
     * Updates an existing ObjVideo model.
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
     * Deletes an existing ObjVideo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id, $capitulo_id)
    {
        $capitulo = Capitulo::findOne($capitulo_id);
        $ordem = json_decode($capitulo->ordem, true);

        $achou = 0;
        var_dump($ordem);
        for($i = 1; $i < count($ordem); $i++){
            try {
                if ($ordem[$i]['tipo'] == "objvideo" && $ordem[$i]['id'] == $id) {
                    /**
                     * Remove o objeto de aprendizagem.
                     */
                    unset($ordem[$i]);
                    $achou = 1;
                    break;
                }
            }catch (Exception $e){
                continue;
            }

        }
        echo "<br>achou: ".$achou."<br>";
        var_dump($ordem);

        /**
         * Reordena os indices.
         */
        $ordem = array_values($ordem);
        $capitulo->ordem = json_encode($ordem);
        $capitulo->save(true);

        try {
            $capituloHasVideo = CapituloHasObjVideo::find()->where(['ObjVideo_id'=>$id])
                ->andWhere(['Capitulo_id'=>$capitulo_id])->one();
            if($capituloHasVideo!= null) {
                $capituloHasVideo->delete();
            }

        }catch (Exception $e){

        }

        Yii::$app->session->setFlash('success', 'Vídeo excluído com sucesso.');
        return $this->redirect(['capitulo/view', 'id' => $capitulo_id]);
    }

    /**
     * Finds the ObjVideo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ObjVideo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ObjVideo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
