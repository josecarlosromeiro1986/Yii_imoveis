<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Este é o modelo para a tabela "foto".
 *
 * @property int $id Código
 * @property int $id_imovel Imóvel
 * @property string $foto Foto
 *
 * @property Imovel $imovel
 */
class Foto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'foto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_imovel', 'foto'], 'required'],
            [['id_imovel'], 'integer'],
            //[['foto'], 'string', 'max' => 50],
            [['foto'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['id_imovel'], 'exist', 'skipOnError' => true, 'targetClass' => Imovel::className(), 'targetAttribute' => ['id_imovel' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'id_imovel' => 'Imóvel',
            'foto' => 'Foto',
        ];
    }

    /**
     * Gets query for [[Imovel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImovel()
    {
        return $this->hasOne(Imovel::className(), ['id' => 'id_imovel']);
    }
}
