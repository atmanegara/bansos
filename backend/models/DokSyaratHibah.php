<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dok_syarat_hibah".
 *
 * @property int $id
 * @property int $id_ref_hibah
 * @property string $nm_dok
 * @property string $nm_file
 * @property int $tahun
 * @property string $aktif
 *
 * @property DokPemohonHibah[] $dokPemohonHibahs
 * @property RefHibah $refHibah
 */
class DokSyaratHibah extends \yii\db\ActiveRecord
{
    
    public $filedok;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dok_syarat_hibah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ref_hibah', 'tahun'], 'integer'],
            [['aktif'], 'string'],
            [['filedok'],'file','skipOnEmpty'=>false],
            [['nm_dok', 'nm_file'], 'string', 'max' => 50],
            [['id_ref_hibah'], 'exist', 'skipOnError' => true, 'targetClass' => RefHibah::className(), 'targetAttribute' => ['id_ref_hibah' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ref_hibah' => 'Id Ref Hibah',
            'nm_dok' => 'Nm Dok',
            'nm_file' => 'Nm File',
            'tahun' => 'Tahun',
            'aktif' => 'Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokPemohonHibahs()
    {
        return $this->hasMany(DokPemohonHibah::className(), ['id_dok_syarat_hibah' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefHibah()
    {
        return $this->hasOne(RefHibah::className(), ['id' => 'id_ref_hibah']);
    }
    
    public function upload(){
        if ($this->validate()){
             $this->nm_file = $this->id_ref_hibah.'_'.date('ydmhis').'.'.$this->filedok->extension;
             $basename = $this->nm_file;
          $this->filedok->saveAs('./uploads/'.$basename, $this->filedok->extension);
             
            return true;
        }else{
            return false;
        }
    }
}
