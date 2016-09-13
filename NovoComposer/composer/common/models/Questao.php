<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Questao".
 *
 * @property string $id
 * @property string $nivel
 * @property string $assunto
 *
 * @property Alternativa[] $alternativas
 * @property ObjQuestionarioHasQuestao[] $objQuestionarioHasQuestaos
 * @property ObjQuestionario[] $objQuestionarios
 */
class Questao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Questao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nivel'], 'required'],
            [['id', 'assunto'], 'string', 'max' => 255],
            [['nivel'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nivel' => 'Nivel',
            'assunto' => 'Assunto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlternativas()
    {
        return $this->hasMany(Alternativa::className(), ['Questao_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjQuestionarioHasQuestaos()
    {
        return $this->hasMany(ObjQuestionarioHasQuestao::className(), ['Questao_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjQuestionarios()
    {
        return $this->hasMany(ObjQuestionario::className(), ['id' => 'ObjQuestionario_id'])->viaTable('ObjQuestionario_has_Questao', ['Questao_id' => 'id']);
    }
}
