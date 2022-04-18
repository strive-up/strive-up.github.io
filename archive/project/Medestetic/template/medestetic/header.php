<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?=LANG_CHARSET;?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
    <title><?$APPLICATION->ShowTitle()?></title>
    <!--    Include CSS File    -->
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/fonts/fonts.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/style.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/libs/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/libs/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/libs/modal/style.css">
    <? $APPLICATION->ShowHead(); ?>
</head>
<body>

    <div id="panel">
        <? $APPLICATION->ShowPanel(); ?>
    </div>

    <div class="wrapper">

        <!--    Header    -->
        <header class="header">
            
            <div class="header__container">

                <!--    Number    -->
                <a href="tel:+74993901115" class="header__number--mobile">
                    <img src="<?=SITE_TEMPLATE_PATH;?>/img/handset.svg" alt="">
                </a>

                <!--    LogoType    -->
                <div class="header__logo">
                    <a href="/"><?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_TEMPLATE_PATH . "/includes/header/logo.php"
                                )
                                );?></a>
                    <button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться на прием</button>
                </div>
                
                <!--    Navigation    -->
                <nav class="header__nav">

                    <div class="nav__contacts">
                        
                        <div class="contact__adress">
                            
                            <div class="adress__icon"><img src="<?=SITE_TEMPLATE_PATH;?>/img/marker.svg" alt=""></div>

                            <div class="adress__info">

                                <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_TEMPLATE_PATH . "/includes/header/adress.php"
                                )
                                );?>
                                <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_TEMPLATE_PATH . "/includes/header/work__schedule.php"
                                )
                                );?>
                                
                            </div>

                        </div>

                        <div class="contact__number__wrapper"></div>

                        <div class="contact__number">
                            <p><?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_TEMPLATE_PATH . "/includes/header/number1.php"
                                )
                            );?></p>
                        </div>

                        <div class="contact__number">
                            <p><?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_TEMPLATE_PATH . "/includes/header/number2.php"
                                )
                            );?></p>
                        </div>

                        

                        <div class="search__wrapper">

                            <div class="search__icons"><img src="<?=SITE_TEMPLATE_PATH;?>/img/search.svg" alt=""></div>
                            <input type="search" class="search__input search__input--anim">

                        </div>

                        <button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться на прием</button>

                    </div>

                    <div class="nav__menu">

                        <?$APPLICATION->IncludeComponent(
                            "bitrix:menu", 
                            "top_menu", 
                            array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "submenu",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "2",
                                "MENU_CACHE_GET_VARS" => array(
                                ),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_USE_GROUPS" => "N",
                                "ROOT_MENU_TYPE" => "menu",
                                "USE_EXT" => "N",
                                "COMPONENT_TEMPLATE" => "top_menu"
                            ),
                            false
                        );?>

                    </div>

                </nav>

                <nav class="header__nav--mobile">

                    <div class="burger__wrapper">
                        <span></span>
                    </div>

                    <div class="nav__content--mobile">

                        <div class="nav__content__wrapper">

                            <div class="contact__adress">
                            
                                <div class="adress__icon"><img src="<?=SITE_TEMPLATE_PATH;?>/img/marker.svg" alt=""></div>

                                <div class="adress__info">

                                    <p>Москва, Рублевское шоссе 24 к.1</p>
                                    <p>Без выходных: 11:00 - 21:00</p>
                                    
                                </div>

                            </div>

                            <div class="contact__number__wrapper--mob">

                                <div class="contact__number--mob">
                                    <p>8 (968) 030-63-72</p>
                                </div>

                                <div class="contact__number--mob">
                                    <p>8 (499) 390-11-15</p>
                                </div>

                            </div>

                            <div class="search__wrapper">

                                <div class="search__icons"><img src="<?=SITE_TEMPLATE_PATH;?>/img/search.svg" alt="" class="img-svg"></div>
                                <input type="search" class="search__input search__input--anim">

                            </div>

                            <div class="nav__menu">
                        
                                <ul class="menu__item menu__item--active">

                                    <a href="/">Услуги</a>

                                    <div class="menu__item__list">

                                        <a href="/" class="item__list">Лазерная эпиляция Candela</a>
                                        <a href="/" class="item__list item__list--active">Smas лифтинг Альтера</a>
                                        <a href="/" class="item__list">Smas лифтинг Doublo</a>
                                        <a href="/" class="item__list">SMAS лифтинг</a>
                                        <a href="/" class="item__list">Ulfit ультразвуковая липосакция</a>
                                        <a href="/" class="item__list">Игольчатый rf-лифтинг</a>
                                        <a href="/" class="item__list">Лазерная система Hyperion</a>

                                    </div>

                                </ul>

                                <ul class="menu__item">
                                    <a href="/">Цены</a>
                                </ul>

                                <ul class="menu__item">
                                    <a href="/">Врачи</a>
                                </ul>

                                <ul class="menu__item">
                                    <a href="/">Акции</a>
                                </ul>

                                <ul class="menu__item">
                                    <a href="/">О нас</a>
                                </ul>

                                <ul class="menu__item">
                                    <a href="/">Отзывы</a>
                                </ul>

                                <ul class="menu__item">
                                    <a href="/">Статьи</a>
                                </ul>

                                <ul class="menu__item">
                                    <a href="/">Контакты</a>
                                </ul>

                            </div>

                        </div>

                    </div>

                </nav>

            </div>    

        </header>