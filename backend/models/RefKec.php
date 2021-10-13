<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_kec".
 *
 * @property int $id
 * @property int $id_ref_prov
 * @property int $id_ref_kabkot
 * @property string $nama_kec
 * @property string $aktif
 * @property string $create_date
 *
 * @property RefKabkot $refKabkot
 * @property RefKabkot $refProv
 * @property RefPemohon[] $refPemohons
 */
class RefKec extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_kec';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ref_prov', 'id_ref_kabkot'], 'integer'],
            [['aktif'], 'string'],
            [['create_date'], 'safe'],
            [['nama_kec'], 'string', 'max' => 50],
            [['id_ref_kabkot'], 'exist', 'skipOnError' => true, 'targetClass' => RefKabkot::className(), 'targetAttribute' => ['id_ref_kabkot' => 'id']],
            [['id_ref_prov'], 'exist', 'skipOnError' => true, 'targetClass' => RefKabkot::className(), 'targetAttribute' => ['id_ref_prov' => 'id_ref_prov']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ref_prov' => 'Id Ref Prov',
            'id_ref_kabkot' => 'Id Ref Kabkot',
            'nama_kec' => 'Nama Kec',
            'aktif' => 'Aktif',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefKabkot()
    {
        return $this->hasOne(RefKabkot::className(), ['id' => 'id_ref_kabkot']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefProv()
    {
        return $this->hasOne(RefKabkot::className(), ['id_ref_prov' => 'id_ref_prov']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefPemohons()
    {
        return $this->hasMany(RefPemohon::className(), ['id_ref_kec' => 'id']);
    }
}
