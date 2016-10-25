<?php

namespace frontend\controllers;

use common\models\Capitulo;
use common\models\CapituloHasObjtexto;
use Exception;
use frontend\models\ObjetoDeAprendizagem;
use Yii;
use common\models\ObjTexto;
use common\models\ObjtextoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ObjtextoController implements the CRUD actions for ObjTexto model.
 */
class ObjtextoController extends Controller
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
     * Lists all ObjTexto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjtextoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ObjTexto model.
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
     * Creates a new ObjTexto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ObjTexto();

        if ($model->load(Yii::$app->request->post())) {
            $model->tipo = implode(",", $model->tipo);
            if($model->save()){
                $parametros = Yii::$app->request->post();

                $relacao = new CapituloHasObjtexto();
                $relacao->Capitulo_id = $parametros['Capitulo_id'];
                $relacao->ObjTexto_id = $model->id;
                $relacao->save();

                $capitulo = Capitulo::findOne($parametros["Capitulo_id"]);

                $ordem = json_decode($capitulo->ordem, true);
                $objeto = new ObjetoDeAprendizagem("objtexto", $model->assunto, count($ordem)+1, $model->id);

                $achou = 0;
                for($i = 1; $i < count($ordem); $i++){
                    try {
                        if ($ordem[$i]['tipo'] == "questionario" && $ordem[$i]['id'] == $model->id) {
                            $achou = 1;
                            break;
                        }
                    } catch (Exception $e){

                    }
                }

                if($achou == 0) {
                    $ordem[count($ordem) + 1] = $objeto;
                }

                $capitulo->ordem = json_encode($ordem);
                $capitulo->save(true);

                return $this->redirect(['capitulo/view', 'id' => $relacao->Capitulo_id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ObjTexto model.
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
     * Deletes an existing ObjTexto model.
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

                if ($ordem[$i]['tipo'] == "objtexto" && $ordem[$i]['id'] == $id) {
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
        echo $capitulo->ordem;
        $capitulo->save(true);

        try {
            $capituloHasTexto = CapituloHasObjtexto::find()->where(['ObjTexto_id'=>$id])
                ->andWhere(['Capitulo_id'=>$capitulo_id])->one();
            if($capituloHasTexto != null) {
                $capituloHasTexto->delete();
            }

        }catch (Exception $e){

        }

        Yii::$app->session->setFlash('success', 'Texto excluído com sucesso.');
        return $this->redirect(['capitulo/view', 'id' => $capitulo_id]);
    }

    /**
     * Finds the ObjTexto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ObjTexto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ObjTexto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
