<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\ContratoObrero;
use app\models\TipoObrero;
use app\models\Persona;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\Actividades */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Asignar Obrero';
?>

<div class="actividades-form">

    <?php $form = ActiveForm::begin(); ?>


<div class="row">
    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4 class="box-title">Obrero</h4>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <?=  Select2::widget([
                            'name' => 'date_from',
                            'data' => ArrayHelper::map(TipoObrero::find()->all(),'TOB_ID','TOB_NOMBRE'),
                            'language' => 'es',
                            'options' => ['placeholder' => 'Selecionar tipo de obrero',
                                'onchange'=>'$.post("index.php?r=actividades/lista-obreros&id='.'"+$(this).val(),function(data){
                                    $("select#manodeobratrabajan-pe_rut").html(data);
                                } )',],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                        ?>
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($obrero_asignado, 'PE_RUT')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Persona::find()->all(),'PE_RUT','PE_NOMBRES'),
                            'language' => 'es',
                            'options' => ['placeholder' => 'Selecionar obrero',],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false);
                        ?>
                    </div>
                </div>
                <div id="obrero"></div>
            </div>
            <div class="box-footer">
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h4 class="box-title text-blue">Obreros Asignados</h4>
            </div>
            <div class="box-body no-padding">
                <table class="table table-hover">
                    <tr class="bg-blue">
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Tipo de Obrero</th>
                        <th>Sueldo</th>
                    </tr>
                    <tr>
                        <?php foreach ($trabajan as $trab) { ?>
                            <td><?= $trab->PE_RUT ?></td>
                            <td><?= $trab->pERUT->PE_NOMBRES.$trab->pERUT->PE_APELLIDOPAT.$trab->pERUT->PE_APELLIDOMAT?></td>
                            <td><?= $trab->tOB->NOMBRE ?></td>
                            <?php foreach ($sueldos as $sueldo) {
                                if($sueldo->COO_ID == $trab->COO_ID){ ?>
                                    <td><?= $sueldo->SU_CANTIDAD ?></td>
                            <?php break;
                                }} ?>
                        <?php } ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>



<?php /*

<?= $form->field($model, 'AC_FECHA_INICIO')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

<?= $form->field($model, 'AC_FECHA_TERMINO')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>


*/ ?>


    <div class="form-group">
        <?= Html::submitButton($obrero_asignado->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $obrero_asignado->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Listo', ['calendario', 'id' => $model->OT_ID], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>
