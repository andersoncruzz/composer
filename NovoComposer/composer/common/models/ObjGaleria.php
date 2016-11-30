<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ObjGaleria".
 *
 * @property integer $id
 * @property string $assunto
 * @property integer $qteImagens
 * @property string $topicos
 * @property integer $exerciciosResolvidos
 * @property string $tipo
 * @property integer $duracao
 * @property string $serie
 * @property integer $avaliacao
 * @property string $referencias
 *
 * @property CapituloHasObjGaleria[] $capituloHasObjGalerias
 * @property Capitulo[] $capitulos
 * @property ObjGaleriaHasImagem[] $objGaleriaHasImagems
 * @property Imagem[] $imagems
 */
class ObjGaleria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ObjGaleria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assunto', 'topicos', 'exerciciosResolvidos', 'tipo', 'duracao', 'serie', 'referencias'], 'required'],
            [['qteImagens', 'exerciciosResolvidos', 'duracao', 'avaliacao'], 'integer'],
            [['topicos', 'tipo', 'referencias'], 'string'],
            [['assunto'], 'string', 'max' => 255],
            [['serie'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'assunto' => 'Assunto',
            'qteImagens' => 'Qte Imagens',
            'topicos' => 'Tópicos',
            'exerciciosResolvidos' => 'Contém exercícios resolvidos?',
            'tipo' => 'Tipo',
            'duracao' => 'Duração',
            'serie' => 'Série',
            'avaliacao' => 'Avaliacao',
            'referencias' => 'Referências',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapituloHasObjGalerias()
    {
        return $this->hasMany(CapituloHasObjGaleria::className(), ['ObjGaleria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapitulos()
    {
        return $this->hasMany(Capitulo::className(), ['id' => 'Capitulo_id'])->viaTable('Capitulo_has_ObjGaleria', ['ObjGaleria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjGaleriaHasImagems()
    {
        return $this->hasMany(ObjGaleriaHasImagem::className(), ['ObjGaleria_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagems()
    {
        return $this->hasMany(Imagem::className(), ['id' => 'Imagem_id'])->viaTable('ObjGaleria_has_Imagem', ['ObjGaleria_id' => 'id']);
    }
}
