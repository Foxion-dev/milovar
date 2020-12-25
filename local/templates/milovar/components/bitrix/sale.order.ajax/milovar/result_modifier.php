<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var SaleOrderAjax $component
 */

$component = $this->__component;
$component::scaleImages($arResult['JS_DATA'], $arParams['SERVICES_IMAGES_SCALING']);

//echo "<pre>",var_dump($arResult),"</pre>";

//foreach($arResult as $rty => $fghfgh){
//
//    if($rty == "ORDER_PROP"){
//
//        foreach ($fghfgh as $tty => $ljkh){
//
//            if($tty == "USER_PROPS_N"){
//                echo "<pre>",var_dump($ljkh),"</pre>";
//            }
//        }
//    }
//
//}
//ORDER_PROP_17