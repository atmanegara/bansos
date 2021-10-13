<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "menu_hibah".
 *
 * @property int $id
 * @property int $kd_menu
 * @property string $nama_menu
 * @property string $id_user
 */
class MenuHibah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_hibah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_menu'], 'integer'],
            [['nama_menu', 'id_user'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kd_menu' => 'Kd Menu',
            'nama_menu' => 'Nama Menu',
            'id_user' => 'Id User',
        ];
    }
}
