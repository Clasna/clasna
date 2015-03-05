<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/favico.ico" />
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.1.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>CLASNA</title>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/selectbox.css"/>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.selectbox.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/myjs.js"></script>
        <script>
            (function($) {
                $(function() {
                    $('select').selectbox();
                });
            })(jQuery);
            $(document).mouseup(function(e) {
                var igorekNagibaets = $('.basket_enter_popup');
                if (igorekNagibaets.has(e.target).length === 0) {
                    $('.basket_enter_popup').hide();
                }
            });
        </script>  
    </head>
    <body>
        <header>
            <div class="first_panel">
                <div class="dropdown1" id="lang">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if(Yii::app()->language == 'ua'){
                            echo '<img alt="ua" src="'.Yii::app()->request->baseUrl.'/img/lang_ua.jpg"> UA';
                        } elseif(Yii::app()->language == 'ru') {
                            echo '<img alt="ua" src="'.Yii::app()->request->baseUrl.'/img/lang_ru.jpg"> RU';
                        } /*elseif(Yii::app()->language == 'en') {
                            echo '<img alt="ua" src="'.Yii::app()->request->baseUrl.'/img/lang_en.jpg"> EN';
                        }*/
                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/ua/<?php echo $this->urlLang(); ?>"><img alt="ua" src="<?php echo Yii::app()->request->baseUrl; ?>/img/lang_ua.jpg">UA</a>
                        </li>
                        <li>
                            <a href="/ru/<?php echo $this->urlLang(); ?>"><img alt="ru" src="<?php echo Yii::app()->request->baseUrl; ?>/img/lang_ru.jpg">RU</a>
                        </li>
                        <!--<li>
                            <a href="/en/<?php echo $this->urlLang(); ?>"><img alt="en" src="<?php echo Yii::app()->request->baseUrl; ?>/img/lang_en.jpg">EN</a>
                        </li>-->
                    </ul>
                </div>
                <!--<form method="post">
                    <select>
                        <?php /*echo $this->p();*/ ?>
                    </select>
                </form>-->
                <style type="text/css">
                    #pack {
                        position: relative;
                    }
                </style>
                <div class="pack" id="pack">
                <?php echo $this->renderPartial('//layouts/_item', array('basket' => isset($basket)?$basket:null,'block'=>isset($block)?$block:null,false, true)); ?>
                </div>
                <a href="/<?php echo Yii::app()->language;  ?>/user/registration" class="reg"><?php echo Yii::t('main', 'reg'); ?></a>
                <?php if(!Yii::app()->user->id) {?>
                <a href="/<?php echo Yii::app()->language;  ?>/user/login" class="enter"><?php echo Yii::t('main', 'enter'); ?></a>
                <?php } else { ?>
                <a class="exit-user" href="/site/logout"><?php echo Yii::t('user', 'exit'); ?></a>
                <a href="/<?php echo Yii::app()->language;  ?>/user/index" class="enter"><?php echo Yii::t('user', 'private_office'); ?> |
                <?php
                    $Email = $this->getEmailUserProf();
                    echo $Email['email'];
                ?>
                </a>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
            <div class="second_panel">
                <a class="logo" href="/"><img alt="CLASSNA" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png"></a>
                <ul class="nav">
                    <li>
                        <a href="/<?php echo Yii::app()->language; ?>/woman">
                            <?php echo Yii::t('main','women'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="/<?php echo Yii::app()->language; ?>/men">
                            <?php echo Yii::t('main','man'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="/<?php echo Yii::app()->language; ?>/wholesale">
                            <?php echo Yii::t('main','wholesale'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="/<?php echo Yii::app()->language; ?>/stores">
                            <?php echo Yii::t('main','stores'); ?>
                        </a>
                    </li>
                    <li><img alt="phone" class="phone" src="<?php echo Yii::app()->request->baseUrl; ?>/img/phone_img.png">0 800 500 123</li>
                    <li class="search"><input type="search" placeholder="<?php echo Yii::t('main', 'search'); ?>"></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </header>
<?php echo $content; ?>
        <footer>
            <div class="footer_top">
                <div class="footer_classna">
                    <h1><?php echo Yii::t('main', 'clasna'); ?></h1>
                    <ul>
                        <?php $footer = $this->menuFooter('clasna'); ?>
                        <?php if(isset($footer)) {?>
                        <?php foreach($footer as $_footer) {?>
                        <li><a href="/<?php echo Yii::app()->language; ?>/content/<?php echo $_footer->url ?>">
                        <?php 
                        if(Yii::app()->language == 'ua'){
                            echo $_footer->name_ua;
                        } elseif(Yii::app()->language == 'ru') {
                            echo $_footer->name_ru;
                        } elseif(Yii::app()->language == 'en') {
                            echo $_footer->name_en;
                        }
                        ?>
                        </a></li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="footer_cooperation">
                    <h1><?php echo Yii::t('main', 'rab'); ?></h1>
                    <ul>
                        <?php $cooperation = $this->menuFooter('cooperation'); ?>
                        <?php if(isset($cooperation)) {?>
                        <?php foreach($cooperation as $_cooperation) {?>
                        <li><a href="/<?php echo Yii::app()->language; ?>/content/<?php echo $_cooperation->url ?>">
                        <?php 
                        if(Yii::app()->language == 'ua'){
                            echo $_cooperation->name_ua;
                        } elseif(Yii::app()->language == 'ru') {
                            echo $_cooperation->name_ru;
                        } elseif(Yii::app()->language == 'en') {
                            echo $_cooperation->name_en;
                        }
                        ?>
                        </a></li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="footer_buyer">
                    <h1><?php echo Yii::t('main', 'buy'); ?></h1>
                    <ul>
                        <li><a href="#">Новини</a></li>
                        <li><a href="#">Акції</a></li>
                        <li>
                            <?php  $mainContent = $this->getMainContent('11'); ?>
                            <?php if(isset($mainContent)){  ?>
                            <a href="/<?php echo Yii::app()->language; ?>/content/<?php echo $mainContent->url ?>">
                            <?php
                                   if(Yii::app()->language == 'ua'){
                                        echo  $mainContent->name_ua;
                                    } elseif(Yii::app()->language == 'ru') {
                                        echo  $mainContent->name_ru;
                                    } elseif(Yii::app()->language == 'en') {
                                        echo  $mainContent->name_en;
                                    }
                            ?>
                            </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
                <!-- <a href="#" class="blog"><?php //echo Yii::t('main', 'blog'); ?></a> -->
                <div class="subscribe">
                    <h1><?php echo Yii::t('main', 'pnnews'); ?></h1>
                     <div class="clearfix"></div>
                    <form>
                            <button type="submit"><?php echo Yii::t('main', 'pn'); ?></button>
                            <input type="text" placeholder="Ваш Email">
                            <div class="clearfix"></div>
                    </form>
                    <p>
                        <?php echo Yii::t('main', 'tsznews'); ?>:
                        <a href="#"><img alt="fb" src="<?php echo Yii::app()->request->baseUrl; ?>/img/fb.jpg"></a>
                        <a href="#"><img alt="vk" src="<?php echo Yii::app()->request->baseUrl; ?>/img/vk.jpg"></a>
                        <a href="#"><img alt="twiter" src="<?php echo Yii::app()->request->baseUrl; ?>/img/twiter.jpg"></a>
                        <a href="#"><img alt="insta" src="<?php echo Yii::app()->request->baseUrl; ?>/img/insta.jpg"></a>
                    </p>
                </div>
            </div>
            <div class="copyright">
                <p>
                    &#169; 2001–2015 CLASNA
                </p>
            </div>
        </footer>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = '3a7jEF9wnC';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->
    </body>
</html>