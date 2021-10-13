<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dok_pemohon_hibah".
 *
 * @property int $id
 * @property int $id_data_pemohon_hibah
 * @property int $id_dok_syarat_hibah
 * @property string $nama_file
 * @property string $tgl_upload
 * @property int $reupload 1:upload_ulang,2:benar haja
 * @property string $catatan
 * @property int $id_user
 * @property string $create_date
 *
 * @property DataPemohonHibah $dataPemohonHibah
 * @property DokSyaratHibah $dokSyaratHibah
 */
class DokPemohonHibah extends \yii\db\ActiveRecord
{
    public $filedoc;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dok_pemohon_hibah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_data_pemohon_hibah', 'id_dok_syarat_hibah', 'reupload', 'id_user'], 'integer'],
            [['tgl_upload', 'create_date'], 'safe'],
                [['filedoc'],'file','skipOnEmpty'=>false],
            [['nama_file', 'catatan'], 'string', 'max' => 50],
            [['id_data_pemohon_hibah'], 'exist', 'skipOnError' => true, 'targetClass' => DataPemohonHibah::className(), 'targetAttribute' => ['id_data_pemohon_hibah' => 'id']],
            [['id_dok_syarat_hibah'], 'exist', 'skipOnError' => true, 'targetClass' => DokSyaratHibah::className(), 'targetAttribute' => ['id_dok_syarat_hibah' => 'id']],
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
            'id_dok_syarat_hibah' => 'Id Dok Syarat Hibah',
            'nama_file' => 'Nama File',
            'tgl_upload' => 'Tgl Upload',
            'reupload' => 'Reupload',
            'catatan' => 'Catatan',
            'id_user' => 'Id User',
            'create_date' => 'Create Date',
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
    public function getDokSyaratHibah()
    {
        return $this->hasOne(DokSyaratHibah::className(), ['id' => 'id_dok_syarat_hibah']);
    }
}
