<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
$APPLICATION->SetPageProperty("BODY_CLASS", "home");

?><section class="head-content-block">
<div class="container">
	<div class="head-title-block">
		<h1>Всё для <strong>мыловарения <br>
		 и косметики</strong> ручной работы</h1>
 <a href="/catalog" class="goto-catalog">Перейти в каталог</a>
	</div>
</div>
 </section> <section class="home-action">
<div class="container">
	<h2 class="action-main__title">Акции и скидки</h2>

    <?$APPLICATION->IncludeComponent("bitrix:catalog.section", "main-action", Array(
	"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
		"ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
		"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"BACKGROUND_IMAGE" => "-",	// Установить фоновую картинку для шаблона из свойства
		"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
		"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"COMPATIBLE_MODE" => "Y",	// Включить режим совместимости
		"COMPONENT_TEMPLATE" => "milovar",
		"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"DETAIL_URL" => "/catalog/element.php?ELEMENT_ID=#ELEMENT_ID#",	// URL, ведущий на страницу с содержимым элемента раздела
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",	// Не подключать js-библиотеки в компоненте
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
		"ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
		"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
		"ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
		"ENLARGE_PRODUCT" => "STRICT",	// Выделять товары в списке
		"FILTER_NAME" => "arrFilter",	// Имя массива со значениями фильтра для фильтрации элементов
		"HIDE_NOT_AVAILABLE" => "N",	// Недоступные товары
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",	// Недоступные торговые предложения
		"IBLOCK_ID" => "28",	// Инфоблок
		"IBLOCK_TYPE" => "xmlcatalog",	// Тип инфоблока
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"LABEL_PROP" => "",	// Свойства меток товара
		"LAZY_LOAD" => "N",	// Показать кнопку ленивой загрузки Lazy Load
		"LINE_ELEMENT_COUNT" => "3",	// Количество элементов выводимых в одной строке таблицы
		"LOAD_ON_SCROLL" => "N",	// Подгружать товары при прокрутке до конца
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
		"MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
		"MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
		"MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
		"MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
		"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
		"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
		"OFFERS_LIMIT" => "5",	// Максимальное количество предложений для показа (0 - все)
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => "milovar",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Товары",	// Название категорий
		"PAGE_ELEMENT_COUNT" => "18",	// Количество элементов на странице
		"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
		"PRICE_CODE" => array(	// Тип цены
			0 => "RETAIL",
		),
		"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",	// Порядок отображения блоков товара
		"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
		"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",	// Вариант отображения товаров
		"PRODUCT_SUBSCRIPTION" => "Y",	// Разрешить оповещения для отсутствующих товаров
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],	// Параметр ID продукта (для товарных рекомендаций)
		"RCM_TYPE" => "personal",	// Тип рекомендации
		"SECTION_CODE" => "",	// Код раздела
		"SECTION_ID" => "203",	// ID раздела
		"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
		"SECTION_URL" => "/catalog/section.php?SECTION_ID=#SECTION_ID#",	// URL, ведущий на страницу с содержимым раздела
		"SECTION_USER_FIELDS" => array(	// Свойства раздела
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SHOW_ALL_WO_SECTION" => "N",	// Показывать все элементы, если не указан раздел
		"SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
		"SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
		"SHOW_FROM_SECTION" => "N",	// Показывать товары из раздела
		"SHOW_MAX_QUANTITY" => "N",	// Показывать остаток товара
		"SHOW_OLD_PRICE" => "N",	// Показывать старую цену
		"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
		"SHOW_SLIDER" => "Y",	// Показывать слайдер для товаров
		"SLIDER_INTERVAL" => "3000",	// Интервал смены слайдов, мс
		"SLIDER_PROGRESS" => "N",	// Показывать полосу прогресса
		"TEMPLATE_THEME" => "blue",	// Цветовая тема
		"USE_ENHANCED_ECOMMERCE" => "N",	// Отправлять данные электронной торговли в Google и Яндекс
		"USE_MAIN_ELEMENT_SECTION" => "N",	// Использовать основной раздел для показа элемента
		"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
		"USE_PRODUCT_QUANTITY" => "Y",	// Разрешить указание количества товара
		"OFFERS_SORT_FIELD" => "sort",	// По какому полю сортируем предложения товара
		"OFFERS_SORT_ORDER" => "asc",	// Порядок сортировки предложений товара
		"OFFERS_SORT_FIELD2" => "id",	// Поле для второй сортировки предложений товара
		"OFFERS_SORT_ORDER2" => "desc",	// Порядок второй сортировки предложений товара
		"OFFERS_FIELD_CODE" => array(	// Поля предложений
			0 => "",
			1 => "FASOVKA",
			2 => "",
		),
		"PRODUCT_DISPLAY_MODE" => "N",	// Схема отображения
		"SEF_RULE" => "/catalog/#SECTION_CODE_PATH#/",	// Правило для обработки
		"SECTION_CODE_PATH" => $_REQUEST["SECTION_CODE_PATH"]
	),
	false
);?>
</div>
 </section> <section class="home-catalog">
