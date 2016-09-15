<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ObjQuestionario".
 *
 * @property integer $id
 * @property string $assunto
 *
 * @property CapituloHasObjQuestionario[] $capituloHasObjQuestionarios
 * @property Capitulo[] $capitulos
 * @property ObjQuestionarioHasQuestao[] $objQuestionarioHasQuestaos
 * @property Questao[] $questaos
 */
class ObjQuestionario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ObjQuestionario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assunto'], 'required', 'message'=> "Este campo é obrigatório"],
            [['assunto'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'assunto' => 'Assunto/Tópico/Conceito',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapituloHasObjQuestionarios()
    {
        return $this->hasMany(CapituloHasObjQuestionario::className(), ['ObjQuestionario_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapitulos()
    {
        return $this->hasMany(Capitulo::className(), ['id' => 'Capitulo_id'])->viaTable('Capitulo_has_ObjQuestionario', ['ObjQuestionario_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjQuestionarioHasQuestaos()
    {
        return $this->hasMany(ObjQuestionarioHasQuestao::className(), ['ObjQuestionario_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestaos()
    {
        return $this->hasMany(Questao::className(), ['id' => 'Questao_id'])->viaTable('ObjQuestionario_has_Questao', ['ObjQuestionario_id' => 'id']);
    }
}
