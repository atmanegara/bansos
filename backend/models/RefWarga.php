<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_warga".
 *
 * @property int $id
 * @property int $warga
 * @property string $aktif
 * @property string $create_date
 *
 * @property RefPemohon[] $refPemohons
 */
class RefWarga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_warga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['warga'], 'required'],
            [['aktif','warga'], 'string'],
            [['create_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'warga' => 'Warga',
            'aktif' => 'Aktif',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefPemohons()
    {
        return $this->hasMany(RefPemohon::className(), ['id_ref_warga' => 'id']);
    }
}
