<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var SaleOrderAjax $component
 */

$component = $this->__component;
$component::scaleImages($arResult['JS_DATA'], $arParams['SERVICES_IMAGES_SCALING']);
$itog_city = [];

foreach ($arResult["ORDER_PROP"]["USER_PROPS_Y"] as $prop_one){

    if($prop_one["CODE"] == 'LOCATION'){
        $GLOBALS['name_fild_loc'] = $prop_one["FIELD_NAME"];

        foreach ($prop_one["VARIANTS"] as $rt => $ret){

            if(is_numeric(strripos($ret["NAME"], " - "))){
                $arrCity = explode(" - ", $ret["NAME"]);
                $itog_city[$arrCity[0]][$ret['CODE']] = $arrCity[1];
            }
        }
    }
}
$arResult['search_city'] = $itog_city;

//echo "<pre>",var_dump($arResult),"</pre>";
