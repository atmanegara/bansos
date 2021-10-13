<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "verifikasi_bupati".
 *
 * @property int $id
 * @property int $id_data_pemohon_hibah
 * @property int $status_verifikasi
 * @property int $catatan
 * @property int $pagu_usulan
 * @property int $id_user
 * @property string $create_date
 */
class VerifikasiBupati extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'verifikasi_bupati';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_data_pemohon_hibah', 'status_verifikasi', 'catatan', 'pagu_usulan', 'id_user'], 'integer'],
            [['create_date'], 'safe'],
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
