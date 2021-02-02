<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");?>
<div class="container">

	<?$APPLICATION->IncludeComponent("bitrix:search.page", "milovar", Array(
	"RESTART" => "N",	// Искать без учета морфологии (при отсутствии результата поиска)
		"CHECK_DATES" => "Y",	// Искать только в активных по дате документах
		"arrWHERE" => array(
			0 => "iblock_xmlcatalog",
		),
		"arrFILTER" => array(	// Ограничение области поиска
			0 => "iblock_xmlcatalog",
		),
		"SHOW_WHERE" => "N",	// Показывать выпадающий список "Где искать"
		"PAGE_RESULT_COUNT" => "100",	// Количество результатов на странице
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"TAGS_SORT" => "NAME",
		"TAGS_PAGE_ELEMENTS" => "20",
		"TAGS_PERIOD" => "",
		"TAGS_URL_SEARCH" => "",
		"TAGS_INHERIT" => "Y",	// Сужать область поиска
		"SHOW_RATING" => "Y",	// Включить рейтинг
		"FONT_MAX" => "50",
		"FONT_MIN" => "10",
		"COLOR_NEW" => "000000",
		"COLOR_OLD" => "C8C8C8",
		"PERIOD_NEW_TAGS" => "",
		"SHOW_CHAIN" => "Y",
		"COLOR_TYPE" => "Y",
		"WIDTH" => "100%",
		"PATH_TO_USER_PROFILE" => "#SITE_DIR#people/user/#USER_ID#/",	// Шаблон пути к профилю пользователя
		"COMPONENT_TEMPLATE" => "clear",
		"NO_WORD_LOGIC" => "N",	// Отключить обработку слов как логических операторов
		"USE_TITLE_RANK" => "N",	// При ранжировании результата учитывать заголовки
		"DEFAULT_SORT" => "rank",	// Сортировка по умолчанию
		"FILTER_NAME" => "",	// Дополнительный фильтр
		"SHOW_WHEN" => "N",	// Показывать фильтр по датам
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
		"USE_SUGGEST" => "N",	// Показывать подсказку с поисковыми фразами
		"RATING_TYPE" => "",	// Вид кнопок рейтинга
		"DISPLAY_TOP_PAGER" => "Y",	// Выводить над результатами
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под результатами
		"PAGER_TITLE" => "Результаты поиска",	// Название результатов поиска
		"PAGER_SHOW_ALWAYS" => "Y",	// Выводить всегда
		"PAGER_TEMPLATE" => "",	// Название шаблона
		"SHOW_ITEM_TAGS" => "Y",	// Показывать теги документа
		"SHOW_ITEM_DATE_CHANGE" => "Y",	// Показывать дату изменения документа
		"SHOW_ORDER_BY" => "Y",	// Показывать сортировку
		"SHOW_TAGS_CLOUD" => "N",	// Показывать облако тегов
		"arrFILTER_iblock_xmlcatalog" => array(	// Искать в информационных блоках типа "iblock_xmlcatalog"
			0 => "28",
		)
	),
	false
);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>