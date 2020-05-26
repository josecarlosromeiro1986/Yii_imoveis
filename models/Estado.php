<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Modelo para a tabela 'estado'
 * 
 * @property int $id Código
 * @property int $id_pais País
 * @property string $nome Nome
 * @property float $lat Latitude
 * @property float $lng Longitude
 */
class Estado extends ActiveRecord {
    public static function tableName() {
        return 'estado';
    }

    public function rules() {
        return [
            [['id_pais', 'nome'], 'required'],
            [['id_pais'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['nome'], 'string', 'max' => 150],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'Código',
            'id_pais' => 'País',
            'nome' => 'Nome',
            'lat' => 'Latitude',
            'lng' => 'Longitude',
        ];
    }

    //TO-DO: Criar relacionamento para a tabela 'cidades'

    public function getPais() {
        return $this->hasOne(Pais::className(), ['id' => 'id_pais']);
    }
}