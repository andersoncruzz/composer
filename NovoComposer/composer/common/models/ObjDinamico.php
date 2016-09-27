<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ObjDinamico".
 *
 * @property integer $id
 * @property string $assunto
 * @property string $caminho
 * @property string $descricao
 * @property string $topicos
 * @property integer $exerciciosResolvidos
 * @property integer $duracao
 * @property integer $avaliacao
 * @property string $referencias
 * @property string $tipo
 * @property string $serie
 *
 * @property CapituloHasObjDinamico[] $capituloHasObjDinamicos
 * @property Capitulo[] $capitulos
 */
class ObjDinamico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ObjDinamico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assunto'], 'required'],
            [['descricao', 'topicos', 'referencias', 'tipo'], 'string'],
            [['caminho'], 'file', 'skipOnEmpty' => true, 'extensions' => 'zip'],
            [['exerciciosResolvidos', 'duracao', 'avaliacao'], 'integer'],
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
            'caminho' => 'Caminho',
            'descricao' => 'Descricao',
            'topicos' => 'Topicos',
            'exerciciosResolvidos' => 'Exercicios Resolvidos',
            'duracao' => 'Duracao',
            'avaliacao' => 'Avaliacao',
            'referencias' => 'Referencias',
            'tipo' => 'Tipo',
            'serie' => 'Serie',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapituloHasObjDinamicos()
    {
        return $this->hasMany(CapituloHasObjDinamico::className(), ['ObjDinamico_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapitulos()
    {
        return $this->hasMany(Capitulo::className(), ['id' => 'Capitulo_id'])->viaTable('Capitulo_has_ObjDinamico', ['ObjDinamico_id' => 'id']);
    }

    private $nome, $extensao;
    public function upload()
    {
        $nome= "dinamico_" . $this->caminho->basename;
        $extensao = $this->caminho->extension;
        if ($this->validate()) {
            $this->caminho->saveAs('arquivos/' . $nome . '.' . $extensao);
            $this->caminho="arquivos/".$nome.'.'.$extensao;
            return true;
        } else {
            return false;
        }
    }
}
