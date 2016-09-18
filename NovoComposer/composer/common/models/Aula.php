<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Aula".
 *
 * @property integer $id
 * @property string $subject
 * @property integer $qtChapters
 * @property integer $Disciplina_id
 *
 * @property Disciplina $disciplina
 * @property Capitulo[] $capitulos
 */
class Aula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Aula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'Disciplina_id'], 'required'],
            [['qtChapters', 'Disciplina_id'], 'integer'],
            [['subject'], 'string', 'max' => 255],
            [['Disciplina_id'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['Disciplina_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'qtChapters' => 'Qt Chapters',
            'Disciplina_id' => 'Disciplina ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id' => 'Disciplina_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapitulos()
    {
        return $this->hasMany(Capitulo::className(), ['Aula_id' => 'id']);
    }
}
