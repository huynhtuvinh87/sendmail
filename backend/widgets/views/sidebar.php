<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\widgets\Menu;
?>
<div class="left_col scroll-view">

    <div class="navbar nav_title" style="border: 0;padding:15px 10px 15px 0;">
        <a href="http://<?= $_SERVER['HTTP_HOST'] ?>" class="site_title">
            ADMINSTRATOR
        </a>
        <a href="http://<?= $_SERVER['HTTP_HOST'] ?>" class="site_title site_title_sm">
            ADMINSTRATOR
        </a>
    </div>
    <div class="clearfix"></div>


    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

        <div class="menu_section ">
            <?php
            echo Menu::widget([
                'items' => [
                        ['label' => '<i class="fa fa-tachometer"></i> ' . \Yii::t('app', 'Home'), 'url' => ['site/index']],
                        ['label' => '<i class="fa fa-thumb-tack"></i> ' . \Yii::t('app', 'Categories'), 'url' => ['category/index'],
                    ],
                        ['label' => '<i class="fa fa-user"></i> ' . \Yii::t('app', 'Info') . '<span class="fa fa-chevron-down"></span>', 'url' => 'javascript:void(0)', 'items' => [
                                ['label' => \Yii::t('app', 'All Infos'), 'url' => ['info/index']],
                                ['label' => \Yii::t('app', 'Add New'), 'url' => ['info/create']],
                        ],
                    ],
                        ['label' => '<i class="fa fa-user"></i> ' . \Yii::t('app', 'User') . '<span class="fa fa-chevron-down"></span>', 'url' => 'javascript:void(0)', 'items' => [
                                ['label' => \Yii::t('app', 'Lists'), 'url' => ['admin/index']],
                                ['label' => \Yii::t('app', 'Create'), 'url' => ['admin/create']],
                        ],
                    ],
                        ['label' => '<i class="fa fa-cog"></i> ' . \Yii::t('app', 'Setting') . '<span class="fa fa-chevron-down"></span>', 'url' => 'javascript:void(0)', 'items' => [
                                ['label' => \Yii::t('app', 'Menu'), 'url' => ['menu/index']],
                                ['label' => \Yii::t('app', 'General'), 'url' => ['general/index']],
                                ['label' => \Yii::t('app', 'Seo'), 'url' => ['seo/index']],
                        ],
                    ],
                ],
                'encodeLabels' => false,
                'submenuTemplate' => "\n<ul class='nav child_menu' style='display: none'>\n{items}\n</ul>\n",
                'options' => array('class' => 'side-menu nav')
            ]);
            ?>

        </div>


    </div>

</div>