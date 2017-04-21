<?php

namespace frontend\controllers;

use common\models\Capitulo;
use common\models\CapituloHasObjDinamico;
use Exception;
use frontend\models\ObjetoDeAprendizagem;
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
            if ($model->tipo != NULL) {
                $model->tipo = implode(",", $model->tipo);
            }

            //$model->tipo = implode(",", $model->tipo);
            $model->caminho = UploadedFile::getInstance($model, 'caminho');
            $model->upload();

            if($model->save()) {
                $parametros = Yii::$app->request->post();

                $relacao = new CapituloHasObjDinamico();
                $relacao->Capitulo_id = $parametros['Capitulo_id'];
                $relacao->ObjDinamico_id = $model->id;
                $relacao->save();


                /**
                 * Adiciona esse objeto de aprendizagem ao atributo ordem do Capitulo.
                 */

                $capitulo = Capitulo::findOne($parametros["Capitulo_id"]);

                $ordem = json_decode($capitulo->ordem, true);
                $objeto = new ObjetoDeAprendizagem("objdinamico", $model->assunto, count($ordem)+1, $model->id);

                $achou = 0;
                for($i = 0; $i < count($ordem); $i++){
                    try {
                        if ($ordem[$i]['tipo'] == "objdinamico" && $ordem[$i]['id'] == $model->id) {
                            $achou = 1;
                            break;
                        }
                    }catch(Exception $e){

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
        $capitulo = Capitulo::findOne($capitulo_id);
        $ordem = json_decode($capitulo->ordem, true);

        $achou = 0;
        var_dump($ordem);
        for($i = 1; $i < count($ordem); $i++){
            try {
                if ($ordem[$i]['tipo'] == "objdinamico" && $ordem[$i]['id'] == $id) {
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
            $capituloHasDinamico = CapituloHasObjDinamico::find()->where(['ObjDinamico_id'=>$id])
                ->andWhere(['Capitulo_id'=>$capitulo_id])->one();
            if($capituloHasDinamico!= null) {
                $capituloHasDinamico->delete();
            }

        }catch (Exception $e){

        }

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
