<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;


/**
 * This is the model class for table "ObjApresentacao".
 *
 * @property integer $id
 * @property string $assunto
 * @property string $caminho
 * @property integer $qteSlides
 * @property string $topicos
 * @property integer $exerciciosResolvidos
 * @property string $tipo
 * @property integer $duracao
 * @property string $serie
 * @property integer $avaliacao
 * @property string $referencias
 *
 * @property CapituloHasObjApresentacao[] $capituloHasObjApresentacaos
 * @property Capitulo[] $capitulos
 */
class ObjApresentacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ObjApresentacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assunto', 'topicos', 'duracao', 'serie', 'referencias'], 'required'],
            [['qteSlides', 'exerciciosResolvidos', 'duracao', 'avaliacao'], 'integer'],
            [['caminho'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf, ppt, pptx'],
            [['topicos', 'tipo', 'referencias'], 'string'],
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
            'qteSlides' => 'Qte Slides',
            'topicos' => 'Topicos',
            'exerciciosResolvidos' => 'Exercicios Resolvidos',
            'tipo' => 'Tipo',
            'duracao' => 'Duracao',
            'serie' => 'Serie',
            'avaliacao' => 'Avaliacao',
            'referencias' => 'Referencias',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapituloHasObjApresentacaos()
    {
        return $this->hasMany(CapituloHasObjApresentacao::className(), ['ObjApresentacao_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapitulos()
    {
        return $this->hasMany(Capitulo::className(), ['id' => 'Capitulo_id'])->viaTable('Capitulo_has_ObjApresentacao', ['ObjApresentacao_id' => 'id']);
    }

    private $nome, $extensao;
    public function upload()
    {
        $nome= "slides_" . $this->caminho->basename;
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
