<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_pekerjaan".
 *
 * @property int $id
 * @property string $pekerjaan
 * @property string $aktif
 * @property string $create_date
 *
 * @property RefPemohon[] $refPemohons
 */
class RefPekerjaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_pekerjaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aktif'], 'string'],
            [['create_date'], 'safe'],
            [['pekerjaan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pekerjaan' => 'Pekerjaan',
            'aktif' => 'Aktif',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefPemohons()
    {
        return $this->hasMany(RefPemohon::className(), ['id_ref_pekerjaan' => 'id']);
    }
}
