<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог товаров");

?><section class="milovar-catalog">
<div class="container">
	<div class="milivar-catalog-title">
		<h1><?$APPLICATION->ShowTitle(false);?></h1>
 <span class="milivar-catalog-title-colvo">(<?= $APPLICATION->ShowProperty("count_prod") ?>)</span>
		<div class="view-catalog">
			<div class="view-catalog__title">
				 Вид каталога
			</div>
			<div class="sort-view">
 <a href="javascript:void(0);" class="sort-view__link sort-view__link-tab is-select"></a> <a href="javascript:void(0);" class="sort-view__link sort-view__link-pli"></a> <a href="javascript:void(0);" class="sort-view__link sort-view__link-gor"></a>
			</div>
		</div>
	</div>
	<div class="catalog-full">
		<div class="catalog-category">
            <div class="mobile-button">
                <span class="cat-open">Меню<br />каталога</span>
                <span class="cat-close"></span>
            </div>

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
							"COMPONENT_TEMPLATE" => "milovar",
							"COUNT_ELEMENTS" => "Y",
							"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
							"FILTER_NAME" => "sectionsFilter",
							"IBLOCK_ID" => "28",
							"IBLOCK_TYPE" => "xmlcatalog",
							"SECTION_CODE" => "",
							"SECTION_FIELDS" => array(
								0 => "",
								1 => "",
							),
							"SECTION_ID" => "",
							"SECTION_URL" => "/catalog/section.php?SECTION_ID=#SECTION_ID#",
							"SECTION_USER_FIELDS" => array(
								0 => "",
								1 => "UF_BROWSER_TITLE",
								2 => "",
							),
							"SHOW_PARENT_NAME" => "Y",
							"TOP_DEPTH" => "4",
							"VIEW_MODE" => "LINE"
						),
						false
					);?>
			</div>
		</div>
		<div class="catalog-product-block">
			<div class="catalog-product__filters">
                <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.smart.filter", 
	"milovar", 
	array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CONVERT_CURRENCY" => "N",
		"DISPLAY_ELEMENT_COUNT" => "Y",
		"FILTER_NAME" => "arrFilter",
		"FILTER_VIEW_MODE" => "vertical",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "28",
		"IBLOCK_TYPE" => "xmlcatalog",
		"PAGER_PARAMS_NAME" => "arrPager",
		"POPUP_POSITION" => "left",
		"PREFILTER_NAME" => "smartPreFilter",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"SAVE_IN_SESSION" => "N",
		"SECTION_CODE" => "",
		"SECTION_DESCRIPTION" => "-",
		"SECTION_ID" => "",
		"SECTION_TITLE" => "-",
		"SEF_MODE" => "N",
		"TEMPLATE_THEME" => "blue",
		"XML_EXPORT" => "N",
		"COMPONENT_TEMPLATE" => "milovar",
		"SEF_RULE" => "/catalog/#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
		"SECTION_CODE_PATH" => $_REQUEST["SECTION_CODE_PATH"],
		"SMART_FILTER_PATH" => $_REQUEST["SMART_FILTER_PATH"]
	),
	false
);?>
			</div>

				 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"milovar", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "Y",
		"COMPONENT_TEMPLATE" => "milovar",
		"CONVERT_CURRENCY" => "N",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"DETAIL_URL" => "element.php?ELEMENT_ID=#ELEMENT_ID#",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "arrFilter",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "28",
		"IBLOCK_TYPE" => "xmlcatalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => array(
		),
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "3",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "milovar",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "18",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "RETAIL",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => "",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "section.php?SECTION_ID=#SECTION_ID#",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "Y",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "FASOVKA",
			2 => "",
		),
		"PRODUCT_DISPLAY_MODE" => "N",
		"SEF_RULE" => "/catalog/#SECTION_CODE_PATH#/",
		"SECTION_CODE_PATH" => $_REQUEST["SECTION_CODE_PATH"]
	),
	false
);?>

		</div>
	</div>
</div>
 </section>


    <div class="catalog-seo-block">
        <div class="container">
            <h2>Деревянные формы</h2>
            <p>Это самый классический вариант при изготовлении мыла с нуля. Их единственным недостатком является то, что потребуется потратить некоторое время на то, чтобы проложить форму бумагой, но даже в этом случае можно «схитрить» и приобрести вкладыш удобного размера, который подходит не только к «родному» пластиковому коробу, но и к большинству форм из дерева.</p>

            <h2>Преимущества деревянных форм для мыла</h2>

            <ul>
                <li>За счет жестких стенок кусочки получаются с ровными гранями, в отличие от мыла из силиконовых форм, для которых необходимо
                    дополнительно покупать или делать деревянную опалубку</li>
                <li>Дерево прекрасно проводит тепло, а значит мыло с нуля пройдет гель даже при не самых удачных условиях</li>
                <li>Все формы легко разбираются, что удобно для хранения, а также позволяет без проблем вытаскивать мыло и мыть саму форму</li>
            </ul>
        </div>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>