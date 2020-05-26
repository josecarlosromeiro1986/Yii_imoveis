<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Modelo para a tabela "pais"
 * 
 * @property int $id Código
 * @property string $nome Nome
 * @property float $lat Latitude
 * @property float $lng Longitude
 */

class Pais extends ActiveRecord {
    public static function tableName() {
        return 'pais';
    }

    public function rules() {
        return [
            [['nome'], 'required'],
            [['lat', 'lng'], 'number'],
            [['nome'], 'string', 'max' => 150],
            [['nome'], 'unique'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'Código',
            'nome' => 'Nome',
            'lat' => 'Latitude',
            'lng' => 'Longitude',
        ];
    }

    public function getEstados() {
        return $this->hasMany(Estado::className(), ['id_pais' => 'id']);
    }
}