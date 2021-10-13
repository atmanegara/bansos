<?php

namespace backend\models;

use Yii;
use yii\db\Query;
/**
 * This is the model class for table "data_pemohon_hibah".
 *
 * @property int $id
 * @property int $id_ref_pemohon
 * @property int $id_hibah
 * @property string $nm_tempat
 * @property string $nm_keg
 * @property string $lokasi
 * @property string $lat
 * @property string $lang
 * @property int $no_telp
 * @property  double $pagu_permintaan 
 *
 * @property RefHibah $hibah
 * @property RefPemohon $refPemohon
 * @property DokPemohonHibah[] $dokPemohonHibahs
 */
class DataPemohonHibah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_pemohon_hibah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ref_pemohon', 'id_hibah', 'no_telp'], 'integer'],
            [['id_ref_pemohon', 'id_hibah', 'no_telp','pagu_permintaan','nm_keg','nm_tempat','lokasi','lat', 'lang'], 'required','message'=>'Wajib di isi'],
            [['pagu_permintaan'],'integer'],
            [['lat', 'lang'], 'string'],
            [['nm_keg', 'lokasi','nm_tempat'], 'string', 'max' => 50],
            [['id_hibah'], 'exist', 'skipOnError' => true, 'targetClass' => RefHibah::className(), 'targetAttribute' => ['id_hibah' => 'id']],
            [['id_ref_pemohon'], 'exist', 'skipOnError' => true, 'targetClass' => RefPemohon::className(), 'targetAttribute' => ['id_ref_pemohon' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ref_pemohon' => 'Id Ref Pemohon',
            'id_hibah' => 'Id Hibah',
            'nm_keg' => 'Nm Keg',
            'lokasi' => 'Lokasi',
            'lat' => 'Lat',
            'lang' => 'Lang',
            'no_telp' => 'No Telp',
            'pagu_permintaan'=>'Nilai Pagu Permintaan'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHibah()
    {
        return $this->hasOne(RefHibah::className(), ['id' => 'id_hibah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefPemohon()
    {
        return $this->hasOne(RefPemohon::className(), ['id' => 'id_ref_pemohon']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokPemohonHibahs()
    {
        return $this->hasMany(DokPemohonHibah::className(), ['id_data_pemohon_hibah' => 'id']);
    }
    
    public static function getDataPemohonById()
    {
        $queryPemohon = (new Query())
                ->select('a.nama')
                ->from('ref_pemohon a')
                ->innerJoin('data_pemohon_hibah b','a.id=b.id_ref_pemohon')
                ->where(['b.id'=>$id])->one();
        return $queryPemohon;
    }
}
