<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>GeekHub - отримай практичні знання в сфері IT</title>
    <meta name="description"
          content="GeekHub надає можливість отримати практичні знання та навички в сфері розробки програмного забезпечення">
    <meta name="keywords" content="GeekHub, ГікХаб, Черкаси, Cherkassy">


    <link href="style.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="./css/flipclock.css">

    <script type="text/javascript" src="./js/jquery-1.6.4.min.js"></script>
    <script src="./js/libs/prefixfree.min.js"></script>
    <script type="text/javascript" src="./js/flipclock.min.js"></script>
    <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?34"></script>
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?115"></script>
    <?php wp_head(); ?>
    <script type="text/javascript">
        $(function () {

            var t1 = new Date("September 17, 2014 00:00:00");
            var t2 = new Date();
            var seconds = (t1.getTime() - t2.getTime()) / 1000;

            var Seconds_Between_Dates = Math.abs(seconds);

            var clock = $('.countdown').FlipClock(Seconds_Between_Dates, {
                clockFace: 'DailyCounter',
                countdown: true,
                showSeconds: false
            });


            function isEmailValid(email) {
                var pass = /^[a-z0-9._%+-]+@[a-z0-9._-]+\.[a-z]{2,6}$/i;
                if (!pass.test(email)) {
                    return false;
                }
                return true;
            }

            $('.types li').click(function () {
                var index = $(this).index();
                window.location = '/details.html?' + index;
                return false;
            })

            $('#header form').submit(function () {
                var email = $(this).find('.email');
                var loader = $(this).find('span');
                var val = email.val();

                if (!isEmailValid(val)) {
                    email.addClass('error');
                    email.focus();
                    return false;
                }
                email.removeClass('error');
                email.attr('disabled', true);
                loader.fadeIn(300);

                var data = {email: val};

                $.post('http://geekhub.ck.ua/notify.php', data, function () {
                    loader.fadeOut(300);
                    email.attr('disabled', false);
                    email.val('');
                    alert('Готово');
                });

                return false;
            });
        });
    </script>
</head>
<?php
if (is_front_page()) {
?>
<body>
<?php } else { ?>
<body class="inner">
<?php } ?>

<div id="wrap">
    <div id="header">
        <h1><a href="/">GeekHub</a></h1>
        <?php
        $main_menu = array('container' => '', 'menu_class' => '', 'items_wrap' => '<ul class="nav">%3$s</ul>');
        wp_nav_menu($main_menu);
        ?>
        <ul class="links">
            <li class="fb"><a href="http://www.facebook.com/pages/GeekHub/158983477520070">facebook</a></li>
            <li class="vk"><a href="http://vkontakte.ru/geekhub">Вконтакте</a></li>
            <li class="tw"><a href="http://twitter.com/#!/geek_hub">twitter</a></li>
            <li class="yb"><a href="http://www.youtube.com/user/GeekHubchannel">youtube</a></li>
        </ul>
        <span class="line"></span>
        <?php if (is_front_page()) { ?>
            <h4 class="registration">Реєстрацію на 4й сезон закрито</h4>
            <p class="note">*залиште нам ваш емейл і ми повідомимо вас про початок реєстрації</p>
            <form action="/register/">
                <fieldset>
                    <span></span>
                    <input type="text" class="email" placeholder="Ваш email"/>
                    <input type="submit" value="Відіслати"/>
                </fieldset>

            </form>
            <img src="/wp-content/uploads/2014/11/splash.png" alt="splash"/> <?php } ?>
    </div>
    <!-- header -->
