<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Capitulo_has_ObjGaleria".
 *
 * @property integer $Capitulo_id
 * @property integer $ObjGaleria_id
 *
 * @property Capitulo $capitulo
 * @property ObjGaleria $objGaleria
 */
class CapituloHasObjGaleria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Capitulo_has_ObjGaleria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Capitulo_id', 'ObjGaleria_id'], 'required'],
            [['Capitulo_id', 'ObjGaleria_id'], 'integer'],
            [['Capitulo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Capitulo::className(), 'targetAttribute' => ['Capitulo_id' => 'id']],
            [['ObjGaleria_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObjGaleria::className(), 'targetAttribute' => ['ObjGaleria_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Capitulo_id' => 'Capitulo ID',
            'ObjGaleria_id' => 'Obj Galeria ID',
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
    public function getObjGaleria()
    {
        return $this->hasOne(ObjGaleria::className(), ['id' => 'ObjGaleria_id']);
    }
}
