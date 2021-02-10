<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CMain $APPLICATION
 * @var CUser $USER
 * @var SaleOrderAjax $component
 * @var string $templateFolder
 */

$context = Main\Application::getInstance()->getContext();
$request = $context->getRequest();

if (empty($arParams['TEMPLATE_THEME']))
{
	$arParams['TEMPLATE_THEME'] = Main\ModuleManager::isModuleInstalled('bitrix.eshop') ? 'site' : 'blue';
}

if ($arParams['TEMPLATE_THEME'] === 'site')
{
	$templateId = Main\Config\Option::get('main', 'wizard_template_id', 'eshop_bootstrap', $component->getSiteId());
	$templateId = preg_match('/^eshop_adapt/', $templateId) ? 'eshop_adapt' : $templateId;
	$arParams['TEMPLATE_THEME'] = Main\Config\Option::get('main', 'wizard_'.$templateId.'_theme_id', 'blue', $component->getSiteId());
}

if (!empty($arParams['TEMPLATE_THEME']))
{
	if (!is_file(Main\Application::getDocumentRoot().'/bitrix/css/main/themes/'.$arParams['TEMPLATE_THEME'].'/style.css'))
	{
		$arParams['TEMPLATE_THEME'] = 'blue';
	}
}

$arParams['ALLOW_USER_PROFILES'] = $arParams['ALLOW_USER_PROFILES'] === 'Y' ? 'Y' : 'N';
$arParams['SKIP_USELESS_BLOCK'] = $arParams['SKIP_USELESS_BLOCK'] === 'N' ? 'N' : 'Y';

if (!isset($arParams['SHOW_ORDER_BUTTON']))
{
	$arParams['SHOW_ORDER_BUTTON'] = 'final_step';
}

$arParams['HIDE_ORDER_DESCRIPTION'] = isset($arParams['HIDE_ORDER_DESCRIPTION']) && $arParams['HIDE_ORDER_DESCRIPTION'] === 'Y' ? 'Y' : 'N';
$arParams['SHOW_TOTAL_ORDER_BUTTON'] = $arParams['SHOW_TOTAL_ORDER_BUTTON'] === 'Y' ? 'Y' : 'N';
$arParams['SHOW_PAY_SYSTEM_LIST_NAMES'] = $arParams['SHOW_PAY_SYSTEM_LIST_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_PAY_SYSTEM_INFO_NAME'] = $arParams['SHOW_PAY_SYSTEM_INFO_NAME'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_LIST_NAMES'] = $arParams['SHOW_DELIVERY_LIST_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_INFO_NAME'] = $arParams['SHOW_DELIVERY_INFO_NAME'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_PARENT_NAMES'] = $arParams['SHOW_DELIVERY_PARENT_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_STORES_IMAGES'] = $arParams['SHOW_STORES_IMAGES'] === 'N' ? 'N' : 'Y';

if (!isset($arParams['BASKET_POSITION']) || !in_array($arParams['BASKET_POSITION'], array('before', 'after')))
{
	$arParams['BASKET_POSITION'] = 'after';
}

$arParams['EMPTY_BASKET_HINT_PATH'] = isset($arParams['EMPTY_BASKET_HINT_PATH']) ? (string)$arParams['EMPTY_BASKET_HINT_PATH'] : '/';
$arParams['SHOW_BASKET_HEADERS'] = $arParams['SHOW_BASKET_HEADERS'] === 'Y' ? 'Y' : 'N';
$arParams['HIDE_DETAIL_PAGE_URL'] = isset($arParams['HIDE_DETAIL_PAGE_URL']) && $arParams['HIDE_DETAIL_PAGE_URL'] === 'Y' ? 'Y' : 'N';
$arParams['DELIVERY_FADE_EXTRA_SERVICES'] = $arParams['DELIVERY_FADE_EXTRA_SERVICES'] === 'Y' ? 'Y' : 'N';

$arParams['SHOW_COUPONS'] = isset($arParams['SHOW_COUPONS']) && $arParams['SHOW_COUPONS'] === 'N' ? 'N' : 'Y';

if ($arParams['SHOW_COUPONS'] === 'N')
{
	$arParams['SHOW_COUPONS_BASKET'] = 'N';
	$arParams['SHOW_COUPONS_DELIVERY'] = 'N';
	$arParams['SHOW_COUPONS_PAY_SYSTEM'] = 'N';
}
else
{
	$arParams['SHOW_COUPONS_BASKET'] = isset($arParams['SHOW_COUPONS_BASKET']) && $arParams['SHOW_COUPONS_BASKET'] === 'N' ? 'N' : 'Y';
	$arParams['SHOW_COUPONS_DELIVERY'] = isset($arParams['SHOW_COUPONS_DELIVERY']) && $arParams['SHOW_COUPONS_DELIVERY'] === 'N' ? 'N' : 'Y';
	$arParams['SHOW_COUPONS_PAY_SYSTEM'] = isset($arParams['SHOW_COUPONS_PAY_SYSTEM']) && $arParams['SHOW_COUPONS_PAY_SYSTEM'] === 'N' ? 'N' : 'Y';
}

