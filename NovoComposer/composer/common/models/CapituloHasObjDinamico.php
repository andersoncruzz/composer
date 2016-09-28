<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Capitulo_has_ObjDinamico".
 *
 * @property integer $Capitulo_id
 * @property integer $ObjDinamico_id
 *
 * @property Capitulo $capitulo
 * @property ObjDinamico $objDinamico
 */
class CapituloHasObjDinamico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Capitulo_has_ObjDinamico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Capitulo_id', 'ObjDinamico_id'], 'required'],
            [['Capitulo_id', 'ObjDinamico_id'], 'integer'],
            [['Capitulo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Capitulo::className(), 'targetAttribute' => ['Capitulo_id' => 'id']],
            [['ObjDinamico_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObjDinamico::className(), 'targetAttribute' => ['ObjDinamico_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Capitulo_id' => 'Capitulo ID',
            'ObjDinamico_id' => 'Obj Dinamico ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapitulo()
    {
        return $this->hasOne(Capitulo::className(), ['id' => 'Capitulo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjDinamico()
    {
        return $this->hasOne(ObjDinamico::className(), ['id' => 'ObjDinamico_id']);
    }
}
