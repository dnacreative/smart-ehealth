<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "registrasi".
 *
 * @property integer $id
 * @property string $no_reg
 * @property integer $pasienId
 * @property string $registrasi_date
 * @property string $status_pelayanan
 * @property string $status_rawat
 * @property string $dr_penanggung_jawab
 * @property integer $icdx_id
 * @property string $status_asuransi
 * @property string $catatan
 * @property string $asuransi_noreg
 * @property string $asuransi_nama
 * @property string $asuransi_tgl_lahir
 * @property string $asuransi_status_jaminan
 * @property string $asuransi_penanggung_jawab
 * @property string $asuransi_alamat
 * @property string $asuransi_notelp
 *
 * @property Anamnesa[] $anamnesas
 * @property Icdx $icdx
 * @property Pasien $pasien
 */
class Registrasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registrasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_reg', 'pasienId', 'status_pelayanan'], 'required'],
            [['pasienId', 'icdx_id'], 'integer'],
            [['registrasi_date', 'asuransi_tgl_lahir'], 'safe'],
            [['status_pelayanan', 'status_rawat', 'status_asuransi', 'catatan'], 'string'],
            [['no_reg', 'asuransi_noreg', 'asuransi_notelp'], 'string', 'max' => 15],
            [['dr_penanggung_jawab', 'asuransi_nama'], 'string', 'max' => 25],
            [['asuransi_status_jaminan', 'asuransi_penanggung_jawab', 'asuransi_alamat'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_reg' => 'No Reg',
            'pasienId' => 'Pasien ID',
            'registrasi_date' => 'Registrasi Date',
            'status_pelayanan' => 'Status Pelayanan',
            'status_rawat' => 'Status Rawat',
            'dr_penanggung_jawab' => 'Dr Penanggung Jawab',
            'icdx_id' => 'Icdx ID',
            'status_asuransi' => 'Status Asuransi',
            'catatan' => 'Catatan',
            'asuransi_noreg' => 'Asuransi Noreg',
            'asuransi_nama' => 'Asuransi Nama',
            'asuransi_tgl_lahir' => 'Asuransi Tgl Lahir',
            'asuransi_status_jaminan' => 'Asuransi Status Jaminan',
            'asuransi_penanggung_jawab' => 'Asuransi Penanggung Jawab',
            'asuransi_alamat' => 'Asuransi Alamat',
            'asuransi_notelp' => 'Asuransi Notelp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnamnesas()
    {
        return $this->hasMany(Anamnesa::className(), ['registrasi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcdx()
    {
        return $this->hasOne(Icdx::className(), ['id' => 'icdx_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::className(), ['id' => 'pasienId']);
    }
}