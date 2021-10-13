<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_prov".
 *
 * @property int $id
 * @property string $nm_prov
 * @property string $aktif
 * @property string $create_date
 *
 * @property RefKabkot[] $refKabkots
 */
class RefProv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_prov';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aktif'], 'string'],
            [['create_date'], 'safe'],
            [['nm_prov'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_prov' => 'Nm Prov',
            'aktif' => 'Aktif',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefKabkots()
    {
        return $this->hasMany(RefKabkot::className(), ['id_ref_prov' => 'id']);
    }
    
    public static function getProvAllAktif(){
        $model = RefProv::find()->where(['aktif'=>'Y'])->all();
        return \yii\helpers\ArrayHelper::map($model, 'id', 'nm_prov');
    }
}
