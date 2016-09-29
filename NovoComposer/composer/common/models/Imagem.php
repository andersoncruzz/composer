<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Imagem".
 *
 * @property integer $id
 * @property string $caminho
 * @property string $legenda
 *
 * @property ObjGaleriaHasImagem[] $objGaleriaHasImagems
 * @property ObjGaleria[] $objGalerias
 */
class Imagem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Imagem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caminho'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif'],
            [['legenda'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'caminho' => 'Caminho',
            'legenda' => 'Legenda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjGaleriaHasImagems()
    {
        return $this->hasMany(ObjGaleriaHasImagem::className(), ['Imagem_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjGalerias()
    {
        return $this->hasMany(ObjGaleria::className(), ['id' => 'ObjGaleria_id'])->viaTable('ObjGaleria_has_Imagem', ['Imagem_id' => 'id']);
    }

    private $nome, $extensao;
    public function upload()
    {
        $nome= "imagem_" . $this->caminho->basename;
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
