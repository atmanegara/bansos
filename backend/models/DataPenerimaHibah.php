<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "data_penerima_hibah".
 *
 * @property int $id
 * @property int $id_data_pemohon_hibah
 * @property string $no_registrasi
 * @property int $setuju 1:OK,2:Tunda3:Tolak
 * @property string $catatan
 *
 * @property DataPemohonHibah $dataPemohonHibah
 * @property DataPemohonHibah $noRegistrasi
 */
class DataPenerimaHibah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_penerima_hibah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_data_pemohon_hibah', 'setuju'], 'integer'],
            [['no_registrasi', 'catatan'], 'string', 'max' => 50],
            [['id_data_pemohon_hibah'], 'exist', 'skipOnError' => true, 'targetClass' => DataPemohonHibah::className(), 'targetAttribute' => ['id_data_pemohon_hibah' => 'id']],
            [['no_registrasi'], 'exist', 'skipOnError' => true, 'targetClass' => DataPemohonHibah::className(), 'targetAttribute' => ['no_registrasi' => 'no_registrasi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_data_pemohon_hibah' => 'Id Data Pemohon Hibah',
            'no_registrasi' => 'No Registrasi',
            'setuju' => 'Setuju',
            'catatan' => 'Catatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataPemohonHibah()
    {
        return $this->hasOne(DataPemohonHibah::className(), ['id' => 'id_data_pemohon_hibah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoRegistrasi()
    {
        return $this->hasOne(DataPemohonHibah::className(), ['no_registrasi' => 'no_registrasi']);
    }
}
