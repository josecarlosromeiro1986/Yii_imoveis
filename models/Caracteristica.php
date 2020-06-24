<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Modelo para a tabela 'caracteristica'
 * 
 * @property integer $id Código 
 * @property string $descricao Descrição
 */
class Caracteristica extends ActiveRecord
{
    public static function tableName()
    {
        return 'caracteristica';
    }

    public function rules()
    {
        return [
            ['descricao', 'required'],
            ['descricao', 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'descricao' => 'Descrição',
        ];
    }

    /* public function getImovelCaracteristicas() {
      return $this->hasMany(ImovelCaracteristica::className(), ['id_caracteristica' => 'id']);
    } */
}
