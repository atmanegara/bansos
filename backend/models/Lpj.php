<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lpj".
 *
 * @property int $id
 * @property int $id_hibah
 * @property int $id_data_pemohon_hibah
 * @property string $nm_barang
 * @property string $harga_barang
 */
class Lpj extends \yii\db\ActiveRecord
{
    public $imageFiles;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lpj';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hibah', 'id_data_pemohon_hibah'], 'integer'],
            [['harga_barang'], 'number'],
            [['imageFiles'],'file','skipOnEmpty'=>false,'extensions' => 'png, jpg,jpeg','maxFiles' => 10],
            [['nm_barang'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_hibah' => 'Id Hibah',
            'id_data_pemohon_hibah' => 'Id Data Pemohon Hibah',
            'nm_barang' => 'Nm Barang',
            'harga_barang' => 'Harga Barang',
        ];
    }
}
