<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

?>

<div class="search-container">

    <? if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])): ?>

        <div class="search-language-guess">
            <?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
        </div>
    <? endif; ?>

    <div class="search-result">

    <? if(count($arResult["SEARCH"])>0):?>

        <?foreach($arResult["SEARCH"] as $arItem):?>

            <div class="search-result__item">
                <div class="search-result__item-face">
                    <img src="<?= $arItem["IMG"] ?>" alt="<?= $arItem["TITLE"] ?>" class="search-result__item-img" />
                </div>

                <div class="search-result__item-info">
                    <div class="search-result__item-name">
                        <span><?= $arItem["TITLE"] ?></span>
                    </div>

                    <div class="search-result__item-counter">
                        <div class="search-result__item-price">
                            <span><?= number_format((float)$arItem["OFFERS"][0]["price"], 2, ".", " ") ?> Р</span>
                        </div>

                        <div  class="search-result__item-num">

                        </div>

                        <div class="search-result__item-but">
                            <button>В корзину</button>
                        </div>
                    </div>
                </div>


                <div class="search-result__item-offer">

                </div>
            </div>
        <?endforeach;?>
    <?else:?>
        <div class="serch-none">
            <span>По вашему запросу ничего не найдено</span>
        </div>
    <?endif;?>

    </div>
