<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Capitulo_has_ObjTexto".
 *
 * @property integer $Capitulo_id
 * @property integer $ObjTexto_id
 *
 * @property Capitulo $capitulo
 * @property ObjTexto $objTexto
 */
class CapituloHasObjtexto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Capitulo_has_ObjTexto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Capitulo_id', 'ObjTexto_id'], 'required'],
            [['Capitulo_id', 'ObjTexto_id'], 'integer'],
            [['Capitulo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Capitulo::className(), 'targetAttribute' => ['Capitulo_id' => 'id']],
            [['ObjTexto_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObjTexto::className(), 'targetAttribute' => ['ObjTexto_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Capitulo_id' => 'Capitulo ID',
            'ObjTexto_id' => 'Obj Texto ID',
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
    public function getObjTexto()
    {
        return $this->hasOne(ObjTexto::className(), ['id' => 'ObjTexto_id']);
    }
}
