<?php

namespace frontend\controllers;

use common\models\Capitulo;
use common\models\CapituloHasObjQuestionario;
use Exception;
use frontend\models\ObjetoDeAprendizagem;
use Yii;
use Yii\base\ErrorException;
use common\models\ObjQuestionario;
use common\models\ObjquestionarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ObjquestionarioController implements the CRUD actions for ObjQuestionario model.
 */
class ObjquestionarioController extends Controller
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
     * Lists all ObjQuestionario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjquestionarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ObjQuestionario model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id, $capitulo_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'capitulo_id' => $capitulo_id
        ]);
    }

    /**
     * Creates a new ObjQuestionario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ObjQuestionario();

        if ($model->load(Yii::$app->request->post())) {
            $params = Yii::$app->request->post();


            $model->save();

            $capituloHasObjQuestionario = new CapituloHasObjQuestionario();
            $capituloHasObjQuestionario->ObjQuestionario_id = $model->id;
            $capituloHasObjQuestionario->Capitulo_id =$params["capitulo_id"];
            $capituloHasObjQuestionario->save();

            $capitulo = Capitulo::findOne($params["capitulo_id"]);

            $ordem = json_decode($capitulo->ordem, true);
            $objeto = new ObjetoDeAprendizagem("questionario", $model->assunto, count($ordem)+1, $model->id);

            $achou = 0;
            for($i = 1; $i < count($ordem); $i++){
                try {
                    if ($ordem[$i]['tipo'] == "questionario" && $ordem[$i]['id'] == $model->id) {
                        $achou = 1;
                        break;
                    }
                }catch (Exception $e){
                    continue;
                }
            }

            if($achou == 0) {
                $ordem[count($ordem) + 1] = $objeto;
            }

            $capitulo->ordem = json_encode($ordem);
            $capitulo->save(true);

            return $this->redirect(['questao/create', 'id' => $model->id, 'capitulo_id' => $params["capitulo_id"]]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ObjQuestionario model.
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
     * Deletes an existing ObjQuestionario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id, $capitulo_id)
    {

        $capitulo = Capitulo::findOne($capitulo_id);
        $ordem = json_decode($capitulo->ordem, true);

        $achou = 0;
        ///var_dump($ordem);
        for($i = 1; $i < count($ordem); $i++){
            try {
                if ($ordem[$i]['tipo'] == "questionario" && $ordem[$i]['id'] == $id) {
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
        /**
         * Reordena os indices.
         */
        $ordem = array_values($ordem);
        //var_dump($ordem);

        $capitulo->ordem = json_encode($ordem);
        $capitulo->save(true);

        try {
            $capituloHasQuestao = CapituloHasObjQuestionario::find()->where(['ObjQuestionario_id' => $id])
                ->andWhere(['Capitulo_id' => $capitulo_id])->one();
            if($capituloHasQuestao != null) {
                $capituloHasQuestao->delete();
            }

        }catch (Exception $e){

        }
        Yii::$app->session->setFlash('success', 'Questionário excluído com sucesso.');
        return $this->redirect(['capitulo/view', 'id' => $capitulo_id]);
    }

    /**
     * Finds the ObjQuestionario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ObjQuestionario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ObjQuestionario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
