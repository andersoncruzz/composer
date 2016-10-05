<?php

namespace common\models;

use frontend\models\ObjetoDeAprendizagem;
use Yii;

/**
 * This is the model class for table "Questao".
 *
 * @property integer $id
 * @property string $nivel
 * @property string $assunto
 * @property string $enunciado
 * @property integer $duracao
 * @property string $dica
 * @property integer $conteudo_id
 * @property string $correta
 *
 * @property ObjetoDeAprendizagem $conteudo
 * @property Alternativa[] $alternativas
 * @property ObjQuestionarioHasQuestao[] $objQuestionarioHasQuestaos
 * @property ObjQuestionario[] $objQuestionarios
 */
class Questao extends \yii\db\ActiveRecord
{
    public $id_questionario;

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
            [['nivel', 'enunciado', 'duracao', 'dica'], 'required'],
            [['enunciado', 'dica'], 'string'],
            [['duracao'], 'integer'],
            [['nivel'], 'integer'],
            [['conteudo'], 'integer'],
            [['assunto'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nivel' => 'Dificuldade',
            'assunto' => 'Assunto',
            'enunciado' => 'Enunciado',
            'duracao' => 'Duracao',
            'dica' => 'Dica',
            'correta' => "Correta",
            'conteudo'=> "Conteúdo relacionado"
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
