<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\HerramientaTiene;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HerramientasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Herramientas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="herramientas-index">

    <h1>Retorno de Herramientas</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php 
    Modal::begin([
            'header'=>'<h4>Ingresar Herramienta</h4>',
            'id'=>'modal',
            'size'=>'modal-lg',
        ]);
    echo "<div class='modalContent'></div>";
    Modal::end();
 ?>
<?php 
    Modal::begin([
            'header'=>'<h4>Herramienta</h4>',
            'id'=>'modal-view',
            'size'=>'modal-lg',
        ]);
    echo "<div class='modalContent'></div>";
    Modal::end();
 ?>


<br>
<div class="row">
    <div class="col-md-3">
            <?= Html::button('Ingresar Retorno de herramientas', ['value'=>Url::to(['herramientas/create']),'class'=> 'btn btn-success btn-block btn-flat margin-bottom','id'=>'modalButton']) ?>
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Operaciones</h3>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li><?= Html::a('Lista herramientas', ['herramientas/index']) ?></li>
                    <li><?= Html::a('Despacho de herramientas', ['herramientas/despachos-index']) ?></li>
                    <li class="active"><a href="#">Retorno de herramientas</a></li>
                    <li><?= Html::a('Solicitud de Prestamo', ['solicitud-prestamo/index']) ?></li>
                </ul>
            </div>
        </div>
    </div>




    <div class="col-md-9">
        <div class="box">
            <div class="box-body no-padding">

                <table class="table table-bordered">
                    <tr class="bg-gray">
                        <th>ID</th>
                        <th>Orden de Trabajo</th>
                        <th>Fecha Despacho</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <?php foreach ($retorno_he as $retorno) { ?>
                        <tr>
                            <td><?= $retorno->DH_ID ?></td>
                            <td><?= $retorno->oT->OT_NOMBRE ?></td>
                            <td><?= $retorno->DH_FECHA_SALIDA ?></td>
                            <td><?= $retorno->DH_ESTADO ?></td>

                        </tr>
                    <?php } ?>

                </table>

            </div>

        </div>
    </div>
</div>
</div>


<?php 
$script = <<< JS


    $('.modalAct').click(function() {
        $('#modal-view').modal('show')
        .find('.modalContent')
        .load($(this).attr('value'));
    });

JS;
$this->registerJs($script);
?>