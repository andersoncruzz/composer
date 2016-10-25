<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ObjTexto".
 *
 * @property integer $id
 * @property string $assunto
 * @property string $conteudo
 * @property string $topicos
 * @property integer $exerciciosResolvidos
 * @property string $tipo
 * @property integer $duracao
 * @property string $serie
 * @property integer $avaliacao
 * @property string $referencias
 *
 * @property CapituloHasObjTexto[] $capituloHasObjTextos
 * @property Capitulo[] $capitulos
 */
class ObjTexto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ObjTexto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assunto', 'conteudo', 'duracao', 'serie'], 'required'],
            [['exerciciosResolvidos', 'duracao', 'avaliacao'], 'integer'],
            [['conteudo', 'topicos', 'tipo', 'referencias'], 'string'],
            [['assunto'], 'string', 'max' => 255],
            [['serie'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'assunto' => 'Assunto',
            'conteudo' => 'Conteudo',
            'topicos' => 'Topicos',
            'exerciciosResolvidos' => 'Contém exercicios resolvidos?',
            'tipo' => 'Tipo',
            'duracao' => 'Duracao estimada(em minutos):',
            'serie' => 'Serie',
            'avaliacao' => 'Avaliacao',
            'referencias' => 'Referencias',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapituloHasObjTextos()
    {
        return $this->hasMany(CapituloHasObjTexto::className(), ['ObjTexto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapitulos()
    {
        return $this->hasMany(Capitulo::className(), ['id' => 'Capitulo_id'])->viaTable('Capitulo_has_ObjTexto', ['ObjTexto_id' => 'id']);
    }

    public function parseToJson(){

        $array_json["assunto"] = $this->assunto;
        $str = json_encode($array_json);
    }
}
