<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Registrasi;

/**
 * RegistrasiSearch represents the model behind the search form about `backend\models\Registrasi`.
 */
class RegistrasiSearch extends Registrasi {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'pasien_id', 'icdx_id', 'asuransi_provider_id', 'faskes_id'], 'integer'],
            [['no_reg', 'tanggal_registrasi', 'status_registrasi', 'asal_registrasi', 'status_pelayanan', 'status_rawat', 'dr_penanggung_jawab', 'status_asuransi', 'catatan', 'asuransi_noreg', 'asuransi_nama', 'asuransi_tgl_lahir', 'asuransi_status_jaminan', 'asuransi_penanggung_jawab', 'asuransi_alamat', 'asuransi_notelp', 'pasienNama', 'tanggal_registrasi_format'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Registrasi::find()
                ->joinWith(['pasien']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // if there is no preset tanggal_kunjungan
        if(is_null($this->tanggal_kunjungan) || $this->tanggal_kunjungan == '') {
            $currDate = new \DateTime();
            $this->tanggal_kunjungan = $currDate->format('Y-m-d');
        }


        if(isset($params['RegistrasiSearch']) && isset($params['RegistrasiSearch']['tanggal_kunjungan'])) {
            $currDate = new \DateTime($params['RegistrasiSearch']['tanggal_kunjungan']);
            $this->tanggal_kunjungan = $currDate->format('Y-m-d');
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'pasien_id' => $this->pasien_id,
            'icdx_id' => $this->icdx_id,
            'asuransi_tgl_lahir' => $this->asuransi_tgl_lahir,
            'asuransi_provider_id' => $this->asuransi_provider_id,
            'faskes_id' => $this->faskes_id,
        ]);

        $query->andFilterWhere(['like', 'no_reg', $this->no_reg])
                ->andFilterWhere(['like', 'status_registrasi', $this->status_registrasi])
                ->andFilterWhere(['like', 'asal_registrasi', $this->asal_registrasi])
                ->andFilterWhere(['like', 'status_pelayanan', $this->status_pelayanan])
                ->andFilterWhere(['like', 'status_rawat', $this->status_rawat])
                ->andFilterWhere(['like', 'dr_penanggung_jawab', $this->dr_penanggung_jawab])
                ->andFilterWhere(['like', 'status_asuransi', $this->status_asuransi])
                ->andFilterWhere(['like', 'catatan', $this->catatan])
                ->andFilterWhere(['like', 'asuransi_noreg', $this->asuransi_noreg])
                ->andFilterWhere(['like', 'asuransi_noreg_other', $this->asuransi_noreg_other]) 
                ->andFilterWhere(['like', 'asuransi_nama', $this->asuransi_nama])
                ->andFilterWhere(['like', 'asuransi_status_jaminan', $this->asuransi_status_jaminan])
                ->andFilterWhere(['like', 'asuransi_penanggung_jawab', $this->asuransi_penanggung_jawab])
                ->andFilterWhere(['like', 'asuransi_alamat', $this->asuransi_alamat])
                ->andFilterWhere(['like', 'asuransi_notelp', $this->asuransi_notelp])
                ->andFilterWhere(['like', 'pasien.nama', $this->pasienNama]);

        $query->andFilterWhere(
            ['>=', 'tanggal_kunjungan',  $this->tanggal_kunjungan]
        );

        return $dataProvider;
    }

}
