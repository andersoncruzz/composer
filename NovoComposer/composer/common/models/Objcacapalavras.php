<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ObjCacapalavras".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $descricao
 *
 * @property ObjCacapalavrasHasCapitulo[] $objCacapalavrasHasCapitulos
 * @property Capitulo[] $capitulos
 * @property PerguntaCP[] $perguntaCPs
 */
class ObjCacapalavras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ObjCacapalavras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['descricao'], 'string'],
            [['titulo'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjCacapalavrasHasCapitulos()
    {
        return $this->hasMany(ObjCacapalavrasHasCapitulo::className(), ['ObjCacapalavras_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapitulos()
    {
        return $this->hasMany(Capitulo::className(), ['id' => 'Capitulo_id'])->viaTable('ObjCacapalavras_has_Capitulo', ['ObjCacapalavras_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerguntaCPs()
    {
        return $this->hasMany(PerguntaCP::className(), ['ObjCacapalavras_id' => 'id']);
    }
}
