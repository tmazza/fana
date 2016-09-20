<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use app\models\ProdutoImagem;

/**
 * This is the model class for table "produto".
 *
 * @property integer $id
 * @property string $nome
 * @property string $capa
 */
class Produto extends \yii\db\ActiveRecord
{

    const SCENARIO_INSERT = 'insert';

    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'capa'], 'required'],
            [['nome', 'capa'], 'string'],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 
                'maxFiles' => 10, 
                'on' => self::SCENARIO_INSERT],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'capa' => 'Capa',
        ];
    }

    public function getImagens()
    {
        return $this->hasMany(ProdutoImagem::className(), [
            'produto_id' => 'id',
        ]);
    }

    public function getUrlCapa()
    {
        return Yii::$app->params['amazon']['bucketUrl']
         . '/' . Yii::$app->params['amazon']['bucketId']
         . '/' . $this->capa;
    }

}