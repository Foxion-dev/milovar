<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог товаров");


?>

<section class="milovar-catalog">
    <div class="container">
        <div class="milivar-catalog-title">
            <h1><?$APPLICATION->ShowTitle(false);?></h1>
            <span class="milivar-catalog-title-colvo">(0)</span>

            <div class="view-catalog">
                <div class="view-catalog__title">
                    <span>Вид каталога</span>
                </div>

                <div class="sort-view">
                    <a href="javascript:void(0);" class="sort-view__link sort-view__link-tab is-select"></a>
                    <a href="javascript:void(0);" class="sort-view__link sort-view__link-pli"></a>
                    <a href="javascript:void(0);" class="sort-view__link sort-view__link-gor"></a>
                </div>
            </div>
        </div>

        <div class="catalog-full">
            <div class="catalog-category">
                <div class="catalog-category__title">
                    <span>Категории</span>
                </div>

                <div class="catalog-category__block">
                    <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"milovar", 
	array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"IBLOCK_ID" => "8",
		"IBLOCK_TYPE" => "xmlcatalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "UF_BROWSER_TITLE",
			1 => "",
		),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "4",
		"VIEW_MODE" => "LINE",
		"COMPONENT_TEMPLATE" => "milovar"
	),
	false
);?>
                </div>
            </div>
        </div>
    </div>
</section>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>