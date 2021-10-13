<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detail_lpj".
 *
 * @property int $id
 * @property int $id_data_pemohon_hibah
 * @property string $foto
 * @property string $create_date
 */
class DetailLpj extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_lpj';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_data_pemohon_hibah'], 'integer'],
            [['create_date'], 'safe'],
            [['foto'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_data_pemohon_hibah' => 'Id Lpj',
            'foto' => 'Foto',
            'create_date' => 'Create Date',
        ];
    }
}
