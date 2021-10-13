<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_hibah".
 *
 * @property int $id
 * @property string $nm_hibah
 * @property int $id_ref_skpd
 * @property string $aktif
 * @property string $create_date
 *
 * @property DataPemohonHibah[] $dataPemohonHibahs
 * @property DokSyaratHibah[] $dokSyaratHibahs
 * @property RefSkpd $refSkpd
 */
class RefHibah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_hibah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ref_skpd','nm_hibah'], 'required'],
            [['id', 'id_ref_skpd'], 'integer'],
            [['aktif'], 'string'],
            [['create_date'], 'safe'],
            [['nm_hibah'], 'string', 'max' => 50],
            [['id'], 'unique'],
            [['id_ref_skpd'], 'exist', 'skipOnError' => true, 'targetClass' => RefSkpd::className(), 'targetAttribute' => ['id_ref_skpd' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_hibah' => 'Nm Hibah',
            'id_ref_skpd' => 'Id Ref Skpd',
            'aktif' => 'Aktif',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataPemohonHibahs()
    {
        return $this->hasMany(DataPemohonHibah::className(), ['id_hibah' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokSyaratHibahs()
    {
        return $this->hasMany(DokSyaratHibah::className(), ['id_ref_hibah' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefSkpd()
    {
        return $this->hasOne(RefSkpd::className(), ['id' => 'id_ref_skpd']);
    }
}
