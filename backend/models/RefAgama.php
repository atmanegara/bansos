<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_agama".
 *
 * @property int $id
 * @property string $nm_agama
 * @property string $aktif
 * @property string $create_date
 *
 * @property RefPemohon[] $refPemohons
 */
class RefAgama extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_agama';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aktif'],'required'],
            [['aktif'], 'string'],
            [['create_date'], 'safe'],
            [['nm_agama'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_agama' => 'Nm Agama',
            'aktif' => 'Aktif',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefPemohons()
    {
        return $this->hasMany(RefPemohon::className(), ['id_ref_agama' => 'id']);
    }
}