$arParams['SHOW_NEAREST_PICKUP'] = $arParams['SHOW_NEAREST_PICKUP'] === 'Y' ? 'Y' : 'N';
$arParams['DELIVERIES_PER_PAGE'] = isset($arParams['DELIVERIES_PER_PAGE']) ? intval($arParams['DELIVERIES_PER_PAGE']) : 9;
$arParams['PAY_SYSTEMS_PER_PAGE'] = isset($arParams['PAY_SYSTEMS_PER_PAGE']) ? intval($arParams['PAY_SYSTEMS_PER_PAGE']) : 9;
$arParams['PICKUPS_PER_PAGE'] = isset($arParams['PICKUPS_PER_PAGE']) ? intval($arParams['PICKUPS_PER_PAGE']) : 5;
$arParams['SHOW_PICKUP_MAP'] = $arParams['SHOW_PICKUP_MAP'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_MAP_IN_PROPS'] = $arParams['SHOW_MAP_IN_PROPS'] === 'Y' ? 'Y' : 'N';
$arParams['USE_YM_GOALS'] = $arParams['USE_YM_GOALS'] === 'Y' ? 'Y' : 'N';
$arParams['USE_ENHANCED_ECOMMERCE'] = isset($arParams['USE_ENHANCED_ECOMMERCE']) && $arParams['USE_ENHANCED_ECOMMERCE'] === 'Y' ? 'Y' : 'N';
$arParams['DATA_LAYER_NAME'] = isset($arParams['DATA_LAYER_NAME']) ? trim($arParams['DATA_LAYER_NAME']) : 'dataLayer';
$arParams['BRAND_PROPERTY'] = isset($arParams['BRAND_PROPERTY']) ? trim($arParams['BRAND_PROPERTY']) : '';

$useDefaultMessages = !isset($arParams['USE_CUSTOM_MAIN_MESSAGES']) || $arParams['USE_CUSTOM_MAIN_MESSAGES'] != 'Y';

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_BLOCK_NAME']))
{
	$arParams['MESS_AUTH_BLOCK_NAME'] = Loc::getMessage('AUTH_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REG_BLOCK_NAME']))
{
	$arParams['MESS_REG_BLOCK_NAME'] = Loc::getMessage('REG_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_BASKET_BLOCK_NAME']))
{
	$arParams['MESS_BASKET_BLOCK_NAME'] = Loc::getMessage('BASKET_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REGION_BLOCK_NAME']))
{
	$arParams['MESS_REGION_BLOCK_NAME'] = Loc::getMessage('REGION_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PAYMENT_BLOCK_NAME']))
{
	$arParams['MESS_PAYMENT_BLOCK_NAME'] = Loc::getMessage('PAYMENT_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_DELIVERY_BLOCK_NAME']))
{
	$arParams['MESS_DELIVERY_BLOCK_NAME'] = Loc::getMessage('DELIVERY_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_BUYER_BLOCK_NAME']))
{
	$arParams['MESS_BUYER_BLOCK_NAME'] = Loc::getMessage('BUYER_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_BACK']))
{
	$arParams['MESS_BACK'] = Loc::getMessage('BACK_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_FURTHER']))
{
	$arParams['MESS_FURTHER'] = Loc::getMessage('FURTHER_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_EDIT']))
{
	$arParams['MESS_EDIT'] = Loc::getMessage('EDIT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ORDER']))
{
	$arParams['MESS_ORDER'] = $arParams['~MESS_ORDER'] = Loc::getMessage('ORDER_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PRICE']))
{
	$arParams['MESS_PRICE'] = Loc::getMessage('PRICE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PERIOD']))
{
	$arParams['MESS_PERIOD'] = Loc::getMessage('PERIOD_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_NAV_BACK']))
{
	$arParams['MESS_NAV_BACK'] = Loc::getMessage('NAV_BACK_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_NAV_FORWARD']))
{
	$arParams['MESS_NAV_FORWARD'] = Loc::getMessage('NAV_FORWARD_DEFAULT');
}

$useDefaultMessages = !isset($arParams['USE_CUSTOM_ADDITIONAL_MESSAGES']) || $arParams['USE_CUSTOM_ADDITIONAL_MESSAGES'] != 'Y';

if ($useDefaultMessages || !isset($arParams['MESS_PRICE_FREE']))
{
	$arParams['MESS_PRICE_FREE'] = Loc::getMessage('PRICE_FREE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ECONOMY']))
{
	$arParams['MESS_ECONOMY'] = Loc::getMessage('ECONOMY_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REGISTRATION_REFERENCE']))
{
	$arParams['MESS_REGISTRATION_REFERENCE'] = Loc::getMessage('REGISTRATION_REFERENCE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_REFERENCE_1']))
{
	$arParams['MESS_AUTH_REFERENCE_1'] = Loc::getMessage('AUTH_REFERENCE_1_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_REFERENCE_2']))
{
	$arParams['MESS_AUTH_REFERENCE_2'] = Loc::getMessage('AUTH_REFERENCE_2_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_REFERENCE_3']))
{
	$arParams['MESS_AUTH_REFERENCE_3'] = Loc::getMessage('AUTH_REFERENCE_3_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ADDITIONAL_PROPS']))
{
	$arParams['MESS_ADDITIONAL_PROPS'] = Loc::getMessage('ADDITIONAL_PROPS_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_USE_COUPON']))
{
	$arParams['MESS_USE_COUPON'] = Loc::getMessage('USE_COUPON_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_COUPON']))
{
	$arParams['MESS_COUPON'] = Loc::getMessage('COUPON_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PERSON_TYPE']))
{
	$arParams['MESS_PERSON_TYPE'] = Loc::getMessage('PERSON_TYPE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_SELECT_PROFILE']))
{
	$arParams['MESS_SELECT_PROFILE'] = Loc::getMessage('SELECT_PROFILE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REGION_REFERENCE']))
{
	$arParams['MESS_REGION_REFERENCE'] = Loc::getMessage('REGION_REFERENCE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PICKUP_LIST']))
{
	$arParams['MESS_PICKUP_LIST'] = Loc::getMessage('PICKUP_LIST_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_NEAREST_PICKUP_LIST']))
{
	$arParams['MESS_NEAREST_PICKUP_LIST'] = Loc::getMessage('NEAREST_PICKUP_LIST_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_SELECT_PICKUP']))
{
	$arParams['MESS_SELECT_PICKUP'] = Loc::getMessage('SELECT_PICKUP_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_INNER_PS_BALANCE']))
{
	$arParams['MESS_INNER_PS_BALANCE'] = Loc::getMessage('INNER_PS_BALANCE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ORDER_DESC']))
{
	$arParams['MESS_ORDER_DESC'] = Loc::getMessage('ORDER_DESC_DEFAULT');
}

