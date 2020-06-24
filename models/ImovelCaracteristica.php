<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imovel_caracteristica".
 *
 * @property int $id Código
 * @property int $id_caracteristica Característica
 * @property int $id_imovel Imóvel
 *
 * @property Caracteristica $caracteristica
 * @property Imovel $imovel
 */
class ImovelCaracteristica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imovel_caracteristica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_caracteristica', 'id_imovel'], 'required'],
            [['id_caracteristica', 'id_imovel'], 'integer'],
            [['id_caracteristica'], 'exist', 'skipOnError' => true, 'targetClass' => Caracteristica::className(), 'targetAttribute' => ['id_caracteristica' => 'id']],
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
            'id_caracteristica' => 'Característica',
            'id_imovel' => 'Imóvel',
        ];
    }

    /**
     * Gets query for [[Caracteristica]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaracteristica()
    {
        return $this->hasOne(Caracteristica::className(), ['id' => 'id_caracteristica']);
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
