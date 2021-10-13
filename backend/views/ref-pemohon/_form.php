<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\RefJkel;
use backend\models\RefKabkot;
use backend\models\RefKelurahan;
use backend\models\RefKec;
use backend\models\RefAgama;
use backend\models\RefStatusKawin;
use backend\models\RefPekerjaan;
use backend\models\RefWarga;
use kartik\select2\Select2;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker; 
/* @var $this yii\web\View */
/* @var $model backend\models\RefPemohon */
/* @var $form yii\widgets\ActiveForm */

$id_ref_kec = $model->isNewRecord ? '' : RefKec::findOne($model->id_ref_kec)->nama_kec;
$urlKec = Url::to(['/ref-kec/kec-list']);
//$nmDesa = $model->isNewRecord ? '' : RefKelurahan::findOne($model->id_ref_kec)->nama_kec;
$urlDes = Url::to(['/ref-keluarahan/kelurahan-list']);
$itemsRefAgama = ArrayHelper::map(RefAgama::find()->where(['aktif'=>1])->asArray()->all(),'id','nm_agama');
$itemsRefStatusKawin = ArrayHelper::map(RefStatusKawin::find()->where(['aktif'=>'Y'])->asArray()->all(),'id','status_kawin');
$itemsRefPekerjaan = ArrayHelper::map(RefPekerjaan::find()->where(['aktif'=>'Y'])->asArray()->all(),'id','pekerjaan');
$itemsRefWarga = ArrayHelper::map(RefWarga::find()->where(['aktif'=>'Y'])->asArray()->all(),'id','warga');
?>

<div class="ref-pemohon-form">

<?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'id_ref_jkel')->dropDownList(
            yii\helpers\ArrayHelper::map(RefJkel::find()->where(['aktif' => 'Y'])->asArray()->all(), 'id', 'jkel'),
            ['prompt' => 'Pilih JKel']
    )
    ?>
    <div class="row">
        <div class="col-md-6">
<?= $form->field($model, 'tmp_lahir')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-6">

<?= $form->field($model, 'tgl_lahir')->widget(DatePicker::class,[
    'value' => date('yyyy-mm-dd', strtotime('+2 days')),
    'options'=>[
        'placeholder'=>'Tanggal Lahir ...'
    ],
    'pluginOptions'=>[
        'format'=>'yyyy-mm-dd',
        'todayHighlight'=>true
    ]
]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'rt')->textInput() ?>

        </div>
        <div class="col-md-4">
<?= $form->field($model, 'rw')->textInput() ?>

        </div>
    </div>


    <?=
    $form->field($model, 'id_ref_kec')->widget(Select2::class, [
        'initValueText' => $id_ref_kec, // set the initial display text
        'options' => ['placeholder' => 'Pilih Kecamatan ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
            ],
            'ajax' => [
                'url' => $urlKec,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(city) { return city.text; }'),
            'templateSelection' => new JsExpression('function (city) { return city.text; }'),
        ],
    ])
    ?>

    <?php /* $form->field($model, 'desa')->widget(Select2::class,[
        'initValueText'=>$nmDesa,
        'options'=>[
            'placeholder'=>'Pilih Keluarahan / Desa... '
        ],
        'pluginOptions'=>[
            'allowClear'=>true,
            'minimumInputLength'=>3,
            'language'=>[
                'errorLoading'=>new JsExpression("function(){ return 'Waiting for results...';}"),
            ],
            'ajax'=>[
                'url'=>$urlDes,
                'dataType'=>'json',
                'data'=>new JsExpression('function(params){return {q:params.term};}'),
            ],
            'escapeMarkup'=>new JsExpression('function (markup) {return markup;}'),
            'templateResult'=>new JsExpression('function(desa){ return desa.text;}'),
            'templateSelection'=>new JsExpression('function (desa){return desa.text;}')
        ]
    ])
     *  
     */
    echo $form->field($model, 'desa')->textInput();
?>

    <?= $form->field($model, 'id_ref_agama')->dropDownList($itemsRefAgama,[
        'prompt'=>'Pilih Kepercayaan / Agama...'
    ]) ?>

    <?= $form->field($model, 'id_ref_status_kawin')->dropDownList($itemsRefStatusKawin,[
        'prompt'=>'Pilih Status Pernikahan...'
    ]) ?>

    <?= $form->field($model, 'id_ref_pekerjaan')->dropDownList($itemsRefPekerjaan,[
        'prompt'=>'Pilih Jenis Pekerjaan...'
    ]) ?>

<?= $form->field($model, 'id_ref_warga')->dropDownList($itemsRefWarga,[
    'prompt'=>'Pilih Kewarganegaraan...'
]) ?>

        <?= $form->field($model, 'aktif')->label('Status')->dropDownList(['Y' => 'Aktif', 'N' => 'Non Aktif'], [
            'prompt'=>'Pilih Status ...'
        ]) ?>


    <div class="form-group">
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