$useDefaultMessages = !isset($arParams['USE_CUSTOM_ERROR_MESSAGES']) || $arParams['USE_CUSTOM_ERROR_MESSAGES'] != 'Y';

if ($useDefaultMessages || !isset($arParams['MESS_PRELOAD_ORDER_TITLE']))
{
	$arParams['MESS_PRELOAD_ORDER_TITLE'] = Loc::getMessage('PRELOAD_ORDER_TITLE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_SUCCESS_PRELOAD_TEXT']))
{
	$arParams['MESS_SUCCESS_PRELOAD_TEXT'] = Loc::getMessage('SUCCESS_PRELOAD_TEXT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_FAIL_PRELOAD_TEXT']))
{
	$arParams['MESS_FAIL_PRELOAD_TEXT'] = Loc::getMessage('FAIL_PRELOAD_TEXT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_DELIVERY_CALC_ERROR_TITLE']))
{
	$arParams['MESS_DELIVERY_CALC_ERROR_TITLE'] = Loc::getMessage('DELIVERY_CALC_ERROR_TITLE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_DELIVERY_CALC_ERROR_TEXT']))
{
	$arParams['MESS_DELIVERY_CALC_ERROR_TEXT'] = Loc::getMessage('DELIVERY_CALC_ERROR_TEXT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR']))
{
	$arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR'] = Loc::getMessage('PAY_SYSTEM_PAYABLE_ERROR_DEFAULT');
}

$scheme = $request->isHttps() ? 'https' : 'http';

switch (LANGUAGE_ID)
{
	case 'ru':
		$locale = 'ru-RU'; break;
	case 'ua':
		$locale = 'ru-UA'; break;
	case 'tk':
		$locale = 'tr-TR'; break;
	default:
		$locale = 'en-US'; break;
}

//$this->addExternalCss('/bitrix/css/main/bootstrap.css');
//$APPLICATION->SetAdditionalCSS('/bitrix/css/main/themes/'.$arParams['TEMPLATE_THEME'].'/style.css', true);
//$APPLICATION->SetAdditionalCSS($templateFolder.'/style.css', true);
$this->addExternalJs($templateFolder.'/order_ajax.js');
\Bitrix\Sale\PropertyValueCollection::initJs();
$this->addExternalJs($templateFolder.'/script.js');
?>
	<NOSCRIPT>
		<div style="color:red"><?=Loc::getMessage('SOA_NO_JS')?></div>
	</NOSCRIPT>
<?

