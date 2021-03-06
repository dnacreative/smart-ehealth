<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Anamnesa */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Anamnesas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anamnesa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parent_id',
            'registrasi_id',
            'user_id',
            'keluhan',
            'keluhan_rincian',
            'keluhan_lokasi',
            'keluhan_lokasi_umum',
            'keluhan_sub_lokasi',
            'keluhan_berlangsung_nil',
            'keluhan_berlangsung_lama',
            'keluhan_faktor_pencetus',
            'keluhan_durasi_nil',
            'keluhan_durasi_lama',
            'keluhan_durasi_jenis',
            'keluhan_durasi_pereda',
            'keluhan_durasi_pemberat',
            'keluhan_menjalar_pil',
            'keljalar_kepala_pil',
            'keljalar_kepala',
            'keljalar_wajah_pil',
            'keljalar_wajah',
            'keljalar_mata_pil',
            'keljalar_mata',
            'keljalar_hidung_pil',
            'keljalar_mulut_pil',
            'keljalar_mulut',
            'keljalar_telinga_pil',
            'keljalar_telinga',
            'keljalar_leher_pil',
            'keljalar_leher',
            'keljalar_tenggorokan_pil',
            'keljalar_bahu_pil',
            'keljalar_bahu',
            'keljalar_tangan_pil',
            'keljalar_tangan',
            'keljalar_dada_pil',
            'keljalar_dada',
            'keljalar_perut_pil',
            'keljalar_perut',
            'keljalar_pinggang_pil',
            'keljalar_punggung_pil',
            'keljalar_punggung',
            'keljalar_kelamin_pil',
            'keljalar_kelamin',
            'keljalar_kaki_pil',
            'keljalar_kaki',
            'keljalar_seltub_pil',
            'kel_tembus_pil',
            'kel_punkel_nil',
            'kel_punkel_lama',
            'kel_kemunculan',
            'kel_kemunculan_saat',
            'kel_penjelasan_awal',
            'kel_penjelasan_kemudian',
            'kel_penjelasan_saat',
            'riwayat_penyakit_pil',
            'riwayatsakit_icdx_id',
            'riwayat_penyakit_nama',
            'riwayat_penyakit_nil',
            'riwayat_penyakit_lama',
            'riwayat_perawatan_pil',
            'riwayat_perawatan_waktu',
            'riwayat_perawatan_tempat',
            'riwayat_perawatan_nil',
            'riwayat_perawatan_lama',
            'riwayat_pengobatan_pil',
            'riwayat_pengobatan_id',
            'riwayat_keluarga_pil',
            'riwayatkel_icdx_id',
            'riwayat_lainnya_pil',
            'riwayat_alergi_pil',
            'alergi_obat_pil',
            'alergi_obat_jenis',
            'alergi_makanan_pil',
            'alergi_makanan',
            'alergi_sabun_pil',
            'alergi_sabun',
            'alergi_udara_pil',
            'alergi_udara',
            'alergi_debu_pil',
            'alergi_lainnya_pil',
            'alergi_lainnya',
            'riwayat_transfusi_pil',
            'transfusi_wb_pil',
            'transfusi_wb_waktu',
            'transfusi_wb_jumlah',
            'transfusi_wb_ukuran',
            'transfusi_trombosit_pil',
            'transfusi_trombosit_waktu',
            'transfusi_trombosit_jumlah',
            'transfusi_trombosit_ukuran',
            'transfusi_eritrosit_pil',
            'transfusi_eritrosit_waktu',
            'transfusi_eritrosit_jumlah',
            'transfusi_eritrosit_ukuran',
            'riwayat_imunisasi_pil',
            'riwayat_imunisasi',
            'kebiasaan_obat_pil',
            'kebiasaan_obat_id',
            'kebiasaan_rokok_pil',
            'kebiasaan_rokok_jmlh',
            'kebiasaan_rokok_satuan',
            'kebiasaan_rokok_nil',
            'kebiasaan_rokok_lama',
            'kebiasaan_rokok_awal',
            'kebiasaan_rokok_berhenti',
            'kebiasaan_rokok_jenis',
            'kebiasaan_alkohol_pil',
            'kebiasaan_alkohol_nil',
            'kebiasaan_alkohol_lama',
            'kebiasaan_alkohol_awal',
            'kebiasaan_alkohol_berhenti',
            'kebiasaan_alkohol_jenis',
            'kebiasaan_perawatan_pil',
            'perawatan_mandi_pil',
            'perawatan_mandi_jmlh',
            'perawatan_mandi_lama',
            'perawatan_mandi_oleh',
            'perawatan_rambut_pil',
            'perawatan_rambut_jmlh',
            'perawatan_rambut_lama',
            'perawatan_rambut_oleh',
            'perawatan_kuku_pil',
            'perawatan_kuku_jmlh',
            'perawatan_kuku_lama',
            'perawatan_kuku_oleh',
            'perawatan_tidur_pil',
            'perawatan_tidur_jmlh',
            'perawatan_tidur_lama',
            'perawatan_tidur_oleh',
            'kebiasaan_nutrisi_pil',
            'nutrisi_selera_pil',
            'nutrisi_selera_makan',
            'makan_frekuensi_pil',
            'makan_frekuensi',
            'makan_pembatasan_pil',
            'makan_pembatasan_asupan',
            'makan_menu_pil',
            'makan_menu_pokok',
            'makan_menu_lauk',
            'makan_menu_sayur',
            'makan_menu_buah',
            'minum_jenis_pil',
            'minum_jenis',
            'minum_frekuensi_pil',
            'minum_frekuensi',
            'minum_cara_pil',
            'minum_cara_pemenuhan',
            'kebiasan_olahraga_pil',
            'olahraga_jenis',
            'olahraga_frekuensi_kali',
            'olahraga_frekuensi_lama',
            'kebiasaan_kegiatan_pil',
            'kegiatan_jenis',
            'kegiatan_frekuensi_kali',
            'kegiatan_frekuensi_lama',
            'faktor_resiko_riwayat',
            'faktor_resiko_kebiasaan',
            'psikososial_hubkel_pil',
            'psikososial_hubkel',
            'psikososial_temting_pil',
            'psikososial_temting',
            'psikososial_tingber_pil',
            'psikososial_tingber',
        ],
    ]) ?>

</div>
