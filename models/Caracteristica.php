<?php

namespace app\models;

use Yii;

/**
 * Modelo para a tabela "caracteristica".
 *
 * @property int $id Código
 * @property string $descricao Descrição
 */
class Caracteristica extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'caracteristica';
    }

    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['descricao'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'descricao' => 'Descrição',
        ];
    }

    //public function getImovelCaracteristicas() {
        //return $this->hasMany(ImovelCaracteristica::className(), ['id_caracteristica' => 'id']);
    //}
}