<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_skpd".
 *
 * @property int $id
 * @property int $kd_urusan
 * @property int $kd_bidang
 * @property int $kd_unit
 * @property int $kd_sub
 * @property string $nm_skpd
 * @property string $aktif
 */
class RefSkpd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_skpd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'kd_urusan', 'kd_bidang', 'kd_unit', 'kd_sub'], 'integer'],
            [['aktif'], 'string'],
            [['nm_skpd'], 'string', 'max' => 50],
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
            'kd_urusan' => 'Kd Urusan',
            'kd_bidang' => 'Kd Bidang',
            'kd_unit' => 'Kd Unit',
            'kd_sub' => 'Kd Sub',
            'nm_skpd' => 'Nm Skpd',
            'aktif' => 'Aktif',
        ];
    }
}
