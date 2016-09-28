<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Capitulo".
 *
 * @property integer $id
 * @property string $titulo
 * @property integer $qtObjects
 * @property integer $Aula_id
 * @property integer $dificuldade
 * @property string $ordem
 *
 * @property Aula $aula
 * @property CapituloHasObjApresentacao[] $capituloHasObjApresentacaos
 * @property ObjApresentacao[] $objApresentacaos
 * @property CapituloHasObjDinamico[] $capituloHasObjDinamicos
 * @property ObjDinamico[] $objDinamicos
 * @property CapituloHasObjGaleria[] $capituloHasObjGalerias
 * @property ObjGaleria[] $objGalerias
 * @property CapituloHasObjQuestionario[] $capituloHasObjQuestionarios
 * @property ObjQuestionario[] $objQuestionarios
 * @property CapituloHasObjTexto[] $capituloHasObjTextos
 * @property ObjTexto[] $objTextos
 * @property CapituloHasObjVideo[] $capituloHasObjVideos
 * @property ObjVideo[] $objVideos
 */
class Capitulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Capitulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'Aula_id'], 'required'],
            [['qtObjects', 'Aula_id', 'dificuldade'], 'integer'],
            [['titulo'], 'string', 'max' => 255],
            [['Aula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['Aula_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'qtObjects' => 'Qt Objects',
            'Aula_id' => 'Aula ID',
            'dificuldade' => 'Dificuldade',
            'ordem' => 'Ordem'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAula()
    {
        return $this->hasOne(Aula::className(), ['id' => 'Aula_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapituloHasObjApresentacaos()
    {
        return $this->hasMany(CapituloHasObjApresentacao::className(), ['Capitulo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjApresentacaos()
    {
        return $this->hasMany(ObjApresentacao::className(), ['id' => 'ObjApresentacao_id'])->viaTable('Capitulo_has_ObjApresentacao', ['Capitulo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapituloHasObjDinamicos()
    {
        return $this->hasMany(CapituloHasObjDinamico::className(), ['Capitulo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjDinamicos()
    {
        return $this->hasMany(ObjDinamico::className(), ['id' => 'ObjDinamico_id'])->viaTable('Capitulo_has_ObjDinamico', ['Capitulo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapituloHasObjGalerias()
    {
        return $this->hasMany(CapituloHasObjGaleria::className(), ['Capitulo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjGalerias()
    {
        return $this->hasMany(ObjGaleria::className(), ['id' => 'ObjGaleria_id'])->viaTable('Capitulo_has_ObjGaleria', ['Capitulo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapituloHasObjQuestionarios()
    {
        return $this->hasMany(CapituloHasObjQuestionario::className(), ['Capitulo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjQuestionarios()
    {
        return $this->hasMany(ObjQuestionario::className(), ['id' => 'ObjQuestionario_id'])->viaTable('Capitulo_has_ObjQuestionario', ['Capitulo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapituloHasObjTextos()
    {
        return $this->hasMany(CapituloHasObjTexto::className(), ['Capitulo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjTextos()
    {
        return $this->hasMany(ObjTexto::className(), ['id' => 'ObjTexto_id'])->viaTable('Capitulo_has_ObjTexto', ['Capitulo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapituloHasObjVideos()
    {
        return $this->hasMany(CapituloHasObjVideo::className(), ['Capitulo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjVideos()
    {
        return $this->hasMany(ObjVideo::className(), ['id' => 'ObjVideo_id'])->viaTable('Capitulo_has_ObjVideo', ['Capitulo_id' => 'id']);
    }
}
