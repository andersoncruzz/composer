<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ObjVideo".
 *
 * @property integer $id
 * @property string $assunto
 * @property string $caminho
 * @property string $topicos
 * @property integer $exerciciosResolvidos
 * @property string $tipo
 * @property integer $duracao
 * @property string $serie
 * @property integer $avaliacao
 * @property string $referencias
 *
 * @property CapituloHasObjVideo[] $capituloHasObjVideos
 * @property Capitulo[] $capitulos
 */
class ObjVideo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ObjVideo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assunto', 'topicos', 'exerciciosResolvidos', 'duracao', 'serie', 'referencias'], 'required'],
            [['topicos', 'tipo', 'referencias'], 'string'],
            [['caminho'], 'file', 'skipOnEmpty' => true, 'extensions' => 'mp4'],
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
    public function getCapituloHasObjVideos()
    {
        return $this->hasMany(CapituloHasObjVideo::className(), ['ObjVideo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCapitulos()
    {
        return $this->hasMany(Capitulo::className(), ['id' => 'Capitulo_id'])->viaTable('Capitulo_has_ObjVideo', ['ObjVideo_id' => 'id']);
    }
    private $nome, $extensao;
    public function upload()
    {
        $nome= "video_tmp";
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
