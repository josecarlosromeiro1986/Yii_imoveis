<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Modelo para a tabela 'imovel_tipo'
 * 
 * @property integer $id Código 
 * @property string $descricao Descrição
 */
class ImovelTipo extends ActiveRecord
{
    public static function tableName()
    {
        return 'imovel_tipo';
    }

    public function rules()
    {
        return [
            ['descricao', 'required'],
            ['descricao', 'string', 'max' => 150],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'descricao' => 'Descrição',
        ];
    }

    /* public function getImoveis()
    {
        return $this->hasMany(Imovel::className(), ['id_tipo' => 'id']);
    } */
}
