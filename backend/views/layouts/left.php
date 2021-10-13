<?php

use backend\models\RefUser;
use backend\models\MenuHibah;
use backend\models\MenuHibahItems;

$tahun = date('Y');
$id_user = Yii::$app->user->getId();
$kd_user = Yii::$app->user->identity->kd_user;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <?php
        $dataMenu = MenuHibah::find()->where(['kd_user' => $kd_user])->orderBy('nourut')->all();
        $menuItems = [];
        $menuItemsDetail = [];
        $favouriteMenuItems[] = ['label' => 'MAIN NAVIGATION', 'options' => ['class' => 'header']];
        foreach ($dataMenu as $value) {
            
                $menuItemsDetail=[];
            if ($value['items'] == 'Y') {
                $dataMenuDetail = MenuHibahItems::find()->where(['kd_menu' => $value['kd_menu']])->orderBy('nourut')->all();
                foreach ($dataMenuDetail as $valueDetail) {
                    $menuItemsDetail[] = [
                        'label' => $valueDetail['label'],
                        'icon' => $valueDetail['icon'],
                        'url' => [$valueDetail['url']],
                    ];
                }
            }
            $menuItems[] = [
                'label' => $value['label'],
                'icon' => $value['icon'],
                'url' => [$value['url']],
                'items' => $menuItemsDetail,
                'visible'=>$value['visible']=='N' ? true : false
            ];
        }
        ?>
        <?=
        dmstr\widgets\Menu::widget(
                [
                    'items' => \yii\helpers\ArrayHelper::merge($favouriteMenuItems, $menuItems)
                ]
//                [
//                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
//                    'items'=>$menuItems,
//                    'items' => [
//                        ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                   //     ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                  //      ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
//                 //       ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
//                        ['label' => 'Data Referensi', 'url' => '#', 'items' => [
//                                ['label' => 'Ref. Provinsi', 'url' => ['/ref-prov']],
//                                ['label' => 'Ref. Kab', 'url' => ['/ref-kabkot']],
//                                ['label' => 'Ref. Jkel', 'url' => ['/ref-jkel']],
//                                ['label' => 'Ref. Agama', 'url' => ['/ref-agama']],
//                                ['label' => 'Ref. Status Kawin', 'url' => ['/ref-status-kawin']],
//                                ['label' => 'Ref. Kewarganegaraan', 'url' => ['/ref-warga']],
//                                ['label' => 'Ref. Jns Pekerjaan', 'url' => ['/ref-pekerjaan']],
//                            //        ['label'=>'Ref. Hibah','url'=>['/ref-hibah']],
////                        ['label'=>'Ref. Provinsi','url'=>['ref-prov']],
//                            //                      ['label'=>'Ref. Provinsi','url'=>['ref-prov']],
//                            //                    ['label'=>'Ref. Provinsi','url'=>['ref-prov']],
//                            ]],
//                        ['label' => 'Data Hibah', 'url' => ['/ref-hibah']],
//                        ['label' => "Data Pemohon", 'url' => ['/ref-pemohon']],
//                        ['label' => "Pengajuan Hibah", 'url' => ['/data-pemohon-hibah']],
//                        ['label' => "Verifikasi  Tim TAPD", 'url' => ['/verifikasi-tapd']],
//                        ['label' => "Data Penerima Hibah", 'url' => ['/data-penerima-hibah']],
//                        ['label' => 'LPJ', 'url' => ['/lpj']],
//                        ['label' => "Laporan", 'url' => '#', 'items' => [
//                                ['label' => 'Lap. LPJ', 'items' => [
//                                    ['label'=>'Bulanan','url'=>['/laporan/lap-bulanan']]
//                                ]]
//                            ]],
//                        ['label' => "Setting", 'url' => ['#'], 'items' => [
//                                ['label' => 'Data Menu', 'url' => ['/menu-hibah']],
//                            ]],
//                      
//                    ],
//                ]
        )
        ?>

    </section>

</aside>
