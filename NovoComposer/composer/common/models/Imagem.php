<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;
use yii\imagine\Image;

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
    public $imagem, $image_bkp, $extension;
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
        $nome= "imagem_tmp";
        $extensao = $this->caminho->extension;
        if ($this->validate()) {
            $this->caminho->saveAs('arquivos/' . $nome . '.' . $extensao);
            $this->caminho="arquivos/".$nome.'.'.$extensao;
            return true;
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        // open image
        $image = Image::getImagine()->open($this->caminho);

        //delete old images
        $oldImages = FileHelper::findFiles(Yii::getAlias('arquivos'), [
            'only' => [
                $this->caminho
            ],
        ]);
        for ($i = 0; $i != count($oldImages); $i++) {
            @unlink($oldImages[$i]);
        }


        /*$pathThumbImage = Yii::getAlias('arquivos')
            . '/imagem_'
            . $this->id
            .   '.jpg';*/
        $pathThumbImage = Yii::getAlias('arquivos')
            . '/imagem_'
            . $this->id .'.'
            .   $this->extension;

        $this->imagem='arquivos/'.'imagem_'.$this->id;
        $this->image_bkp='arquivos/'.'imagem_'.$this->id;

        //$urlImagem = 'arquivos/'.'imagem_'.$this->id . '.jpg';
        $urlImagem = 'arquivos/'.'imagem_'.$this->id . '.' . $this->extension;
        $meuid= $this->id;
        $command = Yii::$app->db->createCommand("UPDATE Imagem SET caminho='$urlImagem' WHERE id='$meuid'");

        $command->execute();

        $image->save($pathThumbImage, ['quality' => 100]);
    }
}
