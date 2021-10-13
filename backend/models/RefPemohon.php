<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_pemohon".
 *
 * @property int $id
 * @property int $tahun
 * @property string $nik
 * @property string $nama
 * @property int $id_ref_jkel
 * @property string $tmp_lahir
 * @property string $tgl_lahir
 * @property string $alamat
 * @property int $rt
 * @property int $rw
 * @property string $desa
 * @property int $id_ref_kec
 * @property int $id_ref_agama
 * @property int $id_ref_status_kawin
 * @property int $id_ref_pekerjaan
 * @property int $id_ref_warga
 * @property string $aktif
 * @property string $date_create
 *
 * @property DataPemohonHibah[] $dataPemohonHibahs
 * @property RefAgama $refAgama
 * @property RefJkel $refJkel
 * @property RefKec $refKec
 * @property RefPekerjaan $refPekerjaan
 * @property RefStatusKawin $refStatusKawin
 * @property RefWarga $refWarga
 */
class RefPemohon extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_pemohon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun', 'id_ref_jkel', 'rt', 'rw', 'id_ref_kec', 'id_ref_agama', 'id_ref_status_kawin', 'id_ref_pekerjaan', 'id_ref_warga'], 'integer'],
            [['tgl_lahir', 'date_create'], 'safe'],
            [['aktif'], 'string'],
            [['nik', 'nama', 'tmp_lahir', 'alamat', 'desa'], 'string', 'max' => 50],
            [['id_ref_agama'], 'exist', 'skipOnError' => true, 'targetClass' => RefAgama::className(), 'targetAttribute' => ['id_ref_agama' => 'id']],
            [['id_ref_jkel'], 'exist', 'skipOnError' => true, 'targetClass' => RefJkel::className(), 'targetAttribute' => ['id_ref_jkel' => 'id']],
            [['id_ref_kec'], 'exist', 'skipOnError' => true, 'targetClass' => RefKec::className(), 'targetAttribute' => ['id_ref_kec' => 'id']],
            [['id_ref_pekerjaan'], 'exist', 'skipOnError' => true, 'targetClass' => RefPekerjaan::className(), 'targetAttribute' => ['id_ref_pekerjaan' => 'id']],
            [['id_ref_status_kawin'], 'exist', 'skipOnError' => true, 'targetClass' => RefStatusKawin::className(), 'targetAttribute' => ['id_ref_status_kawin' => 'id']],
            [['id_ref_warga'], 'exist', 'skipOnError' => true, 'targetClass' => RefWarga::className(), 'targetAttribute' => ['id_ref_warga' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun' => 'Tahun',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'id_ref_jkel' => 'Id Ref Jkel',
            'tmp_lahir' => 'Tmp Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'alamat' => 'Alamat',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'desa' => 'Desa',
            'id_ref_kec' => 'Id Ref Kec',
            'id_ref_agama' => 'Id Ref Agama',
            'id_ref_status_kawin' => 'Id Ref Status Kawin',
            'id_ref_pekerjaan' => 'Id Ref Pekerjaan',
            'id_ref_warga' => 'Id Ref Warga',
            'aktif' => 'Aktif',
            'date_create' => 'Date Create',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataPemohonHibahs()
    {
        return $this->hasMany(DataPemohonHibah::className(), ['id_ref_pemohon' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefAgama()
    {
        return $this->hasOne(RefAgama::className(), ['id' => 'id_ref_agama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefJkel()
    {
        return $this->hasOne(RefJkel::className(), ['id' => 'id_ref_jkel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefKec()
    {
        return $this->hasOne(RefKec::className(), ['id' => 'id_ref_kec']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefPekerjaan()
    {
        return $this->hasOne(RefPekerjaan::className(), ['id' => 'id_ref_pekerjaan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefStatusKawin()
    {
        return $this->hasOne(RefStatusKawin::className(), ['id' => 'id_ref_status_kawin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefWarga()
    {
        return $this->hasOne(RefWarga::className(), ['id' => 'id_ref_warga']);
    }
}
