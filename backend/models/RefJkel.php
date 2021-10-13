<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_jkel".
 *
 * @property int $id
 * @property string $jkel
 * @property string $aktif
 * @property string $create_date
 *
 * @property RefPemohon[] $refPemohons
 */
class RefJkel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_jkel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aktif'], 'string'],
            [['create_date'], 'safe'],
            [['jkel'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jkel' => 'Jkel',
            'aktif' => 'Aktif',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefPemohons()
    {
        return $this->hasMany(RefPemohon::className(), ['id_ref_jkel' => 'id']);
    }
}
