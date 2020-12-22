<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?>
<div class="container">
    <?$APPLICATION->IncludeComponent("bitrix:sale.order.ajax", "milovar", Array(
        "PAY_FROM_ACCOUNT" => "Y",	// Разрешить оплату с внутреннего счета
            "COUNT_DELIVERY_TAX" => "Y",	// Рассчитывать налог для доставки
            "COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
            "ONLY_FULL_PAY_FROM_ACCOUNT" => "N",	// Разрешить оплату с внутреннего счета только в полном объеме
            "ALLOW_AUTO_REGISTER" => "N",	// Оформлять заказ с автоматической регистрацией пользователя
            "SEND_NEW_USER_NOTIFY" => "Y",	// Отправлять пользователю письмо, что он зарегистрирован на сайте
            "PATH_TO_BASKET" => "/personal/cart/",	// Путь к странице корзины
            "PATH_TO_PERSONAL" => "/personal/order/",	// Путь к странице персонального раздела
            "PATH_TO_PAYMENT" => "/personal/order/payment/",	// Страница подключения платежной системы
            "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
            "DELIVERY_NO_SESSION" => "Y",	// Проверять сессию при оформлении заказа
            "COMPONENT_TEMPLATE" => ".default",
            "ALLOW_APPEND_ORDER" => "Y",	// Разрешить оформлять заказ на существующего пользователя
            "DELIVERY_NO_AJAX" => "N",	// Когда рассчитывать доставки с внешними системами расчета
            "SHOW_NOT_CALCULATED_DELIVERIES" => "L",	// Отображение доставок с ошибками расчета
            "TEMPLATE_LOCATION" => "popup",	// Визуальный вид контрола выбора местоположений
            "SPOT_LOCATION_BY_GEOIP" => "Y",	// Определять местоположение покупателя по IP-адресу
            "DELIVERY_TO_PAYSYSTEM" => "d2p",	// Последовательность оформления
            "SHOW_VAT_PRICE" => "Y",	// Отображать значение НДС
            "USE_PREPAYMENT" => "N",	// Использовать предавторизацию для оформления заказа (PayPal Express Checkout)
            "COMPATIBLE_MODE" => "Y",	// Режим совместимости для предыдущего шаблона
            "USE_PRELOAD" => "Y",	// Автозаполнение оплаты и доставки по предыдущему заказу
            "ALLOW_USER_PROFILES" => "N",	// Разрешить использование профилей покупателей
            "ALLOW_NEW_PROFILE" => "N",	// Разрешить множество профилей покупателей
            "TEMPLATE_THEME" => "blue",	// Цветовая тема
            "SHOW_ORDER_BUTTON" => "final_step",	// Отображать кнопку оформления заказа (для неавторизованных пользователей)
            "SHOW_TOTAL_ORDER_BUTTON" => "N",	// Отображать дополнительную кнопку оформления заказа
            "SHOW_PAY_SYSTEM_LIST_NAMES" => "Y",	// Отображать названия в списке платежных систем
            "SHOW_PAY_SYSTEM_INFO_NAME" => "Y",	// Отображать название в блоке информации по платежной системе
            "SHOW_DELIVERY_LIST_NAMES" => "Y",	// Отображать названия в списке доставок
            "SHOW_DELIVERY_INFO_NAME" => "Y",	// Отображать название в блоке информации по доставке
            "SHOW_DELIVERY_PARENT_NAMES" => "Y",	// Показывать название родительской доставки
            "SHOW_STORES_IMAGES" => "Y",	// Показывать изображения складов в окне выбора пункта выдачи
            "SKIP_USELESS_BLOCK" => "Y",	// Пропускать шаги, в которых один элемент для выбора
            "BASKET_POSITION" => "after",	// Расположение списка товаров
            "SHOW_BASKET_HEADERS" => "N",	// Показывать заголовки колонок списка товаров
            "DELIVERY_FADE_EXTRA_SERVICES" => "N",	// Дополнительные услуги, которые будут показаны в пройденном (свернутом) блоке
            "SHOW_NEAREST_PICKUP" => "N",	// Показывать ближайшие пункты самовывоза
            "DELIVERIES_PER_PAGE" => "9",	// Количество доставок на странице
            "PAY_SYSTEMS_PER_PAGE" => "9",	// Количество платежных систем на странице
            "PICKUPS_PER_PAGE" => "5",	// Количество пунктов самовывоза на странице
            "SHOW_PICKUP_MAP" => "Y",	// Показывать карту для доставок с самовывозом
            "SHOW_MAP_IN_PROPS" => "N",	// Показывать карту в блоке свойств заказа
            "PICKUP_MAP_TYPE" => "yandex",	// Тип используемых карт
            "SHOW_COUPONS" => "Y",	// Отображать поля ввода купонов
            "SHOW_COUPONS_BASKET" => "Y",	// Показывать поле ввода купонов в блоке списка товаров
            "SHOW_COUPONS_DELIVERY" => "Y",	// Показывать поле ввода купонов в блоке доставки
            "SHOW_COUPONS_PAY_SYSTEM" => "Y",	// Показывать поле ввода купонов в блоке оплаты
            "PROPS_FADE_LIST_1" => "",	// Свойства заказа, которые будут показаны в пройденном (свернутом) блоке (Физическое лицо)[s1]
            "PROPS_FADE_LIST_2" => "",	// Свойства заказа, которые будут показаны в пройденном (свернутом) блоке (Юридическое лицо)[s1]
            "USER_CONSENT" => "N",	// Запрашивать согласие
            "USER_CONSENT_ID" => "0",	// Соглашение
            "USER_CONSENT_IS_CHECKED" => "Y",	// Галка по умолчанию проставлена
            "USER_CONSENT_IS_LOADED" => "N",	// Загружать текст сразу
            "ACTION_VARIABLE" => "soa-action",	// Название переменной, в которой передается действие
            "PATH_TO_AUTH" => "/auth/",	// Путь к странице авторизации
            "DISABLE_BASKET_REDIRECT" => "N",	// Оставаться на странице оформления заказа, если список товаров пуст
            "EMPTY_BASKET_HINT_PATH" => "/",	// Путь к странице для продолжения покупок
            "USE_PHONE_NORMALIZATION" => "Y",	// Использовать нормализацию номера телефона
            "PRODUCT_COLUMNS_VISIBLE" => array(	// Выбранные колонки таблицы списка товаров
                0 => "PREVIEW_PICTURE",
                1 => "PROPS",
            ),
            "ADDITIONAL_PICT_PROP_6" => "-",	// Дополнительная картинка [Книги]
            "ADDITIONAL_PICT_PROP_15" => "-",	// Дополнительная картинка [Продажа подписки на доступ к платным статьям]
            "ADDITIONAL_PICT_PROP_28" => "-",	// Дополнительная картинка [Основной каталог товаров]
            "ADDITIONAL_PICT_PROP_29" => "-",	// Дополнительная картинка [Пакет предложений (Основной каталог товаров)]
            "BASKET_IMAGES_SCALING" => "adaptive",	// Режим отображения изображений товаров
            "SERVICES_IMAGES_SCALING" => "adaptive",	// Режим отображения вспомагательных изображений
            "PRODUCT_COLUMNS_HIDDEN" => "",	// Свойства товаров отображаемые в свернутом виде в списке товаров
            "HIDE_ORDER_DESCRIPTION" => "N",	// Скрыть поле комментариев к заказу
            "USE_YM_GOALS" => "N",	// Использовать цели счетчика Яндекс.Метрики
            "USE_ENHANCED_ECOMMERCE" => "N",	// Отправлять данные электронной торговли в Google и Яндекс
            "USE_CUSTOM_MAIN_MESSAGES" => "N",	// Заменить стандартные фразы на свои
            "USE_CUSTOM_ADDITIONAL_MESSAGES" => "N",	// Заменить стандартные фразы на свои
            "USE_CUSTOM_ERROR_MESSAGES" => "N",	// Заменить стандартные фразы на свои
        ),
        false
    );?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>