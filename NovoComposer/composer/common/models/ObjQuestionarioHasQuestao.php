<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ObjQuestionario_has_Questao".
 *
 * @property integer $ObjQuestionario_id
 * @property integer $Questao_id
 *
 * @property ObjQuestionario $objQuestionario
 * @property Questao $questao
 */
class ObjQuestionarioHasQuestao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ObjQuestionario_has_Questao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ObjQuestionario_id', 'Questao_id'], 'required'],
            [['ObjQuestionario_id', 'Questao_id'], 'integer'],
            [['ObjQuestionario_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObjQuestionario::className(), 'targetAttribute' => ['ObjQuestionario_id' => 'id']],
            [['Questao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Questao::className(), 'targetAttribute' => ['Questao_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ObjQuestionario_id' => 'Obj Questionario ID',
            'Questao_id' => 'Questao ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjQuestionario()
    {
        return $this->hasOne(ObjQuestionario::className(), ['id' => 'ObjQuestionario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestao()
    {
        return $this->hasOne(Questao::className(), ['id' => 'Questao_id']);
    }
}
