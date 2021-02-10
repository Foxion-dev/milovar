<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
use Bitrix\Main\Localization\Loc;
use Bitrix\Sale\Location;

Loc::loadMessages(__FILE__);
?>

<?if(!empty($arResult['ERRORS']['FATAL'])):?>

	<?foreach($arResult['ERRORS']['FATAL'] as $error):?>
		<?=ShowError($error)?>
	<?endforeach?>

<?else:?>

    <div class="order-row  order-block__country">
        <h2 class="order-row__title">
            <span>1 шаг: Выберите страну</span>
        </h2>

        <div class="order-row__field">
            <select name="" id="order-country" class="arh-sel-city">

                <? foreach (current($arResult["PRECACHED_POOL"]) as $item_prop): ?>
                    <? $sel_opt = $item_prop["CODE"] == '0000028023' ? " selected" : "" ?>
                    <option value="<?= $item_prop["NAME"] ?>"<?= $sel_opt ?>><?= $item_prop["NAME"] ?></option>
                <? endforeach; ?>
            </select>
        </div>
    </div>
    <!-- CITY BLOCK -->
    <div id="err-city" class="order-row  order-block__city">
        <h2 class="order-row__title">
            <span>2 шаг: Выберите город</span>
        </h2>

        <div class="order-row__field">
            <div class="order-row__city">
                <input type="hidden" name="<?= $GLOBALS['name_fild_loc'] ?>" id="select-region-origin"/>

                <div class="gorod-text">
                    <input type="text" class="gorod-text__fufle" id="select-region-order" placeholder="Введите город *" />
                </div>

                <div class="kolhoz-text">
                    <div class="kolhoz-text-title">
                        <span>или выберите</span>
                    </div>

                    <label class="kolhoz-text-chek">
                        <input type="hidden" id="alt-local" name="LOCATION_ALT_PROP_DISPLAY_MANUAL[5]" value="0" />
                        <input type="checkbox" class="kolhoz-text-chek-input" id="kolhoz-text-chek-input" />
                        <span class="kolhoz-text-chek-fufel"></span>
                        <span class="kolhoz-text-chek-text">
                            <span>Я живу не в городе (село, поселок)</span>
                            <br />
                            <span class="kolhoz-text-chek-text-mini">Вам будет доступна только «Доставка в регионы РФ почтой России»</span>
                        </span>
                    </label>
                </div>
            </div>
        </div>

        <input type="hidden" name="PERSON_TYPE" value="1">
        <input type="hidden" id="recent-delivery-value" name="RECENT_DELIVERY_VALUE" value="">
    </div>

<?endif?>
