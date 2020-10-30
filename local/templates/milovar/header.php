<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
use Bitrix\Main\Page\Asset;

?>
<html>
<head>
    <title><?$APPLICATION->ShowTitle()?></title>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/libs.min.css");?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/main.min.css");?>

    <?CJSCore::Init(array('jquery3'));?>
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/libs.min.js');?>
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/main.min.js');?>

    <?$APPLICATION->ShowHead();?>
</head>
<body>
<?$APPLICATION->ShowPanel()?>

<div id="wrapper">
    <header>
        <div class="container">
            <div class="header-block">
                <div class="adress">
                    <p><img src="assets/images/pin.png" alt="pin"> <!-- Поменять на флатикон -->
                        Москва ул.Вавилова, 9Ас2<i class="flaticon-drop-down-arrow"></i></p>
                </div>
                <div class="nav-items">
                    <ul class="header-nav">
                        <li><a href="#">Доставка и оплата</a></li>
                        <li><a href="#">Накопительные скидки</a></li>
                        <li><a href="help-page.html">Помощь</a></li>
                    </ul>
                    <div class="navBurger" role="navigation" id="navToggle"></div>
                </div>
                <div class="register">
                    <a href="entrance.html">Вход </a>/<a href="register.html">Регистрация</a>
                </div>
                <div class="search">
                    <i class="flaticon-magnifying-glass"></i>
                    <input type="text" placeholder="Поиск">
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
    </header>

    <main>

