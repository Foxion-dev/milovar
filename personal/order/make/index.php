<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?>
<div class="container">
    <div class="market-order__box">
        <h1 class="market-order__title">Оформление заказа</h1>

        <div class="market-order__body">
                <?$APPLICATION->IncludeComponent(
	"bitrix:sale.order.ajax", 
	"milovar", 
	array(
		"PAY_FROM_ACCOUNT" => "Y",
		"COUNT_DELIVERY_TAX" => "Y",
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
		"ALLOW_AUTO_REGISTER" => "Y",
		"SEND_NEW_USER_NOTIFY" => "Y",
		"PATH_TO_BASKET" => "/personal/cart/",
		"PATH_TO_PERSONAL" => "/personal/order/",
		"PATH_TO_PAYMENT" => "/personal/order/payment/",
		"SET_TITLE" => "Y",
		"DELIVERY_NO_SESSION" => "Y",
		"COMPONENT_TEMPLATE" => "milovar",
		"ALLOW_APPEND_ORDER" => "Y",
		"DELIVERY_NO_AJAX" => "N",
		"SHOW_NOT_CALCULATED_DELIVERIES" => "L",
		"TEMPLATE_LOCATION" => "popup",
		"SPOT_LOCATION_BY_GEOIP" => "Y",
		"DELIVERY_TO_PAYSYSTEM" => "d2p",
		"SHOW_VAT_PRICE" => "Y",
		"USE_PREPAYMENT" => "N",
		"COMPATIBLE_MODE" => "Y",
		"USE_PRELOAD" => "Y",
		"ALLOW_USER_PROFILES" => "N",
		"ALLOW_NEW_PROFILE" => "N",
		"TEMPLATE_THEME" => "blue",
		"SHOW_ORDER_BUTTON" => "final_step",
		"SHOW_TOTAL_ORDER_BUTTON" => "N",
		"SHOW_PAY_SYSTEM_LIST_NAMES" => "Y",
		"SHOW_PAY_SYSTEM_INFO_NAME" => "Y",
		"SHOW_DELIVERY_LIST_NAMES" => "Y",
		"SHOW_DELIVERY_INFO_NAME" => "Y",
		"SHOW_DELIVERY_PARENT_NAMES" => "Y",
		"SHOW_STORES_IMAGES" => "Y",
		"SKIP_USELESS_BLOCK" => "Y",
		"BASKET_POSITION" => "after",
		"SHOW_BASKET_HEADERS" => "N",
		"DELIVERY_FADE_EXTRA_SERVICES" => "N",
		"SHOW_NEAREST_PICKUP" => "N",
		"DELIVERIES_PER_PAGE" => "9",
		"PAY_SYSTEMS_PER_PAGE" => "9",
		"PICKUPS_PER_PAGE" => "5",
		"SHOW_PICKUP_MAP" => "Y",
		"SHOW_MAP_IN_PROPS" => "N",
		"PICKUP_MAP_TYPE" => "yandex",
		"SHOW_COUPONS" => "Y",
		"SHOW_COUPONS_BASKET" => "Y",
		"SHOW_COUPONS_DELIVERY" => "Y",
		"SHOW_COUPONS_PAY_SYSTEM" => "Y",
		"PROPS_FADE_LIST_1" => array(
		),
		"PROPS_FADE_LIST_2" => array(
		),
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"ACTION_VARIABLE" => "soa-action",
		"PATH_TO_AUTH" => "/auth/",
		"DISABLE_BASKET_REDIRECT" => "N",
		"EMPTY_BASKET_HINT_PATH" => "/",
		"USE_PHONE_NORMALIZATION" => "Y",
		"PRODUCT_COLUMNS_VISIBLE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "PROPS",
		),
		"ADDITIONAL_PICT_PROP_6" => "-",
		"ADDITIONAL_PICT_PROP_15" => "-",
		"ADDITIONAL_PICT_PROP_28" => "-",
		"ADDITIONAL_PICT_PROP_29" => "-",
		"BASKET_IMAGES_SCALING" => "adaptive",
		"SERVICES_IMAGES_SCALING" => "adaptive",
		"PRODUCT_COLUMNS_HIDDEN" => array(
		),
		"HIDE_ORDER_DESCRIPTION" => "N",
		"USE_YM_GOALS" => "N",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_CUSTOM_MAIN_MESSAGES" => "Y",
		"USE_CUSTOM_ADDITIONAL_MESSAGES" => "N",
		"USE_CUSTOM_ERROR_MESSAGES" => "N",
		"MESS_AUTH_BLOCK_NAME" => "Авторизация",
		"MESS_REG_BLOCK_NAME" => "Регистрация",
		"MESS_BASKET_BLOCK_NAME" => "Товары в заказе",
		"MESS_COUNTRY_BLOCK_NAME" => "1 шаг: Выберите страну",
		"MESS_REGION_BLOCK_NAME" => "Выберите город",
		"MESS_PAYMENT_BLOCK_NAME" => "Оплата",
		"MESS_DELIVERY_BLOCK_NAME" => "Доставка",
		"MESS_BUYER_BLOCK_NAME" => "Покупатель",
		"MESS_BACK" => "Назад",
		"MESS_FURTHER" => "Далее",
		"MESS_EDIT" => "изменить",
		"MESS_ORDER" => "Оформить заказ",
		"MESS_PRICE" => "Стоимость",
		"MESS_PERIOD" => "Срок доставки",
		"MESS_NAV_BACK" => "Назад",
		"MESS_NAV_FORWARD" => "Вперед"
	),
	false
);?>
        </div>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>