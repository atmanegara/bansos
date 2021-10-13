<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_kelurahan".
 *
 * @property int $id
 * @property string $kd_prov
 * @property string $kd_kab
 * @property string $kd_kec
 * @property string $kd_keldes
 * @property string $nmkeldes
 */
class RefKelurahan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_kelurahan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_prov', 'kd_kab', 'kd_kec', 'kd_keldes'], 'string', 'max' => 50],
            [['nmkeldes'], 'string', 'max' => 70],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kd_prov' => 'Kd Prov',
            'kd_kab' => 'Kd Kab',
            'kd_kec' => 'Kd Kec',
            'kd_keldes' => 'Kd Keldes',
            'nmkeldes' => 'Nmkeldes',
        ];
    }
}
