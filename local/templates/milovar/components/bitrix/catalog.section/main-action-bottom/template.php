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
    <?php foreach ($arResult['ITEMS'] as $key => $item): ?>

        <? if ($key < 2) continue; ?>
        <? if ($key > 4) continue; ?>

        <div class="catalog-product__item catalog-product__item--big js-prod-item">
            <div class="catalog-product__item-container">
                <div class="catalog-product__img">
                    <div class="catalog-product__label">
<!--                        <div class="catalog-product__label-new">-->
<!--                            <span>New</span>-->
<!--                        </div>-->

<!--                        <div class="catalog-product__label-sale">-->
<!--                            <span>5</span>-->
<!--                            <span>%</span>-->
<!--                        </div>-->
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

                            <? foreach($item['variacii'] as $num_of => $odin_offer): ?>

                                <? if($num_of == 3): ?>
                                    <div class="catalog-product__variation-hidden js-offers-hid">
                                <? endif; ?>

                                <div class="catalog-product__variation-item js-sel-product<?= $odin_offer['class'] ?>" data-big-data='<?= $odin_offer["big_data"] ?>'>
                                    <span class="catalog-product__variation-quest">
                                        <span class="catalog-product__variation-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                    </span>

                                    <span class="catalog-product__variation-title"><?= $odin_offer['value'] ?></span>
                                </div>

                                <? if(($num_of == count($item['variacii']) - 1) && (count($item['variacii']) > 3)): ?>
                                    </div>
                                    <div class="catalog-product__variation-toggle js-offers-toggle">
                                        <span class="catalog-product__variation-open">Показать ещё</span>
                                        <span class="catalog-product__variation-close">Скрыть</span>
                                    </div>
                                <? endif; ?>
                            <? endforeach; ?>
                        </div>
                    <? endif; ?>

                    <div class="catalog-product__card js-cart-counter">
                        <div class="catalog-product__card-price">
                            <span>
                                <span class="price-show js-cart-price"><?= $item['but_big_data']['price'] ?> Р</span>
                            </span>
                        </div>

                        <div class="catalog-product__card-but">
                            <div class="catalog-product__card-calc">
                                <button class="catalog-product__card-min js-card-minus"></button>
                                <input type="number" class="catalog-product__card-did js-card-count" name="prod_count" value="1" />
                                <button class="catalog-product__card-plus js-card-plus"></button>
                            </div>

                            <div class="catalog-product__card-buy">
                                <button type="button" data-link='<?= $item['but_big_data']['info'] ?>' class='catalog-product__card-boot js-add-basket'>В корзину</button>
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
