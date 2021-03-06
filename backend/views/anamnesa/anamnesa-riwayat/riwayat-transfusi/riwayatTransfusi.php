<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 20/03/15
 * Time: 21:43
 */

use kartik\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Typeahead;
use yii\helpers\Url;
use yii\bootstrap\Modal;

?>
<div class="modal-content" style="width: 450px;margin-left: 400px;margin-top: 100px">
    <div class="modal-header">
        Riwayat Transfusi
        <a class="close" data-dismiss="modal">&times;</a>
    </div>

    <div class="modal-body" style="margin:0px 10px;">
        <?php $form = ActiveForm::begin([
            'id' => 'riwayatTransfusi-form',
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'formConfig' => [
                'deviceSize' => ActiveForm::SIZE_SMALL,
                'labelSpan' => 1,
                'showLabels'=>false

            ]
        ]);
        ?>
        <div class="form-group">
            <div class="col-md-12">
                <?= $form->field($model, 'transfusi_wb_pil')->checkbox(['label' => 'Whole blood']); ?>
                <div id="whole_blood_isi" style="margin-left: 20px;">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="Diagnosa">Waktu :</label>
                        <div class="col-md-6">
                            <?php
                            echo $form->field($model, 'transfusi_wb_waktu')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => ''],
                                'convertFormat' => true,
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-MM-yyyy'
                                ],
                                'language' => 'id'
                            ]);

                                $list = ['kantong' => 'Kantong', 'mL/cc' => 'mL/cc'];
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="Diagnosa">Jumlah :</label>
                        <div class="col-md-3">
                            <?= $form->field($model, 'transfusi_wb_jumlah'); ?>
                        </div>
                        <div class="col-md-5">
                            <?= $form->field($model, 'transfusi_wb_ukuran')->dropDownList($list); ?>
                        </div>
                    </div>
                </div>
                <?= $form->field($model, 'transfusi_trombosit_pil')->checkbox(['label' => 'Trombosit']); ?>
                <div id="trombosit_isi" style="margin-left: 20px;">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="Diagnosa">Waktu :</label>
                        <div class="col-md-6">
                            <?php
                            echo $form->field($model, 'transfusi_trombosit_waktu')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => ''],
                                'convertFormat' => true,
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-MM-yyyy'
                                ],
                                'language' => 'id'
                            ]);

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="Diagnosa">Jumlah :</label>
                        <div class="col-md-3">
                            <?= $form->field($model, 'transfusi_trombosit_jumlah'); ?>
                        </div>
                        <div class="col-md-5">
                            <?= $form->field($model, 'transfusi_trombosit_ukuran')->dropDownList($list); ?>
                        </div>
                    </div>
                </div>
                <?= $form->field($model, 'transfusi_eritrosit_pil')->checkbox(['label' => 'Eritrosit']); ?>
                <div id="eritrosit_isi" style="margin-left: 20px;">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="Diagnosa">Waktu :</label>
                        <div class="col-md-6">
                            <?php
                            echo $form->field($model, 'transfusi_eritrosit_waktu')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => ''],
                                'convertFormat' => true,
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'dd-MM-yyyy'
                                ],
                                'language' => 'id'
                            ]);

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="Diagnosa">Jumlah :</label>
                        <div class="col-md-3">
                            <?= $form->field($model, 'transfusi_eritrosit_jumlah'); ?>
                        </div>
                        <div class="col-md-5">
                            <?= $form->field($model, 'transfusi_eritrosit_ukuran')->dropDownList($list); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		&nbsp;<hr>
        <div class="form-group">
            <div class="col-md-offset-1 col-md-4">
                <input id="btnTransfusiOk" type="button" class="btn btn-primary" value="OK">
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<script>var id = '<?php echo $_GET['id']; ?>' </script>
<!--<script src="/admin/js/riwayatTransfusi.js"></script>-->
<script>
    $(document).ready(function(){
        //$('#whole_blood_isi').hide();
        //$('#trombosit_isi').hide();
        //$('#eritrosit_isi').hide();

        if($('#anamnesa-transfusi_wb_pil').prop( "checked" )){
            $('#whole_blood_isi').show();
        }else{
            $('#whole_blood_isi').hide();
        }

        if($('#anamnesa-transfusi_trombosit_pil').prop( "checked" )){
            $('#trombosit_isi').show();
        }else{
            $('#trombosit_isi').hide();
        }

        if($('#anamnesa-transfusi_eritrosit_pil').prop( "checked" )){
            $('#eritrosit_isi').show();
        }else{
            $('#eritrosit_isi').hide();
        }

        $('#anamnesa-transfusi_wb_pil').change(function(){
            if($('#anamnesa-transfusi_wb_pil').prop( "checked" )){
                $('#whole_blood_isi').show();
            }else{
                $('#whole_blood_isi').hide();
            }
        });

        $('#anamnesa-transfusi_trombosit_pil').change(function(){
            if($('#anamnesa-transfusi_trombosit_pil').prop( "checked" )){
                $('#trombosit_isi').show();
            }else{
                $('#trombosit_isi').hide();
            }
        });

        $('#anamnesa-transfusi_eritrosit_pil').change(function(){
            if($('#anamnesa-transfusi_eritrosit_pil').prop( "checked" )){
                $('#eritrosit_isi').show();
            }else{
                $('#eritrosit_isi').hide();
            }
        });

        $('#btnTransfusiOk').click(function(){

            var transfusi = $("input:checkbox[name='Anamnesa[riwayat_transfusi_pil]']:checked").map(function()
            {
                return $(this).val();
            }).get();

            $.ajax({
                type: "POST",
                url: baseurl + '/Anamnesa/AnamnesaRiwayatLainnya/riwayat-transfusi/update-transfusi?id='+id,
                data: $('#riwayatTransfusi-form').serialize() + "&transfusi_pil=" + transfusi,
                success:function(data){
                    //alert('Success Update Data');
                    //$("#m_riwayatperawatan").modal('hide');
                }
            });
        });

    });
</script>
