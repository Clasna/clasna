<!DOCTYPE html>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<html>
    <head>
        <title>DAYGID</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Bootstrap -->
        <?php
        $baseUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();
        Yii::app()->clientScript->registerCoreScript('jquery');
        ?>
        <link href="<?php echo $baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $baseUrl; ?>/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?php echo $baseUrl; ?>/css/my-style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/add_styles.css" />

    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
    <!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js">-->
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/source/jquery.fancybox.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/source/jquery.fancybox.css" media="screen" />
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/scripts.js"></script>
        <!--<script src="/js/agency_scripts.js"></script>-->
        <!--<script src="/js/client_scripts.js"></script>-->

        <script src="<?php echo $baseUrl; ?>/js/jquery.nicescroll.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.form.validation.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/valid_script.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/niceSelect.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/reviews.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/jquery-ui.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/bootstrap.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/jquery.shorten.1.0.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/jquery.ui.datepicker-ru.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/custom.js"></script>
        <script type="text/javascript" src="https://apis.google.com/js/platform.js">
            {
                lang: 'ru';
            }
        </script>
        <script>
            $(function() {
                $("#datepicker").datepicker($.datepicker.regional[ "ru" ]);
            });

            $(document).ready(function() {

                $('body').append('<div id="blackout"></div>');

                var boxWidth = $('.popup-box').width();
                function centerBox() {

                    /* определяем нужные данные */
                    var winWidth = $(window).width();
                    var winHeight = $(document).height();
                    var scrollPos = $(window).scrollTop();

                    /* Вычисляем позицию */

                    var disWidth = (winWidth - boxWidth) / 2;
                    //                var disHeight = winHeight;

                    /* Добавляем стили к блокам */
                    //                $('.popup-box').css({'width' : boxWidth+'px', 'left' : disWidth+'px'});
                    $('#blackout').css({'width': winWidth + 'px', 'height': winHeight + 'px'});

                    return false;
                }
                $(window).resize(centerBox);
                $(window).scroll(centerBox);
                centerBox();
                $('[class*=popup-link]').click(function(e) {

                    /* Предотвращаем действия по умолчанию */
                    e.preventDefault();
                    e.stopPropagation();

                    /* Получаем id (последний номер в имени класса ссылки) */
                    var name = $(this).attr('class');
                    var id = name[name.length - 1];
                    var scrollPos = $(window).scrollTop();

                    /* Корректный вывод popup окна, накрытие тенью, предотвращение скроллинга */
                    $('#popup-box-' + id).show();
                    $('#blackout').show();
                    //                $('html,body').css('overflow', 'hidden');

                    /* Убираем баг в Firefox */
                    //                $('html').scrollTop(scrollPos);
                });

                $('[class*=popup-box]').click(function(e) {
                    /* Предотвращаем работу ссылки, если она являеться нашим popup окном */
                    e.stopPropagation();
                });
                $('html').click(function() {
                    var scrollPos = $(window).scrollTop();
                    /* Скрыть окно, когда кликаем вне его области */
                    $('[id^=popup-box-]').hide();
                    $('#blackout').hide();
                    //                    $("html,body").css("overflow","auto");
                    //                    $('html').scrollTop(scrollPos);
                });
                $('.close').click(function() {
                    var scrollPos = $(window).scrollTop();
                    /* Скрываем тень и окно, когда пользователь кликнул по X */
                    $('[id^=popup-box-]').hide();
                    $('#blackout').hide();

                    $("html,body").css("overflow", "auto");
                    $('html').scrollTop(scrollPos);
                });
            });

        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#prompt_button').click(function() {
                    if ($('#prompt').css('margin-left') === '-250px') {
                        $('#prompt').css('margin-left', '0px');
                        $('#prompt_button').addClass('show');
                    } else {
                        $('#prompt').css('margin-left', '-250px');
                        $('#prompt_button').removeClass('show');
                    }
                });
            });
        </script>
		<script type="text/javascript">
            $(document).ready(function() {
                var pathname = window.location.pathname;
				if(pathname === '/'){
					$('#prompt').css('margin-left', '0px');
					$('#prompt_button').addClass('show');
					setTimeout(function(){
						$('#prompt').css('margin-left', '-250px');
                        $('#prompt_button').removeClass('show');
					},10000);
				}else{
					var interval = setInterval(function(){
						if($('#prompt').css('opacity') == '1'){
							$('#prompt').css('opacity','0.5');
						}else{
							$('#prompt').css('opacity','1');
						}
					}, 500);
					setTimeout(function(){
						clearInterval(interval);
						$('#prompt').css('opacity','1');
					},10000);		
				}
            });
        </script>
        <script type="text/javascript">
            var top_show = 150; // В каком положении полосы прокрутки начинать показ кнопки "Наверх"
            var delay = 1000; // Задержка прокрутки
            $(document).ready(function() {
                $(window).scroll(function() { // При прокрутке попадаем в эту функцию
                    /* В зависимости от положения полосы прокрукти и значения top_show, скрываем или открываем кнопку "Наверх" */
                    if ($(this).scrollTop() > top_show)
                        $('#top').fadeIn();
                    else
                        $('#top').fadeOut();
                });
                $('#top').click(function() { // При клике по кнопке "Наверх" попадаем в эту функцию
                    /* Плавная прокрутка наверх */
                    $('body, html').animate({
                        scrollTop: 0
                    }, delay);
                });
            });
        </script>
        <script type="text/javascript" src="http://vk.com/js/api/share.js?90" charset="windows-1251"></script>
    </head>
    <body>
         <div id="prompt" style="margin-left: -250px;">
            <?php if ($_SERVER['REQUEST_URI'] == '/') { ?>
                <div id="prompt_content" >
                    Выберите дату проведения мероприятия.
                </div>
            <?php } ?>
            <?php if ($_SERVER['REQUEST_URI'] == '/services') { ?>
                <div id="prompt_content" >
                    Выберите услугу, которая Вам необходима. Если услуга не активна, то на сайте не зарегистрированы представители
                    из выбранного Вами города.
                </div>
            <?php } ?>
            <?php if ($_SERVER['REQUEST_URI'] == '/agency') { ?>
                <div id="prompt_content" >
                    Для того чтобы добавить видеозапись к себе в коллекцию перейдите на страницу с видео в <a href="https://www.youtube.com/" target="_blank" >YouTube</a> и нажмите "Поделиться". Полученную ссылку добавте в форму добавления видео.
                </div>
            <?php } ?>
            <?php
            $arr = explode('/', $_SERVER['REQUEST_URI']);
            if (($arr[1] == 'services') && ($arr[2] > 0) && ($arr[2] < 100)) {
                ?>
                <div id="prompt_content" >
                    Вы можете выбрать специалиста из списка и перейти на его страницу кликнув на него. Так же Вы можете добавить
                    его в свой список специалистов находящийся в Вашем личном кабинете сайта. Для этого наведите курсор мышки на специалиста и кликните на всплывающее окошко.
                    Так же Вы можете оставить заявку на определённое время у конкретного специалиста из списка, кликнув на часовую шкалу дня.
                </div>
            <?php } ?>
            <?php
            $arr = explode('/', $_SERVER['REQUEST_URI']);
            if (($arr[1] == 'agency') && ($arr[2] == 'profile')) {
                ?>
                <div id="prompt_content" >
                    1)(Верх страницы) Вы можете подать заявку специалисту или обсудить с
                    ним интересующие Вас вопросы.
                    2) (уровень календаря.) Вы можете просмотреть и/или оставить заявку специалисту на другую неделю кликнув на значок календаря.
                </div>
            <?php } ?>
            <div id="prompt_button" style="">
                Show
            </div>
        </div>
        <header>
            <?php $this->renderPartial('//elements/popupCities'); ?>
            <div class="buttonsEnter">
                <div class="buttonsEnter-holder" title="Управление аккаунтом">
                    <?php $this->renderPartial('//elements/buttonsEnter'); ?>
                </div>
        <!--        <img class="arka" src="<?php echo $baseUrl; ?>/img/head.png">-->
               <!-- <div class="header-arka">
                    <a href="/"><img class="header-arka-img" src="/themes/public/img/header-arka.png" alt="" width="403"height="177px"></a>
                    <?php $this->renderPartial('//elements/headPhoto', array('headPhoto' => $this->headPhoto)); ?>
                </div>-->
                <div class="header-arka">
                    <a href="/"><img class="header-arka-img" src="/themes/public/img/logo_new.png" alt="" width="260px "height="110px"></a>
                    <?php $this->renderPartial('//elements/headPhoto', array('headPhoto' => $this->headPhoto)); ?>
                </div>
                <h1 class="arka">Каталог служб для свадебных приготовлений и церемоний</h1>
            </div>

        </header>
        <?php echo $content; ?>

        <div class="footer">
            <div class="footer_border">
            </div>
            <menu>
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'encodeLabel' => false,
                    'items' => array(
                        array('label' => 'Главная страница', 'url' => array('/site/index')),
                        array('label' => 'Форум', 'url' => array('/forum')),
                        //array('label' => 'Обучающее видео', 'url' => array('site/video')),
                        array('label' => 'Правила пользования', 'url' => array('/terms'),
                            'active' => Yii::app()->controller->getId() == 'terms'),
                        array('label' => 'Отзывы', 'url' => array('/reviews/index'),
                            'active' => Yii::app()->controller->getId() == 'reviews'),
                        array('label' => 'Статьи', 'url' => array('/articles/index')/* ,
                          'active' => Yii::app()->controller->getId() == 'articles' */),
                        array('label' => 'Обратная связь', 'url' => array('/site/contact'),
                            'active' => Yii::app()->controller->getId() == 'dictionary')
                    ),
                ));
                ?>
                <div class="g-plusone" data-annotation="none"></div>
                <div class="vk">
                    <script type="text/javascript">
            document.write(VK.Share.button(false, {type: "custom", text: "<img src=\"http://vk.com/images/share_32.png\" width=\"24\" height=\"24\" />"}));
                    </script>
                </div>
            </menu>
            <div class="footer_border"></div>
            <p id="copy"> Powered by Smithysoft™ All rights reserved. <br>support@smithysoft</p>
        </div>
        <div id="top">Наверх</div>
        <?php $this->renderPartial('//elements/underFooter'); ?>
    </body>
</html>
