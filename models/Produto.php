<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property integer $id
 * @property string $nome
 * @property string $capa
 */
class Produto extends \yii\db\ActiveRecord
{
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
            [['id', 'nome', 'capa'], 'required'],
            [['id'], 'integer'],
            [['nome', 'capa'], 'string'],
            [['id'], 'unique'],
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

}