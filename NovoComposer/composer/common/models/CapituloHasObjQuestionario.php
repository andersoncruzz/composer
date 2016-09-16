<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Capitulo_has_ObjQuestionario".
 *
 * @property integer $Capitulo_id
 * @property integer $ObjQuestionario_id
 *
 * @property Capitulo $capitulo
 * @property ObjQuestionario $objQuestionario
 */
class CapituloHasObjQuestionario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Capitulo_has_ObjQuestionario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Capitulo_id', 'ObjQuestionario_id'], 'required'],
            [['Capitulo_id', 'ObjQuestionario_id'], 'integer'],
            [['Capitulo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Capitulo::className(), 'targetAttribute' => ['Capitulo_id' => 'id']],
            [['ObjQuestionario_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObjQuestionario::className(), 'targetAttribute' => ['ObjQuestionario_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Capitulo_id' => 'Capitulo ID',
            'ObjQuestionario_id' => 'Obj Questionario ID',
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
    public function getObjQuestionario()
    {
        return $this->hasOne(ObjQuestionario::className(), ['id' => 'ObjQuestionario_id']);
    }
}
