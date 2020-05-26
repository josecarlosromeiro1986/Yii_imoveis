<?php

namespace app\models;

use Yii;

/**
 * Modelo para a tabela "imovel_tipo".
 *
 * @property int $id Código
 * @property string $descricao Descrição
 */
class ImovelTipo extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'imovel_tipo';
    }

    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['descricao'], 'string', 'max' => 150],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'descricao' => 'Descrição',
        ];
    }

    //public function getImoveis() {
        //return $this->hasMany(Imovel::className(), ['id_tipo' => 'id']);
    //}
}