<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ObjGaleria_has_Imagem".
 *
 * @property integer $ObjGaleria_id
 * @property integer $Imagem_id
 *
 * @property Imagem $imagem
 * @property ObjGaleria $objGaleria
 */
class ObjGaleriaHasImagem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ObjGaleria_has_Imagem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ObjGaleria_id', 'Imagem_id'], 'required'],
            [['ObjGaleria_id', 'Imagem_id'], 'integer'],
            [['Imagem_id'], 'exist', 'skipOnError' => true, 'targetClass' => Imagem::className(), 'targetAttribute' => ['Imagem_id' => 'id']],
            [['ObjGaleria_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObjGaleria::className(), 'targetAttribute' => ['ObjGaleria_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ObjGaleria_id' => 'Obj Galeria ID',
            'Imagem_id' => 'Imagem ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagem()
    {
        return $this->hasOne(Imagem::className(), ['id' => 'Imagem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjGaleria()
    {
        return $this->hasOne(ObjGaleria::className(), ['id' => 'ObjGaleria_id']);
    }
}
