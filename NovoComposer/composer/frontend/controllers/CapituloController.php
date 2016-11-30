<?php

namespace frontend\controllers;

use common\models\CapituloHasObjApresentacao;
use common\models\CapituloHasObjDinamico;
use common\models\CapituloHasObjGaleria;
use common\models\CapituloHasObjQuestionario;
use common\models\CapituloHasObjtexto;
use common\models\CapituloHasObjVideo;
use common\models\ObjApresentacao;
use common\models\ObjDinamico;
use common\models\ObjGaleria;
use common\models\ObjQuestionario;
use common\models\ObjTexto;
use common\models\ObjVideo;
use Exception;
use frontend\models\ObjetoDeAprendizagem;
use Yii;
use common\models\Capitulo;
use common\models\CapituloSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CapituloController implements the CRUD actions for Capitulo model.
 */
class CapituloController extends Controller
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
     * Lists all Capitulo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CapituloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Capitulo model.
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
     * Creates a new Capitulo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Capitulo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['aula/view', 'id' => $model->Aula_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Capitulo model.
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
     * Deletes an existing Capitulo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionFind($titulo)
    {
        $sql = "
select temp.id, temp.assunto, temp.tipo from
(
SELECT ov.id, ov.assunto, 'objvideo' as tipo from ObjVideo ov
    UNION ALL
SELECT od.id, od.assunto, 'objdinamico' as tipo from ObjDinamico od
    UNION ALL
SELECT oq.id, oq.assunto, 'objquestionario' as tipo from ObjQuestionario oq
    UNION ALL
SELECT ot.id, ot.assunto, 'objtexto' as tipo from ObjTexto ot
    UNION ALL
select ap.id, ap.assunto, 'objapresentacao' as tipo from ObjApresentacao ap
    UNION ALL
select og.id, og.assunto,'objgaleria' as tipo from ObjGaleria og) as temp
where assunto like '%$titulo%'";

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);

        $result = $command->queryAll();
        return json_encode($result);
    }

    public function actionAdd($idCat, $idObj,  $type){

        try {
            $model = null;
            $relacao = null;

            if ($type == "objapresentacao"){
                $model = ObjApresentacao::findOne($idObj);

                $relacao = new CapituloHasObjApresentacao();
                $relacao->Capitulo_id = $idCat;
                $relacao->ObjApresentacao_id = $idObj;
                $relacao->save();

            }else if($type == "objgaleria"){
                $relacao = new CapituloHasObjGaleria();
                $relacao->Capitulo_id = $idCat;
                $relacao->ObjGaleria_id = $idObj;
                $relacao->save();

                $model = ObjGaleria::findOne($idObj);
            }else if($type == "objtexto"){
                $relacao = new CapituloHasObjtexto();
                $relacao->Capitulo_id = $idCat;
                $relacao->ObjTexto_id = $idObj;
                $relacao->save();

                $model = ObjTexto::findOne($idObj);
            }else if($type == "objquestionario"){
                $relacao = new CapituloHasObjQuestionario();
                $relacao->Capitulo_id = $idCat;
                $relacao->ObjQuestionario_id = $idObj;
                $relacao->save();

                $model = ObjQuestionario::findOne($idObj);
            }else if($type == "objdinamico") {
                $relacao = new CapituloHasObjDinamico();
                $relacao->Capitulo_id = $idCat;
                $relacao->ObjDinamico_id = $idCat;
                $relacao->save();

                $model = ObjDinamico::findOne($idObj);
            }else if($type == 'objvideo'){
                $relacao = new CapituloHasObjVideo();
                $relacao->Capitulo_id = $idCat;
                $relacao->ObjVideo_id = $idObj;
                $relacao->save(false);

                $model = ObjVideo::findOne($idObj);

            }

            $capitulo = Capitulo::findOne($idCat);

            $ordem = json_decode($capitulo->ordem, true);
            $objeto = new ObjetoDeAprendizagem($type, $model->assunto, count($ordem)+1, $model->id);

            $achou = 0;
            for($i = 1; $i < count($ordem); $i++){
                try {
                    if ($ordem[$i]['tipo'] == $type && $ordem[$i]['id'] == $model->id) {
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
        }catch (Exception $e){
            $relacao->isNewRecord = false;
            $relacao->save();
            echo "erroo";
        }finally {
            return $this->redirect(['capitulo/view', 'id' => $idCat]);
        }
    }


    /**
     * Finds the Capitulo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Capitulo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Capitulo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
