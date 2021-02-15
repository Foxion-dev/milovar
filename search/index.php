<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>

<div class="container">

    <div class="search-page__title">
        <h1>Поиск по запросу</h1>

        <? if(isset($_GET['q'])): ?>
            <span class="search-page__title-deli">:</span>
            <span class="search-page__title-text"><?= trim(strip_tags($_GET['q'])) ?></span>
        <? endif; ?>
    </div>

    <div class="search-full">
        <div class="search-full__category catalog-category">
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
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],
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

        <div class="search-full__block">

            <?$APPLICATION->IncludeComponent(
                "bitrix:search.page",
                "milovar",
                array(
                    "RESTART" => "N",
                    "CHECK_DATES" => "Y",
                    "arrWHERE" => array(
                        0 => "iblock_xmlcatalog",
                    ),
                    "arrFILTER" => array(
                        0 => "iblock_xmlcatalog",
                    ),
                    "SHOW_WHERE" => "N",
                    "PAGE_RESULT_COUNT" => "INF",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "3600",
                    "TAGS_SORT" => "NAME",
                    "TAGS_PAGE_ELEMENTS" => "20",
                    "TAGS_PERIOD" => "",
                    "TAGS_URL_SEARCH" => "",
                    "TAGS_INHERIT" => "Y",
                    "SHOW_RATING" => "Y",
                    "FONT_MAX" => "50",
                    "FONT_MIN" => "10",
                    "COLOR_NEW" => "000000",
                    "COLOR_OLD" => "C8C8C8",
                    "PERIOD_NEW_TAGS" => "",
                    "SHOW_CHAIN" => "Y",
                    "COLOR_TYPE" => "Y",
                    "WIDTH" => "100%",
                    "PATH_TO_USER_PROFILE" => "#SITE_DIR#people/user/#USER_ID#/",
                    "COMPONENT_TEMPLATE" => "milovar",
                    "NO_WORD_LOGIC" => "N",
                    "USE_TITLE_RANK" => "N",
                    "DEFAULT_SORT" => "rank",
                    "FILTER_NAME" => "",
                    "SHOW_WHEN" => "N",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "USE_LANGUAGE_GUESS" => "Y",
                    "USE_SUGGEST" => "N",
                    "RATING_TYPE" => "",
                    "DISPLAY_TOP_PAGER" => "Y",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "Результаты поиска",
                    "PAGER_SHOW_ALWAYS" => "Y",
                    "PAGER_TEMPLATE" => "",
                    "SHOW_ITEM_TAGS" => "Y",
                    "SHOW_ITEM_DATE_CHANGE" => "Y",
                    "SHOW_ORDER_BY" => "Y",
                    "SHOW_TAGS_CLOUD" => "N",
                    "arrFILTER_iblock_xmlcatalog" => array(
                        0 => "28",
                    )
                ),
                false
            );?>
        </div>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>