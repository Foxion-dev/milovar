<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;

Loc::loadMessages(__FILE__);
global $site_set;

?>
<html>
    <head>
        <title><?$APPLICATION->ShowTitle()?></title>

        <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/fonts/MuseoSansCyrl/stylesheet.css");?>
        <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/libs.min.css");?>
        <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/main.min.css");?>

        <?CJSCore::Init(array('jquery3'));?>
        <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/libs.min.js');?>
        <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/main.min.js');?>

        <?$APPLICATION->ShowHead();?>
    </head>
    <body class="<?$APPLICATION->ShowProperty("BODY_CLASS")?>">
        <?$APPLICATION->ShowPanel()?>

        <div id="wrapper">
            <header class="header">
                <div class="header__top">
                    <div class="container">
                        <div class="header-block">
                            <div class="adress">
                                <span class="adress__ico"></span>
                                <span class="adress__title">Наши адреса</span>

                                <div class="adress__list" style="display:none">

                                    <?foreach($site_set->our_addres as $adress):?>
                                        <div class="adress__item">
                                            <span><?= $adress ?></span>
                                        </div>
                                    <?endforeach;?>
                                </div>
                            </div>
                            <div class="nav-items">
                                <ul class="header-nav">
                                    <li><a href="#">Доставка и оплата</a></li>
                                    <li><a href="#">Накопительные скидки</a></li>
                                    <li><a href="help-page.html">Помощь</a></li>
                                    <li><a href="#">Клиентам</a></li>
                                </ul>
                                <div class="navBurger" role="navigation" id="navToggle"></div>
                            </div>
                            <div class="register">
                                <a href="entrance.html">Вход </a>/<a href="register.html">Регистрация</a>
                            </div>
                            <div class="search">
                                <form id="serch-form">
                                    <input type="text" name="search-phrase" placeholder="Поиск по сайту" />
                                </form>
                            </div>
                        </div>
                        <div class="header-mobile-menu">
                            <div class="container">
                                <ul class="header-mobile-nav">
                                    <li><a href="catalog.html">Каталог товаров</a></li>
                                    <li><a href="recipes.html">Рецепты</a></li>
                                    <li><a href="#">Статьи</a></li>
                                    <li><a href="news.html">Новости</a></li>
                                    <li><a href="#">Доставка и оплата</a></li>
                                    <li><a href="#">Накопительные скидки</a></li>
                                    <li><a href="#">Помощь</a></li>
                                    <li><p><a href="#">Москва ул.Вавилова, 9Ас2<i class="flaticon-drop-down-arrow"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header__bottom">
                    <div class="container">
                        <div class="head-content-nav">
                            <div class="logo-block">
                                <a href="/"><img src="<?= $site_set->site_logo ?>" alt="logo"></a>
                            </div>

                            <ul class="head-nav__list">
                                <li class="head-nav__item">
                                    <a class="head-nav__link" href="#">Каталог товаров</a>
                                </li>
                                <li class="head-nav__item">
                                    <a class="head-nav__link" href="#">Рецепты</a>
                                </li>
                                <li class="head-nav__item">
                                    <a class="head-nav__link" href="#">Статьи</a>
                                </li>
                                <li class="head-nav__item">
                                    <a class="head-nav__link" href="#">Новости</a>
                                </li>
                                <li class="head-nav__item">
                                    <a class="head-nav__link red-label" href="#">Акции %</a>
                                </li>
                            </ul>
                            <div class="phone-basket-block">
                                <a class="phone-item" href="tel:<?= str_replace([" ", "-", "(", ")"], "", $site_set->site_phone) ?>">
                                    <span class="phone-item__ico"></span>
                                    <span class="phone-item__text"><?= $site_set->site_phone ?></span>
                                </a>

                                <a class="basket-item" href="#">
                                    <span class="basket-item__ico">
                                        <span class="basket-item__col">0</span>
                                    </span>
                                    <span class="basket-item__text">0 Р</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="main">
                