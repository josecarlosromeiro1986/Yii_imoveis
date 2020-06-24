<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Modelo para a tabela "cidade"
 * 
 * @property int $id Código
 * @property int $id_estado Estado
 * @property string $nome Nome
 * @property float $lat Latitude
 * @property float $lng Longitude
 */

class Cidade extends ActiveRecord
{
    public static function tableName()
    {
        return 'cidade';
    }

    public function rules()
    {
        return [
            [['id_estado', 'nome'], 'required'],
            [['id_estado'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['nome'], 'string', 'max' => 150],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'id_estado' => 'Estado',
            'nome' => 'Nome',
            'lat' => 'Latitude',
            'lng' => 'Longitude',
        ];
    }
    /**
     * Relaciona os imóveis da cidade
     */
    /* public function getImoveis()
    {
        return $this->hasMany(Imovel::className(), ['id_cidade' => 'id']);
    } */

    /**
     * Relaciona o estado que a cidade pertence */
    public function getEstado()
    {
        return $this->hasOne(Estado::className(), ['id' => 'id_estado']);
    }

    public function getNomeFormImovel()
    {
        return $this->nome . ' - ' . $this->estado->nome . ' (' . $this->estado->pais->nome . ')';
    }
}
