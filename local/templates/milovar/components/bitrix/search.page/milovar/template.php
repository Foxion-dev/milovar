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

            <div class="search-result__item js-prod-item">
                <div class="search-result__item-face">
                    <img src="<?= $arItem["IMG"] ?>" alt="<?= $arItem["TITLE"] ?>" class="search-result__item-img" />
                </div>

                <div class="search-result__item-info">
                    <div class="search-result__item-name">
                        <span><?= $arItem["TITLE"] ?></span>
                    </div>

                    <div class="search-result__item-counter js-cart-counter">
                        <div class="search-result__item-price">
                            <span class="js-cart-price"><?= number_format((float)$arItem["OFFERS"][0]["price"], 2, ".", " ") ?> Р</span>
                        </div>

                        <div  class="search-result__item-num">
                            <button class="catalog-product__card-min js-card-minus"></button>
                            <input type="number" class="catalog-product__card-did js-card-count" name="prod_count" value="1">
                            <button class="catalog-product__card-plus js-card-plus"></button>
                        </div>

                        <div>
                            <button  class="search-result__item-but js-add-basket" data-link='<?= $arItem["OFFERS"][0]["big_data"] ?>'>В корзину</button>
                        </div>
                    </div>
                </div>


                <div class="search-result__item-offer">

                    <div class="catalog-product__variation js-variation">
                        <div class="catalog-product__variation-subtitle">
                            <span>Фасовка:</span>
                        </div>

                        <div class="catalog-product__variation-list">
                            <? foreach ($arItem['OFFERS'] as $off_key => $off_val): ?>
                            <? $class_check = $off_key == 0 ? " is-chek" : "" ?>

                                <div class="catalog-product__variation-item js-sel-product<?= $class_check ?>" data-big-data='<?= $off_val["big_data"] ?>'>
                                    <span class="catalog-product__variation-quest">
                                            <span class="catalog-product__variation-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                    </span>
                                    <span class="catalog-product__variation-title"><?= $off_val["ves"] ?></span>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?endforeach;?>
    <?else:?>
        <div class="serch-none">
            <span>По вашему запросу ничего не найдено</span>
        </div>
    <?endif;?>

    </div>
