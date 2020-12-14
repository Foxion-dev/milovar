<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 */

?>
<div class="catalog-product__list js-load-prod">
    <?php foreach ($arResult['ITEMS'] as $item): ?>

        <div class="catalog-product__item">
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

                <div class="catalog-product__variation">
                    <div class="catalog-product__variation-list">

                    </div>
                </div>

                <div class="catalog-product__card">
                    <div class="catalog-product__card-price">
                        <span><?= number_format($item["CATALOG_PURCHASING_PRICE"], 0, "", " ") ?> Р</span>
                    </div>

                    <div class="catalog-product__card-but">
                        <div class="catalog-product__card-calc">
                            <button class="catalog-product__card-min js-card-min"></button>
                            <input type="text" class="catalog-product__card-did" name="prod_count" data-max-count="10" value="1" />
                            <button class="catalog-product__card-plus js-card-plus"></button>
                        </div>

                        <div class="catalog-product__card-buy">
                            <button type="button" class="catalog-product__card-boot">В корзину</button>
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
