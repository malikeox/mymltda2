<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TipoMaterial;
use kartik\select2\Select2;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Materiales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="materiales-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'MA_ID')->textInput(['maxlength' => true, 'type'=>'number'])->label('ID Material') ?>
        </div>
        <div class="col-md-9">
            <?= $form->field($model, 'MA_NOMBRE')->textInput(['maxlength' => true]) ?>
        </div>
    </div>



    <div class="row">
        <div class="col-md-5">
            <?= $form->field($model, 'TMA_ID')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(TipoMaterial::find()->all(),'TMA_ID','TMA_NOMBRE'),
                'language' => 'es',
                'options' => ['placeholder' => 'Selecionar tipo de material'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'MA_UNIDAD')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'MA_COSTOUNIDAD')->textInput() ?>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