if ($request->get('ORDER_ID') <> '')
{
	include(Main\Application::getDocumentRoot().$templateFolder.'/confirm.php');
}
elseif ($arParams['DISABLE_BASKET_REDIRECT'] === 'Y' && $arResult['SHOW_EMPTY_BASKET'])
{
	include(Main\Application::getDocumentRoot().$templateFolder.'/empty.php');
}
else
{
	Main\UI\Extension::load('phone_auth');

	$hideDelivery = empty($arResult['DELIVERY']);
	?>
	<form action="<?=POST_FORM_ACTION_URI?>" method="POST" name="ORDER_FORM" id="bx-soa-order-form" enctype="multipart/form-data">
		<?
		echo bitrix_sessid_post();

		if ($arResult['PREPAY_ADIT_FIELDS'] <> '')
		{
			echo $arResult['PREPAY_ADIT_FIELDS'];
		}
		?>
		<input type="hidden" name="<?=$arParams['ACTION_VARIABLE']?>" value="saveOrderAjax">
		<input type="hidden" name="location_type" value="code">
		<input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?=$arResult['BUYER_STORE']?>">

		<div id="bx-soa-order" class="row bx-<?=$arParams['TEMPLATE_THEME']?>" style="opacity: 0">
			<!--	MAIN BLOCK	-->
			<div class="col-sm-9 bx-soa">
				<div id="bx-soa-main-notifications">
					<div class="alert alert-danger" style="display:none"></div>
					<div data-type="informer" style="display:none"></div>
				</div>

				<!--	AUTH BLOCK	-->
				<div id="bx-soa-auth" class="bx-soa-section bx-soa-auth" style="display:none">
					<div class="bx-soa-section-title-container">
						<h2 class="bx-soa-section-title col-sm-9">
							<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_AUTH_BLOCK_NAME']?>
						</h2>
					</div>
					<div class="bx-soa-section-content container-fluid"></div>
				</div>

				<? if ($arParams['BASKET_POSITION'] === 'before'): ?>

					<!--	BASKET ITEMS BLOCK	-->
					<div id="bx-soa-basket" data-visited="false" class="bx-soa-section bx-active">
						<div class="bx-soa-section-title-container">
							<h2 class="bx-soa-section-title col-sm-9">
								<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_BASKET_BLOCK_NAME']?>
							</h2>
							<div class="col-xs-12 col-sm-3 text-right"><a href="javascript:void(0)" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content container-fluid"></div>
					</div>
				<? endif ?>

                <!-- COUNTRY BLOCK -->
                <?$APPLICATION->IncludeComponent(
                        "bitrix:sale.location.selector.steps",
                        "milovar", Array(
                    "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                    "CACHE_TYPE" => "A",	// Тип кеширования
                    "CODE" => "",	// Символьный код местоположения
                    "DISABLE_KEYBOARD_INPUT" => "N",	// Отключить поиск через ввод с клавиатуры и не показывать следующий уровень при выборе
                    "FILTER_BY_SITE" => "N",	// Фильтровать по сайту
                    "ID" => "",	// ID местоположения
                    "INITIALIZE_BY_GLOBAL_EVENT" => "",	// Инициализировать компонент только при наступлении указанного javascript-события на объекте window.document
                    "INPUT_NAME" => "LOCATION",	// Имя поля ввода
                    "JS_CALLBACK" => "",	// Javascript-функция обратного вызова
                    "JS_CONTROL_GLOBAL_ID" => "",	// Идентификатор javascript-контрола
                    "PRECACHE_LAST_LEVEL" => "Y",	// Предварительно загружать последний выбранный уровень
                    "PRESELECT_TREE_TRUNK" => "N",	// Отображать статичный ствол дерева
                    "PROVIDE_LINK_BY" => "id",	// Сохранять связь через
                    "SHOW_DEFAULT_LOCATIONS" => "N",	// Отображать местоположения по-умолчанию
                    "SUPPRESS_ERRORS" => "N",	// Не показывать ошибки, если они возникли при загрузке компонента
                ),
                    false
                );?>


				<? if ($arParams['DELIVERY_TO_PAYSYSTEM'] === 'p2d'): ?>

					<!--	PAY SYSTEMS BLOCK	-->
					<div id="bx-soa-paysystem" data-visited="false" class="bx-soa-section bx-active">
						<div class="bx-soa-section-title-container">
							<h2 class="bx-soa-section-title col-sm-9">
								<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_PAYMENT_BLOCK_NAME']?>
							</h2>
							<div class="col-xs-12 col-sm-3 text-right"><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content container-fluid"></div>
					</div>

					<!--	DELIVERY BLOCK	-->
					<div id="bx-soa-delivery" data-visited="false" class="bx-soa-section bx-active" <?=($hideDelivery ? 'style="display:none"' : '')?>>
						<div class="bx-soa-section-title-container">
							<h2 class="bx-soa-section-title col-sm-9">
								<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_DELIVERY_BLOCK_NAME']?>
							</h2>
							<div class="col-xs-12 col-sm-3 text-right"><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content container-fluid"></div>
					</div>
					<!--	PICKUP BLOCK	-->
					<div id="bx-soa-pickup" data-visited="false" class="bx-soa-section" style="display:none">
						<div class="bx-soa-section-title-container">
							<h2 class="bx-soa-section-title col-sm-9">
								<span class="bx-soa-section-title-count"></span>
							</h2>
							<div class="col-xs-12 col-sm-3 text-right"><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content container-fluid"></div>
					</div>
				<? else: ?>

                <!--	DELIVERY BLOCK	-->
                <div id="err-del" class="order-row  order-block__delivery">
                    <h2 class="order-row__title">
                        <span>3 шаг: Выберите доставку</span>
                        <span class="order-row__title-sub">После выбора варианта доставки появится описание</span>
                    </h2>

                    <div class="order-row__field">
                        <div class="order-row__delivery-list">

                            <? foreach($arResult['DELIVERY'] as $one_del): ?>
                            <? $checkRadio = $one_del["CHECKED"] == "Y" ? ' checked' : "" ?>

                                <div class="order-row__delivery-item">
                                    <label class="order-row__delivery-row">
                                        <div class="order-row__delivery-chek">
                                            <input id="<?= $one_del["FIELD_NAME"] ?>_<?= $one_del["ID"] ?>" type="radio" <?//=$checkRadio?> class="order-row__delivery-input" name="<?= $one_del["FIELD_NAME"] ?>" value="<?= $one_del["ID"] ?>" />
                                            <span class="order-row__delivery-fufel"></span>
                                            <span class="order-row__delivery-name"><?= $one_del["NAME"] ?></span>
                                            <span class="order-row__delivery-price">0.00 р</span>
                                        </div>

                                        <? if($one_del["DESCRIPTION"] != ""): ?>
                                            <div class="order-row__delivery-desc">
                                                <?= $one_del["DESCRIPTION"] ?>
                                            </div>
                                        <? endif; ?>
                                    </label>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>


					<!--	PICKUP BLOCK	-->
					<div id="bx-soa-pickup" data-visited="false" class="bx-soa-section" style="display:none">
						<div class="bx-soa-section-title-container">
							<h2 class="bx-soa-section-title col-sm-9">
								<span class="bx-soa-section-title-count"></span>
							</h2>
							<div class="col-xs-12 col-sm-3 text-right"><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content container-fluid"></div>
					</div>


                    <!--	PAY SYSTEMS BLOCK	-->
                    <div id="err-pay" class="order-row  order-block__payment">
                        <h2 class="order-row__title">
                            <span>4 шаг: Выберите способ оплаты</span>
                            <span class="order-row__title-sub">После выбора варианта оплаты появится описание</span>
                        </h2>

                        <div class="order-row__field">
                            <div class="order-row__payment-list">

                                <? foreach($arResult['PAY_SYSTEM'] as $one_pay): ?>
                                    <div class="order-row__payment-item">
                                        <label class="order-row__payment-row">
                                            <div class="order-row__payment-chek">
                                                <input id="ID_PAY_SYSTEM_ID_<?= $one_pay["ID"] ?>" type="radio" class="order-row__payment-input" name="PAY_SYSTEM_ID" value="<?= $one_pay["ID"] ?>" />
                                                <span class="order-row__payment-fufel"></span>
                                                <span class="order-row__payment-name"><?= $one_pay["NAME"] ?></span>
                                            </div>

                                            <? if($one_pay["DESCRIPTION"] != ""): ?>
                                                <div class="order-row__payment-desc">
                                                    <?= $one_del["DESCRIPTION"] ?>
                                                </div>
                                            <? endif; ?>
                                        </label>
                                    </div>
                                <? endforeach; ?>
                            </div>
                        </div>
                    </div>
				<? endif ?>

                <!--	BUYER PROPS BLOCK	-->
                <div id="err-buyer"  class="order-row  order-block__buyer">
                    <h2 class="order-row__title">
                        <span>5 шаг: Получатель товара и адрес доставки</span>
                    </h2>

                    <? //echo "<pre>",var_dump($arResult["ORDER_PROP"]["USER_PROPS_N"][22]),"</pre>"; ?>

                    <div class="order-row__field">

                        <div class="order-buyer-col">
                            <div class="order-buyer order-buyer-name">
                                <div class="order-buyer__title">
                                    <span>Имя получателя *</span>
                                </div>

                                <div class="order-buyer__field">
                                    <input
                                        type="text"
                                        placeholder="Ваше имя"
                                        required
                                        name="<?=$arResult["ORDER_PROP"]["USER_PROPS_N"][22]["FIELD_NAME"]?>"
                                        value="<?=$arResult["ORDER_PROP"]["USER_PROPS_N"][22]["VALUE"]?>"
                                    />
                                </div>
                            </div>

                            <div class="order-buyer order-buyer-famil">
                                <div class="order-buyer__title">
                                    <span>Фамилия получателя *</span>
                                </div>

                                <div class="order-buyer__field">
                                    <input
                                        type="text"
                                        placeholder="Ваша фамилия"
                                        required
                                        name="<?=$arResult["ORDER_PROP"]["USER_PROPS_N"][23]["FIELD_NAME"]?>"
                                        value="<?=$arResult["ORDER_PROP"]["USER_PROPS_N"][23]["VALUE"]?>"
                                    />
                                </div>
                            </div>

                            <div class="order-buyer order-buyer-otchestvo">
                                <div class="order-buyer__title">
                                    <span>Отчество получателя</span>
                                </div>

                                <div class="order-buyer__field">
                                    <input
                                        type="text"
                                        placeholder="Ваше отчество"
                                        required
                                        name="<?=$arResult["ORDER_PROP"]["USER_PROPS_N"][24]["FIELD_NAME"]?>"
                                        value="<?=$arResult["ORDER_PROP"]["USER_PROPS_N"][24]["VALUE"]?>"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="order-buyer-col">
                            <div class="order-buyer order-buyer-phone">
                                <div class="order-buyer__title">
                                    <span>Телефон *</span>
                                </div>

                                <div class="order-buyer__field">
                                    <input
                                        type="text"
                                        placeholder="Ваше телефон"
                                        required
                                        name="<?=$arResult["ORDER_PROP"]["USER_PROPS_N"][20]["FIELD_NAME"]?>"
                                        value="<?=$arResult["ORDER_PROP"]["USER_PROPS_N"][20]["VALUE"]?>"
                                    />
                                </div>
                            </div>

                            <div class="order-buyer order-buyer-email">
                                <div class="order-buyer__title">
                                    <span>Ваш e-mail *</span>
                                </div>

                                <div class="order-buyer__field">
                                    <input
                                        type="text"
                                        placeholder="Ваш e-mail"
                                        required
                                        name="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][6]["FIELD_NAME"]?>"
                                        value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][6]["VALUE"]?>"
                                    />
                                </div>
                            </div>

                            <div class="order-buyer order-buyer-index">
                                <div class="order-buyer__title">
                                    <span>Индекс *</span>
                                </div>

                                <div class="order-buyer__field">
                                    <input
                                        type="text"
                                        placeholder="Ваш индекс"
                                        required
                                        name="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][4]["FIELD_NAME"]?>"
                                        value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][4]["VALUE"]?>"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="order-buyer-col">
                            <div class="order-buyer order-buyer-gorod" style="display:none">
                                <div class="order-buyer__title">
                                    <span>Город *</span>
                                </div>

                                <div class="order-buyer__field">
                                    <input
                                        type="text"
                                        placeholder="Введите название"
                                        name="ORDER_PROP_5"
                                        value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"][5]["VALUE"]?>"
                                    />


                                </div>
                            </div>

                            <div class="order-buyer order-buyer-dom" style="display:none">
                                <div class="order-buyer__title">
                                    <span>Адрес (пр.Ленина д.3 корп.2 кв.3) *</span>
                                </div>

                                <div class="order-buyer__field">
                                    <input
                                        type="text"
                                        placeholder="Введите название"
                                        name="<?=$arResult["ORDER_PROP"]["USER_PROPS_N"][21]["FIELD_NAME"]?>"
                                        value="<?=$arResult["ORDER_PROP"]["USER_PROPS_N"][21]["VALUE"]?>"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="order-buyer order-buyer-desc">
                            <div class="order-buyer__title">
                                <span>Комментарий к заказу</span>
                            </div>

                            <div class="order-buyer__field">
                                <textarea id="orderDescription" name="ORDER_DESCRIPTION" placeholder="Введите текст"></textarea>
                            </div>
                        </div>
                    </div>
                </div>


				<? if ($arParams['BASKET_POSITION'] === 'after'): ?>
					<!--	BASKET ITEMS BLOCK	-->

                    <div class="order-row  order-block__basket">
                        <h2 class="order-row__title">
                            <span>6 шаг: состав заказа</span>
                        </h2>

                        <div class="order-row__field">
                            <div class="cart-prod-title">
                                <div class="cart-prod-title__name">
                                    <span>Наименование</span>
                                </div>
                                <div class="cart-prod-title__category">
                                    <span>Категория</span>
                                </div>
                                <div class="cart-prod-title__packing">
                                    <span>Фасовка</span>
                                </div>
                                <div class="cart-prod-title__price">
                                    <span>Цена</span>
                                </div>
                                <div class="cart-prod-title__sale">
                                    <span>Скидка</span>
                                </div>
                                <div class="cart-prod-title__pricesale">
                                    <span>Цена со скидкой</span>
                                </div>
                                <div class="cart-prod-title__count">
                                    <span>Кол-во</span>
                                </div>
                                <div class="cart-prod-title__final">
                                    <span>Итого</span>
                                </div>
                            </div>

                            <div class="cart-prod__list">

                                <? foreach($arResult["GRID"]["ROWS"] as $odin_row): ?>

                                    <div class="cart-prod__item">
                                        <div class="cart-prod__item-name">
                                            <img src="<?= $odin_row['data']["DETAIL_PICTURE_SRC"] ?>" alt="" />
                                            <span><?= $odin_row['data']["NAME"] ?></span>
                                        </div>

                                        <div class="cart-prod__item-category">
                                            <span><?= $odin_row['CUSTOM']['CAT_PATH'] ?></span>
                                        </div>

                                        <div class="cart-prod__item-packing">
                                            <span><?= $odin_row['CUSTOM']["FASOVKA"] ?></span>
                                        </div>

                                        <div class="cart-prod__item-price">
                                            <span><?= str_replace("руб.", "р", $odin_row['data']["BASE_PRICE_FORMATED"]) ?></span>
                                        </div>

                                        <div class="cart-prod__item-sale">
                                            <span><?= $odin_row['data']["DISCOUNT_PRICE_PERCENT_FORMATED"] ?></span>
                                        </div>

                                        <div class="cart-prod__item-pricesale">
                                            <span><?= str_replace("руб.", "р", $odin_row['data']["PRICE_FORMATED"]) ?></span>
                                        </div>

                                        <div class="cart-prod__item-count">
                                            <span><?= $odin_row['data']["QUANTITY"] ?></span>
                                        </div>

                                        <div class="cart-prod__item-final">
                                            <span><?= str_replace("руб.", "р", $odin_row['data']["SUM"]) ?></span>
                                        </div>
                                    </div>

                                <? endforeach; ?>
                            </div>
                        </div>
                    </div>
				<? endif ?>

				<!--	ORDER SAVE BLOCK	-->
				<div id="bx-soa-orderSave">
					<div class="checkbox">
						<?
						if ($arParams['USER_CONSENT'] === 'Y')
						{
							$APPLICATION->IncludeComponent(
								'bitrix:main.userconsent.request',
								'',
								array(
									'ID' => $arParams['USER_CONSENT_ID'],
									'IS_CHECKED' => $arParams['USER_CONSENT_IS_CHECKED'],
									'IS_LOADED' => $arParams['USER_CONSENT_IS_LOADED'],
									'AUTO_SAVE' => 'N',
									'SUBMIT_EVENT_NAME' => 'bx-soa-order-save',
									'REPLACE' => array(
										'button_caption' => isset($arParams['~MESS_ORDER']) ? $arParams['~MESS_ORDER'] : $arParams['MESS_ORDER'],
										'fields' => $arResult['USER_CONSENT_PROPERTY_DATA']
									)
								)
							);
						}
						?>
					</div>
				</div>

				<div style="display: none;">
					<div id='bx-soa-basket-hidden' class="bx-soa-section"></div>
                    <div id='bx-soa-country-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-region-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-paysystem-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-delivery-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-pickup-hidden' class="bx-soa-section"></div>
					<div id="bx-soa-properties-hidden" class="bx-soa-section"></div>
					<div id="bx-soa-auth-hidden" class="bx-soa-section">
						<div class="bx-soa-section-content container-fluid reg"></div>
					</div>
				</div>
			</div>

			<!--	SIDEBAR BLOCK	-->
            <div class="order-row  order-block__save">
                <div class="order-block__save-logo">
                    <span></span>
                </div>

                <div class="order-block__save-col1">
                    <span class="itog-title">Ваша скидка:</span>
                    <span id="order-scid" class="itog-res">0.00 р</span>
                </div>

                <div class="order-block__save-col2">
                    <div class="order-block__save-row">
                        <span class="itog-title">Стоимость доставки:</span>
                        <span id="order-dost" class="itog-res">0.00 р</span>
                    </div>

                    <div class="order-block__save-row">
                        <span class="itog-title">Общий вес:</span>
                        <span id="order-dost" class="itog-res"><?= $arResult['JS_DATA']["TOTAL"]["ORDER_WEIGHT_FORMATED"] ?></span>
                    </div>
                </div>

                <div class="order-block__save-col3">
                    <div class="order-block__save-row">
                        <span class="itog-title">Стоимость товаров:</span>
                        <span id="order-dost" class="itog-res"><?= $arResult['JS_DATA']["TOTAL"]["ORDER_PRICE_FORMATED"] ?></span>
                    </div>

                    <div class="order-block__save-row">
                        <span class="itog-title">Итого:</span>
                        <span id="order-dost" class="itog-res"><?= $arResult['JS_DATA']["TOTAL"]["ORDER_TOTAL_PRICE_FORMATED"] ?></span>
                    </div>
                </div>

                <div class="order-block__save-submit">
                    <a href="javascript:void(0)" class="save-order-arh">Подтвердить заказ</a>
                </div>
            </div>

            <div id="err-side"  class="order-row  order-block__valid">
                <label class="valid-order">
                    <input type="checkbox" id="valid-one" class="valid-order-origin" />
                    <span class="valid-order-fufel"></span>
                    <span class="valid-order-text">Нажимая кнопку "Подтвердить заказ", я принимаю Условия продажи товаров в интернет-магазине MilovarPro Клиент обязуется: принять и оплатить заказв соответствии с условиями, указанными Клиентом в процессе оформления данного заказа; проверить ассортимент, внешний вид, комплектность, тару и упаковку в момент получения товара.</span>
                </label>

                <label class="valid-order">
                    <input type="checkbox" id="valid-two" class="valid-order-origin" />
                    <span class="valid-order-fufel"></span>
                    <span class="valid-order-text">Настоящим подтверждаю, что я ознакомлен и согласен с условиями политики конфиденциальности.</span>
                </label>
            </div>

			<div id="bx-soa-total" class="col-sm-3 bx-soa-sidebar" style="display:none">
				<div class="bx-soa-cart-total-ghost"></div>
				<div class="bx-soa-cart-total"></div>
			</div>
		</div>
	</form>

	<div id="bx-soa-saved-files" style="display:none"></div>
	<div id="bx-soa-soc-auth-services" style="display:none">
		<?
		$arServices = false;
		$arResult['ALLOW_SOCSERV_AUTHORIZATION'] = Main\Config\Option::get('main', 'allow_socserv_authorization', 'Y') != 'N' ? 'Y' : 'N';
		$arResult['FOR_INTRANET'] = false;

		if (Main\ModuleManager::isModuleInstalled('intranet') || Main\ModuleManager::isModuleInstalled('rest'))
			$arResult['FOR_INTRANET'] = true;

		if (Main\Loader::includeModule('socialservices') && $arResult['ALLOW_SOCSERV_AUTHORIZATION'] === 'Y')
		{
			$oAuthManager = new CSocServAuthManager();
			$arServices = $oAuthManager->GetActiveAuthServices(array(
				'BACKURL' => $this->arParams['~CURRENT_PAGE'],
				'FOR_INTRANET' => $arResult['FOR_INTRANET'],
			));

			if (!empty($arServices))
			{
				$APPLICATION->IncludeComponent(
					'bitrix:socserv.auth.form',
					'flat',
					array(
						'AUTH_SERVICES' => $arServices,
						'AUTH_URL' => $arParams['~CURRENT_PAGE'],
						'POST' => $arResult['POST'],
					),
					$component,
					array('HIDE_ICONS' => 'Y')
				);
			}
		}
		?>
	</div>

	<div style="display: none">
		<?
		// we need to have all styles for sale.location.selector.steps, but RestartBuffer() cuts off document head with styles in it
