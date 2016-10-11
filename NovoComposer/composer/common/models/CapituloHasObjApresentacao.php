<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Capitulo_has_ObjApresentacao".
 *
 * @property integer $Capitulo_id
 * @property integer $ObjApresentacao_id
 *
 * @property Capitulo $capitulo
 * @property ObjApresentacao $objApresentacao
 */
class CapituloHasObjApresentacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Capitulo_has_ObjApresentacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Capitulo_id', 'ObjApresentacao_id'], 'required'],
            [['Capitulo_id', 'ObjApresentacao_id'], 'integer'],
            [['Capitulo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Capitulo::className(), 'targetAttribute' => ['Capitulo_id' => 'id']],
            [['ObjApresentacao_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObjApresentacao::className(), 'targetAttribute' => ['ObjApresentacao_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Capitulo_id' => 'Capitulo ID',
            'ObjApresentacao_id' => 'Obj Apresentacao ID',
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
    public function getObjApresentacao()
    {
        return $this->hasOne(ObjApresentacao::className(), ['id' => 'ObjApresentacao_id']);
    }
}
