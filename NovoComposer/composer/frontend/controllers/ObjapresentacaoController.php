<?php

namespace frontend\controllers;

use common\models\Capitulo;
use common\models\CapituloHasObjApresentacao;
use Exception;
use frontend\models\ObjetoDeAprendizagem;
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

            $arquivo = UploadedFile::getInstance($model, 'caminho');
            $model->extension = $arquivo->extension;
            $model->caminho = "";

            if($model->save()) {
                $parametros = Yii::$app->request->post();
                $model->caminho = $arquivo;
                $model->upload();
                $model->update();

                $relacao = new CapituloHasObjApresentacao();
                $relacao->Capitulo_id = $parametros['Capitulo_id'];
                $relacao->ObjApresentacao_id = $model->id;
                $relacao->save();


                /**
                 * Adiciona esse objeto de aprendizagem ao atributo ordem do Capitulo.
                 */

                $capitulo = Capitulo::findOne($parametros["Capitulo_id"]);

                $ordem = json_decode($capitulo->ordem, true);
                $objeto = new ObjetoDeAprendizagem("objapresentacao", $model->assunto, count($ordem)+1, $model->id);

                $achou = 0;
                for($i = 1; $i < count($ordem); $i++){
                    try {
                        if ($ordem[$i]['tipo'] == "objapresentacao" && $ordem[$i]['id'] == $model->id) {
                            $achou = 1;
                            break;
                        }
                    }catch (Exception $e){

                    }
                }

                if($achou == 0) {
                    $ordem[count($ordem) + 1] = $objeto;
                }

                $capitulo->ordem = json_encode($ordem);
                $capitulo->save(true);

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
        $capitulo = Capitulo::findOne($capitulo_id);
        $ordem = json_decode($capitulo->ordem, true);

        $achou = 0;
        var_dump($ordem);
        for($i = 0; $i < count($ordem); $i++){
            try {
                if ($ordem[$i]['tipo'] == "objapresentacao" && $ordem[$i]['id'] == $id) {
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
            $capituloHasApresentacao =  CapituloHasObjApresentacao::find()->where(['ObjApresentacao_id'=>$id])
                ->andWhere(['Capitulo_id'=>$capitulo_id])->one();
            if($capituloHasApresentacao != null) {
                $capituloHasApresentacao->delete();
            }

        }catch (Exception $e){

        }

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
