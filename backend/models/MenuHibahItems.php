<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "menu_hibah_items".
 *
 * @property int $id
 * @property int $kd_menu
 * @property string $label
 * @property string $icon
 * @property string $url
 * @property string $items 1:level 1,2:level 3
 * @property string $id_user
 */
class MenuHibahItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_hibah_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_menu'], 'integer'],
            [['label', 'icon', 'url', 'items', 'id_user'], 'string', 'max' => 50],
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
            'label' => 'Label',
            'icon' => 'Icon',
            'url' => 'Url',
            'items' => 'Items',
            'id_user' => 'Id User',
        ];
    }
}