<div class="container">
	<h2>Каталог продукции</h2>
	<div class="home-catalog-content">
		<div class="content-top">
 <a href="#" class="content-top-left">
			<h5>Скидки</h5>
			<p>
				 Самые приятные цены в нашем каталоге
			</p>
 <img alt="sale" src="/local/templates/milovar/images/home/catalog-sale.png"> </a> <a href="#" class="content-top-right">
			<h5>Новинки</h5>
			<p>
				 Самые приятные цены в нашем каталоге
			</p>
 <img alt="new" src="/local/templates/milovar/images/home/catalog-new.png"> </a>
		</div>
		<div class="content-bottom">
 <a href="#" class="content-bottom-item">
			<h6>Масла</h6>
 <img alt="item" src="/local/templates/milovar/images/home/catalog-image-item1.png"> </a> <a href="#" class="content-bottom-item">
			<h6>Праздники</h6>
 <img alt="item" src="/local/templates/milovar/images/home/catalog-image-item2.png"> </a> <a href="#" class="content-bottom-item">
			<h6>Мыльная основа</h6>
 <img alt="item" src="/local/templates/milovar/images/home/catalog-image-item3.png"> </a> <a href="#" class="content-bottom-item">
			<h6>Масла</h6>
 <img alt="item" src="/local/templates/milovar/images/home/catalog-image-item1.png"> </a> <a href="#" class="content-bottom-item">
			<h6>Мыльная основа</h6>
 <img alt="item" src="/local/templates/milovar/images/home/catalog-image-item3.png"> </a> <a href="#" class="content-bottom-item">
			<h6>Масла</h6>
 <img alt="item" src="/local/templates/milovar/images/home/catalog-image-item1.png"> </a> <a href="#" class="content-bottom-item">
			<h6>Праздники</h6>
 <img alt="item" src="/local/templates/milovar/images/home/catalog-image-item2.png"> </a> <a href="#" class="content-bottom-item">
			<h6>Мыльная основа</h6>
 <img alt="item" src="/local/templates/milovar/images/home/catalog-image-item3.png"> </a> <a href="#" class="content-bottom-item">
			<h6>Масла</h6>
 <img alt="item" src="/local/templates/milovar/images/home/catalog-image-item1.png"> </a> <a href="#" class="content-bottom-item">
			<h6>Праздники</h6>
 <img alt="item" src="/local/templates/milovar/images/home/catalog-image-item2.png"> </a> <a href="#" class="content-bottom-item">
			<h6>Мыльная основа</h6>
 <img alt="item" src="/local/templates/milovar/images/home/catalog-image-item3.png"> </a> <a href="#" class="content-bottom-item">
			<h6>Масла</h6>
 <img alt="item" src="/local/templates/milovar/images/home/catalog-image-item1.png"> </a>
		</div>
    <a href="/catalog" class="goto-catalog">Смотреть весь каталог</a>
	</div>
</div>
 </section> <section class="home-about">
<div class="container">
	<div class="about-content">
		<div class="about-content-left">
			<h2>О нашем магазине</h2>
			<p>
				 На нашем сайте вы найдете не только все для мыловарения, но и полезные статьи и рецепты, узнаете много интересного про составляющие мыла: эфирные и базовые масла, отдушки, различные добавки. Мы расскажем, как превратить обычную мыльную основу, беззапаха и цвета, в потрясающий подарок, в маленькое произведение искусства.<br>
 <br>
				 Люди, которые следят за состоянием своего тела, особенно оценят мыловарение и изготовление косметики в домашних условиях. Ведь вы можете добавлять не только перламутры, отдушки и разнообразные пигменты, но и полезные составляющие, оказывающие благотворное влияние на состояние кожи волоси ногтей.
			</p>
		</div>
		<div class="about-content-right">
 <img alt="surprise-box" src="/local/templates/milovar/images/home/about-image.png">
		</div>
	</div>
</div>
 </section> <section class="home-news">
<div class="container">
	<h2>Новости</h2>
	<div class="home-news-content">
		<div class="news-content-item">
 <a href="#"> <img alt="news" src="/local/templates/milovar/images/home/news-image.png"> <span class="datanews">18.08.2020</span>
			<h5>Вышел уже 21 выпуск марафона</h5>
 </a>
		</div>
		<div class="news-content-item">
 <a href="#"> <img alt="news" src="/local/templates/milovar/images/home/news-image.png"> <span class="datanews">18.08.2020</span>
			<h5>Новый рецепт - Свеча из вощины</h5>
 </a>
		</div>
		<div class="news-content-item">
 <a href="#"> <img alt="news" src="/local/templates/milovar/images/home/news-image.png"> <span class="datanews">18.08.2020</span>
			<h5>О нашем магазине</h5>
 </a>
		</div>
	</div>
</div>
 </section>


<section class="home-masterclass">

<div class="container">
	<div class="master-class-content">
		<h2>Наш мастер-класс</h2>
		<p>
			 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
		</p>
 <a href="#" class="goto-mc">Записаться</a>
	</div>
</div>
</section>


    <section class="home-action">
        <div class="container">
            <h2 class="action-main__title">Хиты продаж</h2>

            <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"main-action-bottom", 
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
		"COMPONENT_TEMPLATE" => "main-action-bottom",
		"CONVERT_CURRENCY" => "N",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"DETAIL_URL" => "/catalog/element.php?ELEMENT_ID=#ELEMENT_ID#",
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
		"SECTION_ID" => "203",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "/catalog/section.php?SECTION_ID=#SECTION_ID#",
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
    </section>
  <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>