//		$APPLICATION->IncludeComponent(
//			'bitrix:sale.location.selector.steps',
//			'.default',
//			array(),
//			false
//		);
//		$APPLICATION->IncludeComponent(
//			'bitrix:sale.location.selector.search',
//			'.default',
//			array(),
//			false
//		);
		?>
	</div>
	<?
	$signer = new Main\Security\Sign\Signer;
	$signedParams = $signer->sign(base64_encode(serialize($arParams)), 'sale.order.ajax');
	$messages = Loc::loadLanguageFile(__FILE__);
	?>
    <script>
        window.order_city = <?=CUtil::PhpToJSObject($arResult['search_city'])?>
    </script>
	<script>

		BX.message(<?=CUtil::PhpToJSObject($messages)?>);
		BX.Sale.OrderAjaxComponent.init({
			result: <?=CUtil::PhpToJSObject($arResult['JS_DATA'])?>,
			locations: <?=CUtil::PhpToJSObject($arResult['LOCATIONS'])?>,
			params: <?=CUtil::PhpToJSObject($arParams)?>,
			signedParamsString: '<?=CUtil::JSEscape($signedParams)?>',
			siteID: '<?=CUtil::JSEscape($component->getSiteId())?>',
			ajaxUrl: '<?=CUtil::JSEscape($component->getPath().'/ajax.php')?>',
			templateFolder: '<?=CUtil::JSEscape($templateFolder)?>',
			propertyValidation: true,
			showWarnings: true,
			pickUpMap: {
				defaultMapPosition: {
					lat: 55.76,
					lon: 37.64,
					zoom: 7
				},
				secureGeoLocation: false,
				geoLocationMaxTime: 5000,
				minToShowNearestBlock: 3,
				nearestPickUpsToShow: 3
			},
			propertyMap: {
				defaultMapPosition: {
					lat: 55.76,
					lon: 37.64,
					zoom: 7
				}
			},
			orderBlockId: 'bx-soa-order',
			authBlockId: 'bx-soa-auth',
			basketBlockId: 'bx-soa-basket',
            countryBlockId: 'bx-soa-country',
			regionBlockId: 'bx-soa-region',
			paySystemBlockId: 'bx-soa-paysystem',
			deliveryBlockId: 'bx-soa-delivery',
			pickUpBlockId: 'bx-soa-pickup',
			propsBlockId: 'bx-soa-properties',
			totalBlockId: 'bx-soa-total'
		});
	</script>
	<script>
		<?
		// spike: for children of cities we place this prompt
		$city = \Bitrix\Sale\Location\TypeTable::getList(array('filter' => array('=CODE' => 'CITY'), 'select' => array('ID')))->fetch();
		?>
		BX.saleOrderAjax.init(<?=CUtil::PhpToJSObject(array(
			'source' => $component->getPath().'/get.php',
			'cityTypeId' => intval($city['ID']),
			'messages' => array(
				'otherLocation' => '--- '.Loc::getMessage('SOA_OTHER_LOCATION'),
				'moreInfoLocation' => '--- '.Loc::getMessage('SOA_NOT_SELECTED_ALT'), // spike: for children of cities we place this prompt
				'notFoundPrompt' => '<div class="-bx-popup-special-prompt">'.Loc::getMessage('SOA_LOCATION_NOT_FOUND').'.<br />'.Loc::getMessage('SOA_LOCATION_NOT_FOUND_PROMPT', array(
						'#ANCHOR#' => '<a href="javascript:void(0)" class="-bx-popup-set-mode-add-loc">',
						'#ANCHOR_END#' => '</a>'
					)).'</div>'
			)
		))?>);
	</script>
	<?
	if ($arParams['SHOW_PICKUP_MAP'] === 'Y' || $arParams['SHOW_MAP_IN_PROPS'] === 'Y')
	{
		if ($arParams['PICKUP_MAP_TYPE'] === 'yandex')
		{
			$this->addExternalJs($templateFolder.'/scripts/yandex_maps.js');
			$apiKey = htmlspecialcharsbx(Main\Config\Option::get('fileman', 'yandex_map_api_key', ''));
			?>
			<script src="<?=$scheme?>://api-maps.yandex.ru/2.1.50/?apikey=<?=$apiKey?>&load=package.full&lang=<?=$locale?>"></script>
			<script>
				(function bx_ymaps_waiter(){
					if (typeof ymaps !== 'undefined' && BX.Sale && BX.Sale.OrderAjaxComponent)
						ymaps.ready(BX.proxy(BX.Sale.OrderAjaxComponent.initMaps, BX.Sale.OrderAjaxComponent));
					else
						setTimeout(bx_ymaps_waiter, 100);
				})();
			</script>
			<?
		}

		if ($arParams['PICKUP_MAP_TYPE'] === 'google')
		{
			$this->addExternalJs($templateFolder.'/scripts/google_maps.js');
			$apiKey = htmlspecialcharsbx(Main\Config\Option::get('fileman', 'google_map_api_key', ''));
			?>
			<script async defer
				src="<?=$scheme?>://maps.googleapis.com/maps/api/js?key=<?=$apiKey?>&callback=bx_gmaps_waiter">
			</script>
			<script>
				function bx_gmaps_waiter()
				{
					if (BX.Sale && BX.Sale.OrderAjaxComponent)
						BX.Sale.OrderAjaxComponent.initMaps();
					else
						setTimeout(bx_gmaps_waiter, 100);
				}
			</script>
			<?
		}
	}

	if ($arParams['USE_YM_GOALS'] === 'Y')
	{
		?>
		<script>
			(function bx_counter_waiter(i){
				i = i || 0;
				if (i > 50)
					return;

				if (typeof window['yaCounter<?=$arParams['YM_GOALS_COUNTER']?>'] !== 'undefined')
					BX.Sale.OrderAjaxComponent.reachGoal('initialization');
				else
					setTimeout(function(){bx_counter_waiter(++i)}, 100);
			})();
		</script>
		<?
	}
}