<?php

use backend\models\RefUser;
use backend\models\MenuHibah;

$tahun = date('Y');
$id_user = Yii::$app->user->getId();
?>



        <!-- Sidebar user panel -->
      
        <!-- /.search form -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <?=
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'nav navbar-nav'],
                    'items' => [
                        ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                        ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                        ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                        ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                        ['label' => 'Data Referensi', 'url' => '#', 'items' => [
                                ['label' => 'Ref. Provinsi', 'url' => ['/ref-prov']],
                                ['label' => 'Ref. Kab', 'url' => ['/ref-kabkot']],
                                ['label' => 'Ref. Jkel', 'url' => ['/ref-jkel']],
                                ['label' => 'Ref. Agama', 'url' => ['/ref-agama']],
                                ['label' => 'Ref. Status Kawin', 'url' => ['/ref-status-kawin']],
                                ['label' => 'Ref. Kewarganegaraan', 'url' => ['/ref-warga']],
                                ['label' => 'Ref. Jns Pekerjaan', 'url' => ['/ref-pekerjaan']],
                            //        ['label'=>'Ref. Hibah','url'=>['/ref-hibah']],
//                        ['label'=>'Ref. Provinsi','url'=>['ref-prov']],
                            //                      ['label'=>'Ref. Provinsi','url'=>['ref-prov']],
                            //                    ['label'=>'Ref. Provinsi','url'=>['ref-prov']],
                           ], 'options'=>['class'=>'dropdown']],
                        ['label' => 'Data Hibah', 'url' => ['/ref-hibah']],
                        ['label' => "Data Pemohon", 'url' => ['/ref-pemohon']],
                        ['label' => "Pengajuan Hibah", 'url' => ['/data-pemohon-hibah']],
                        ['label' => "Verifikasi  Tim TAPD", 'url' => ['/verifikasi-tapd']],
                        ['label' => "Data Penerima Hibah", 'url' => ['/data-penerima-hibah']],
                        ['label' => 'LPJ', 'url' => ['/lpj']],
                        ['label' => "Laporan", 'url' => '#', 'items' => [
                                ['label' => 'Lap. LPJ', 'items' => [
                                    ['label'=>'Bulanan','url'=>['/laporan/lap-bulanan']]
                                ]]
                            ]],
                        ['label' => "Setting", 'url' => ['#'], 'items' => [
                                ['label' => 'Data Menu', 'url' => ['/menu-hibah']],
                            ]],
                        [
                            'label' => 'Some tools',
                            'icon' => 'share',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                                ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                                [
                                    'label' => 'Level One',
                                    'icon' => 'circle-o',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                        [
                                            'label' => 'Level Two',
                                            'icon' => 'circle-o',
                                            'url' => '#',
                                            'items' => [
                                                ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                                ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ]
        )
        ?> 
        </div>
     


