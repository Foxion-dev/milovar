<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;

Loc::loadMessages(__FILE__);
global $site_set;

if(CModule::IncludeModule("sale")){
    $cntBasketItems = CSaleBasket::GetList(
        array(),
        array(
            "FUSER_ID" => CSaleBasket::GetBasketUserID(),
            "LID" => SITE_ID,
            "ORDER_ID" => "NULL"
        ),
        array("ID", "QUANTITY", "PRICE")
    );

    $bascet_info = [
        'count' => 0,
        'price' => 0
    ];

    $cntBasketItems = $cntBasketItems->arResult;

    if(count($cntBasketItems) > 0){
        $bascet_info['count'] = count($cntBasketItems);

        foreach ($cntBasketItems as $prod){
            $bascet_info['price'] += (int)$prod["QUANTITY"] * (float)$prod["PRICE"];
        }

        $bascet_info['price'] = number_format($bascet_info['price'], 0, '.', " ");
    }
}


?>
<html>
    <head>
        <title><?$APPLICATION->ShowTitle()?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/fonts/MuseoSansCyrl/stylesheet.css");?>
        <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/libs.min.css");?>
        <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/" . $site_set->style_file . ".min.css");?>



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
                                    <li><a href="javascript:void(0);">Доставка и оплата</a></li>
                                    <li><a href="javascript:void(0);">Накопительные скидки</a></li>
                                    <li><a href="javascript:void(0);">Помощь</a></li>
                                    <li><a href="javascript:void(0);">Клиентам</a></li>
                                </ul>
                            </div>

                            <div class="phone-mobile">
                                <a class="phone-item" href="tel:<?= str_replace([" ", "-", "(", ")"], "", $site_set->site_phone) ?>">
                                    <span class="phone-item__ico"></span>
                                    <span class="phone-item__text"><?= $site_set->site_phone ?></span>
                                </a>
                            </div>

                            <div class="register">
                                <a href="entrance.html">Вход </a>/<a href="register.html">Регистрация</a>
                            </div>
                            <div class="search">
                                <form id="serch-form" action="/search/" method="get">
                                    <span class="search-form-ico"></span>
                                    <span class="search-form-ico-mobile"></span>
                                    <input type="hidden" name="tags" value="" />
                                    <input type="text" name="q" value="" size="40" placeholder="Поиск по сайту" />
                                    <input type="hidden" name="how" value="r" />
                                    <span class="search-form-close"></span>
                                </form>
                            </div>

                            <div class="nav-burger" role="navigation" id="navToggle">
                                <span class="nav-burger__bar nav-burger__bar-1"></span>
                                <span class="nav-burger__bar nav-burger__bar-2"></span>
                                <span class="nav-burger__bar nav-burger__bar-3"></span>
                            </div>
                        </div>
                        <div class="header-mobile-menu">
                            <div class="container">
                                <ul class="header-mobile-nav">
                                    <li class="mobile-register">
                                        <div class="register">
                                            <a href="entrance.html">Вход </a>/<a href="register.html">Регистрация</a>
                                        </div>
                                    </li>

                                    <li><a href="/catalog/">Каталог товаров</a></li>
                                    <li><a href="javascript:void(0);">Рецепты</a></li>
                                    <li><a href="javascript:void(0);">Статьи</a></li>
                                    <li><a href="javascript:void(0);">Новости</a></li>
                                    <li><a href="javascript:void(0);" class="red-label">Акции %</a></li>
                                    <li><a href="javascript:void(0);">Доставка и оплата</a></li>
                                    <li><a href="javascript:void(0);">Накопительные скидки</a></li>
                                    <li><a href="javascript:void(0);">Помощь</a></li>
                                    <li><a href="javascript:void(0);">Клиентам</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header__bottom">
                    <div class="container">
                        <div class="head-content-nav">
                            <div class="logo-block">
                                <a href="/" class="logo-block__link" >
                                    <img src="<?= $site_set->site_logo ?>" class="logo-block__img" alt="logo" />
                                </a>
                            </div>

                            <ul class="head-nav__list">
                                <li class="head-nav__item">
                                    <a class="head-nav__link" href="/catalog/">Каталог товаров</a>
                                </li>
                                <li class="head-nav__item">
                                    <a class="head-nav__link" href="javascript:void(0);">Рецепты</a>
                                </li>
                                <li class="head-nav__item">
                                    <a class="head-nav__link" href="javascript:void(0);">Статьи</a>
                                </li>
                                <li class="head-nav__item">
                                    <a class="head-nav__link" href="javascript:void(0);">Новости</a>
                                </li>
                                <li class="head-nav__item">
                                    <a class="head-nav__link red-label" href="javascript:void(0);">Акции %</a>
                                </li>
                            </ul>

                            <div class="phone-basket-block">
                                <a class="phone-item" href="tel:<?= str_replace([" ", "-", "(", ")"], "", $site_set->site_phone) ?>">
                                    <span class="phone-item__ico"></span>
                                    <span class="phone-item__text"><?= $site_set->site_phone ?></span>
                                </a>

                                <a class="basket-item" href="/personal/cart/">
                                    <span class="basket-item__ico">
                                        <span class="basket-item__col" id="header-count"><?= $bascet_info['count'] ?></span>
                                    </span>
                                    <span class="basket-item__text" id="header-cart"><?= $bascet_info['price'] ?> Р</span>
                                </a>

                                <div class="nav-burger" role="navigation" id="navToggle-mini">
                                    <span class="nav-burger__bar nav-burger__bar-1"></span>
                                    <span class="nav-burger__bar nav-burger__bar-2"></span>
                                    <span class="nav-burger__bar nav-burger__bar-3"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="main">
                <? if ($APPLICATION->GetCurPage(false) !== '/'): ?>
                    <div class="breadcrumbs">
                        <div class="container">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:breadcrumb",
                                "milovar",
                                array(
                                    "PATH" => "",
                                    "SITE_ID" => "s1",
                                    "START_FROM" => "0",
                                    "COMPONENT_TEMPLATE" => "milovar"
                                ),
                                false
                            );?>
                        </div>
                    </div>
                <? endif; ?>