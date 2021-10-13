<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_user".
 *
 * @property int $id
 * @property string $kd_user
 * @property string $nm_user
 * @property string $aktif
 */
class RefUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aktif'], 'string'],
            [['kd_user', 'nm_user'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kd_user' => 'Kd User',
            'nm_user' => 'Nm User',
            'aktif' => 'Aktif',
        ];
    }
}
