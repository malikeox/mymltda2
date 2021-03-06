<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>


<aside class="main-sidebar">

    <section class="sidebar" style="height: auto;">
        <?php /*
        <br>
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?= Html::img('img/user-default.png', ['class'=>'img-circle', 'alt'=>'User Image']) ?>

            </div>
            <div class="pull-left info">
                <p>Luis Maliqueo</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Administrador</a>
            </div>
        </div>
        <br>
        */ ?>
        <!-- search form -->
        <?php /*
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>*/ ?>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menú', 'options' => ['class' => 'header']],
                    ['label' => 'Proyectos', 'icon' => 'fa fa-archive', 'url' => ['/proyecto']],
                    ['label' => 'Orden de Trabajos', 'icon' => 'fa fa-tasks', 'url' => ['/orden-trabajo']],
                    ['label' => 'Inventario', 'icon' => 'fa fa-list-alt', 'url' => '#',
                        'items' => [
                            ['label' => 'Materiales', 'icon' => 'fa fa-circle-o', 'url' => ['/materiales'],],
                            ['label' => 'Herramientas', 'icon' => 'fa fa-circle-o', 'url' => ['/herramientas'],],
                            ['label' => 'Informe Inventario', 'icon' => 'fa fa-circle-o', 'url' => ['/bodegas/informe-invent'],],

                        ],
                    ],
                    ['label' => 'Mano de Obra', 'icon' => 'fa fa-male', 'url' => '#',
                        'items' => [
                            ['label' => 'Obreros', 'icon' => 'fa fa-circle-o', 'url' => ['/persona/index-obrero'],],
                            ['label' => 'Encargados de Obras', 'icon' => 'fa fa-circle-o', 'url' => ['/persona/index-encargado'],],

                        ],
                    ],
                    /*
                    ['label' => 'Bodegas', 'icon' => 'fa fa-industry', 'url' => ['/bodegas'],
                        'items' => [
                            ['label' => 'Materiales', 'icon' => 'fa fa-circle-o', 'url' => ['/materiales'],],
                            ['label' => 'Herramientas', 'icon' => 'fa fa-circle-o', 'url' => ['/herramientas'],],

                        ],
                    ],*/
                    ['label' => 'Usuarios', 'icon' => 'fa fa-user', 'url' => '#',
                        'items' => [
                            ['label' => 'Cuentas', 'icon' => 'fa fa-circle-o', 'url' => ['/usuario'],],
                            ['label' => 'Administrar', 'icon' => 'fa fa-circle-o', 'url' => ['/admin/assignment'],],
                            ['label' => 'Roles', 'icon' => 'fa fa-circle-o', 'url' => ['/admin/role'],],
                            ['label' => 'Rutas', 'icon' => 'fa fa-circle-o', 'url' => ['/admin/route'],],
                            ['label' => 'Reglas', 'icon' => 'fa fa-circle-o', 'url' => ['/admin/rule'],],
                            ['label' => 'Permisos', 'icon' => 'fa fa-circle-o', 'url' => ['/admin/permission'],],

                        ],
                    ],
                    ['label' => 'Sub-Actividades', 'icon' => 'glyphicon glyphicon-inbox', 'url' => ['/subactividades']],
                    ['label' => 'Proveedores', 'icon' => 'fa fa-truck', 'url' => ['/proveedor']],
                    /*
                    ['label' => 'Base de Datos', 'icon' => 'fa fa-database', 'url' => '#',
                        'items' => [
                            ['label' => 'Sub-Actividades', 'icon' => 'fa fa-circle-o', 'url' => ['/subactividades'],],
                            ['label' => 'Clientes', 'icon' => 'fa fa-circle-o', 'url' => ['/empresa-cliente'],],
                            ['label' => 'Proveedores', 'icon' => 'fa fa-circle-o', 'url' => ['/proveedor'],],
                            //['label' => 'Bodegas', 'icon' => 'fa fa-circle-o', 'url' => ['/bodegas'],],
                            ['label' => 'Personas', 'icon' => 'fa fa-circle-o', 'url' => ['/persona/index'],],
                        ],
                    ],*/
                    ['label' => 'Cerrar Sesión', 'icon' => 'fa fa-circle-o text-red', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post'],],
                ],
            ]
        ) ?>

    </section>

</aside>
