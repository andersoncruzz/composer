<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Capitulo_has_ObjVideo".
 *
 * @property integer $Capitulo_id
 * @property integer $ObjVideo_id
 *
 * @property Capitulo $capitulo
 * @property ObjVideo $objVideo
 */
class CapituloHasObjVideo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Capitulo_has_ObjVideo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Capitulo_id', 'ObjVideo_id'], 'required'],
            [['Capitulo_id', 'ObjVideo_id'], 'integer'],
            [['Capitulo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Capitulo::className(), 'targetAttribute' => ['Capitulo_id' => 'id']],
            [['ObjVideo_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObjVideo::className(), 'targetAttribute' => ['ObjVideo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Capitulo_id' => 'Capitulo ID',
            'ObjVideo_id' => 'Obj Video ID',
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
    public function getObjVideo()
    {
        return $this->hasOne(ObjVideo::className(), ['id' => 'ObjVideo_id']);
    }
}
