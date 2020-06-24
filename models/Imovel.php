<?php

namespace app\models;

use Yii;

/**
 * Esta é a classe de modelo da tabela "imovel".
 *
 * @property int $id Código
 * @property int $id_tipo Tipo
 * @property int $id_cidade Cidade
 * @property string $descricao Descrição
 * @property string|null $endereco Endereço
 * @property string|null $complemento Complemento
 * @property float|null $lat Latitude
 * @property float|null $lng Longitude
 *
 * @property Foto[] $fotos
 * @property Cidade $cidade
 * @property ImovelTipo $tipo
 * @property ImovelCaracteristica[] $imovelCaracteristicas
 */
class Imovel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imovel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tipo', 'id_cidade', 'descricao'], 'required'],
            [['id_tipo', 'id_cidade'], 'integer'],
            [['descricao'], 'string'],
            [['lat', 'lng'], 'number'],
            [['endereco'], 'string', 'max' => 150],
            [['complemento'], 'string', 'max' => 50],
            [['id_cidade'], 'exist', 'skipOnError' => true, 'targetClass' => Cidade::className(), 'targetAttribute' => ['id_cidade' => 'id']],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => ImovelTipo::className(), 'targetAttribute' => ['id_tipo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'id_tipo' => 'Tipo',
            'id_cidade' => 'Cidade',
            'descricao' => 'Descrição',
            'endereco' => 'Endereço',
            'complemento' => 'Complemento',
            'lat' => 'Latitude',
            'lng' => 'Longitude',
        ];
    }

    /**
     * Gets query for [[Fotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFotos()
    {
        return $this->hasMany(Foto::className(), ['id_imovel' => 'id']);
    }

    /**
     * Gets query for [[Cidade]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCidade()
    {
        return $this->hasOne(Cidade::className(), ['id' => 'id_cidade']);
    }

    /**
     * Gets query for [[Tipo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(ImovelTipo::className(), ['id' => 'id_tipo']);
    }

    /**
     * Gets query for [[ImovelCaracteristicas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImovelCaracteristicas()
    {
        return $this->hasMany(ImovelCaracteristica::className(), ['id_imovel' => 'id']);
    }
}
