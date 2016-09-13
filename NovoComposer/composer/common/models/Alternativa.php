<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Alternativa".
 *
 * @property integer $id
 * @property integer $description
 * @property integer $corretude
 * @property string $Questao_id
 *
 * @property Questao $questao
 */
class Alternativa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Alternativa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'corretude', 'Questao_id'], 'required'],
            [['description', 'corretude'], 'integer'],
            [['Questao_id'], 'string', 'max' => 255],
            [['Questao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Questao::className(), 'targetAttribute' => ['Questao_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'corretude' => 'Corretude',
            'Questao_id' => 'Questao ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestao()
    {
        return $this->hasOne(Questao::className(), ['id' => 'Questao_id']);
    }
}
