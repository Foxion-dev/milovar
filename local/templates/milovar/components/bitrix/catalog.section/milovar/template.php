<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;
use Bitrix\Sale;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 */
//$basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());
//
//echo "<pre>",var_dump($basket),"</pre>";
?>
<div class="catalog-product__list js-load-prod">
    <?php foreach ($arResult['ITEMS'] as $item): ?>
        <? $price_min = 0; ?>

        <div class="catalog-product__item js-prod-item">
            <div class="catalog-product__item-container">
                <div class="catalog-product__img">
                    <div class="catalog-product__label">
<!--                        <div class="catalog-product__label-new">-->
<!--                            <span>New</span>-->
<!--                        </div>-->

    <!--                    <div class="catalog-product__label-sale">-->
    <!--                        <span>5</span>-->
    <!--                        <span>%</span>-->
    <!--                    </div>-->
                    </div>

                    <div class="catalog-product__img-container">
                        <a href="<?= $item["DETAIL_PAGE_URL"] ?>" class="catalog-product__img-link">
                            <img src="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>" alt="" />
                        </a>
                    </div>
                </div>

                <div class="catalog-product__title">
                    <a href="<?= $item["DETAIL_PAGE_URL"] ?>" class="catalog-product__title-link">
                        <h3 class="catalog-product__title-name"><?= $item["NAME"] ?></h3>
                    </a>
                </div>

                <div class="catalog-product__variation js-variation">

                    <? if(count($item["OFFERS"]) > 0): ?>
                        <div class="catalog-product__variation-subtitle">
                            <span>Фасовка:</span>
                        </div>

                        <div class="catalog-product__variation-list">

                            <? foreach($item["OFFERS"] as $num_of => $odin_offer): ?>
                                <? $id_prop = array_search("Фасовка", $odin_offer["PROPERTIES"]["CML2_ATTRIBUTES"]["DESCRIPTION"]); ?>
                                <? $prop_val = $odin_offer["PROPERTIES"]["CML2_ATTRIBUTES"]["VALUE"][$id_prop]; ?>
                                <? $basket_link = base64_encode($odin_offer["ADD_URL"]) ?>
                                <? $price_id = $odin_offer["PRICES"]["RETAIL"]["PRICE_ID"]; ?>
                                <? $price = $odin_offer["CATALOG_PRICE_" . $price_id] ?>
                                <? $class_active = $num_of == 0 ? " is-chek" : "" ?>

                                <? if($num_of == 0){ $price_start = $price; $data_link = $basket_link; } ?>

                                <? if($num_of == 2): ?>
                                    <div class="catalog-product__variation-hidden js-offers-hid">
                                <? endif; ?>

                                <div class="catalog-product__variation-item js-sel-product<?= $class_active ?>" data-big-data='<?= json_encode(compact('price', 'basket_link')) ?>'>
                                    <span class="catalog-product__variation-title"><?= $prop_val ?></span>
                                </div>

                                <? if(($num_of == count($item["OFFERS"]) - 1) && (count($item["OFFERS"]) > 2)): ?>
                                    </div>
                                    <div class="catalog-product__variation-toggle js-offers-toggle">
                                        <span class="catalog-product__variation-open">Показать ещё</span>
                                        <span class="catalog-product__variation-close">Скрыть</span>
                                    </div>
                                <? endif; ?>
                            <? endforeach; ?>
                        </div>
                    <? endif; ?>

                    <div class="catalog-product__card">
                        <div class="catalog-product__card-price">
                            <span>
                                <span class="price-show"><?= number_format($price_start, 0, "", " ") ?></span>
                                <span> Р</span>
                            </span>
                        </div>

                        <div class="catalog-product__card-but">
                            <div class="catalog-product__card-calc">
                                <button class="catalog-product__card-min js-card-min"></button>
                                <input type="text" class="catalog-product__card-did" name="prod_count" data-max-count="10" value="1" />
                                <button class="catalog-product__card-plus js-card-plus"></button>
                            </div>

                            <div class="catalog-product__card-buy">
                                <button type="button" data-link='<?= $data_link ?>' class='catalog-product__card-boot js-add-basket'>В корзину</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <div class="js-load-paging">
        <?= $arResult["NAV_STRING"] ?>
    </div>
<?endif;?>
