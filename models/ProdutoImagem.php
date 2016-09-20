<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto_imagem".
 *
 * @property integer $id
 * @property integer $produto_id
 * @property string $path
 *
 * @property Produto $produto
 */
class ProdutoImagem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produto_imagem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['produto_id', 'path'], 'required'],
            [['produto_id'], 'integer'],
            [['path'], 'string'],
            [['produto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['produto_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'produto_id' => 'Produto ID',
            'path' => 'Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['id' => 'produto_id']);
    }

    public function getUrl()
    {
        return Yii::$app->params['amazon']['bucketUrl']
         . '/' . Yii::$app->params['amazon']['bucketId']
         . '/' . $this->path;
    }

}