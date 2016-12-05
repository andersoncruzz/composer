<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "PerguntaCP".
 *
 * @property integer $idPerguntaCP
 * @property string $pergunta
 * @property string $resposta
 * @property integer $tamanho
 * @property integer $ObjCacapalavras_id
 *
 * @property ObjCacapalavras $objCacapalavras
 */
class Perguntacp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PerguntaCP';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pergunta', 'resposta', 'tamanho', 'ObjCacapalavras_id'], 'required'],
            [['pergunta', 'resposta'], 'string'],
            [['tamanho', 'ObjCacapalavras_id'], 'integer'],
            [['ObjCacapalavras_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObjCacapalavras::className(), 'targetAttribute' => ['ObjCacapalavras_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPerguntaCP' => 'Id Pergunta Cp',
            'pergunta' => 'Pergunta',
            'resposta' => 'Resposta',
            'tamanho' => 'Tamanho',
            'ObjCacapalavras_id' => 'Obj Cacapalavras ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjCacapalavras()
    {
        return $this->hasOne(ObjCacapalavras::className(), ['id' => 'ObjCacapalavras_id']);
    }
}
