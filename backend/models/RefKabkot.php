<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_kabkot".
 *
 * @property int $id
 * @property int $id_ref_prov
 * @property string $nm_kabkot
 * @property string $aktif
 * @property string $create_date
 *
 * @property RefProv $refProv
 * @property RefKec[] $refKecs
 * @property RefKec[] $refKecs0
 */
class RefKabkot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_kabkot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
      //      [['id'], 'required'],
            [['id', 'id_ref_prov'], 'integer'],
            [['aktif'], 'string'],
            [['create_date'], 'safe'],
            [['nm_kabkot'], 'string', 'max' => 50],
            [['id'], 'unique'],
            [['id_ref_prov'], 'exist', 'skipOnError' => true, 'targetClass' => RefProv::className(), 'targetAttribute' => ['id_ref_prov' => 'id']],
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
            'nm_kabkot' => 'Nm Kabkot',
            'aktif' => 'Aktif',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefProv()
    {
        return $this->hasOne(RefProv::className(), ['id' => 'id_ref_prov']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefKecs()
    {
        return $this->hasMany(RefKec::className(), ['id_ref_kabkot' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefKecs0()
    {
        return $this->hasMany(RefKec::className(), ['id_ref_prov' => 'id_ref_prov']);
    }
}
