<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_status_kawin".
 *
 * @property int $id
 * @property string $status_kawin
 * @property string $aktif
 * @property string $create_date
 *
 * @property RefPemohon[] $refPemohons
 */
class RefStatusKawin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_status_kawin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aktif'], 'required'],
            [['aktif'], 'string'],
            [['create_date'], 'safe'],
            [['status_kawin'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_kawin' => 'Status Kawin',
            'aktif' => 'Aktif',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefPemohons()
    {
        return $this->hasMany(RefPemohon::className(), ['id_ref_status_kawin' => 'id']);
    }
}
