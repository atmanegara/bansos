<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "verifikasi_tapd".
 *
 * @property int $id
 * @property int $id_data_pemohon_hibah
 * @property int $status_verifikasi
 * @property string $catatan
 * @property double $pagu_usulan
 * @property int $id_user
 * @property string $create_date
 */
class VerifikasiTapd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'verifikasi_tapd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_data_pemohon_hibah', 'status_verifikasi', 'id_user'], 'integer'],
            [['pagu_usulan'], 'number'],
            [['create_date'], 'safe'],
            [['catatan'], 'string', 'max' => 50],
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
            'id_data_pemohon_hibah' => 'Id Data Pemohon Hibah',
            'status_verifikasi' => 'Status Verifikasi',
            'catatan' => 'Catatan',
            'pagu_usulan' => 'Pagu Usulan',
            'id_user' => 'Id User',
            'create_date' => 'Create Date',
        ];
    }
}
