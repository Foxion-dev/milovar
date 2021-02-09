<?php
$site_set = [];

if (\Bitrix\Main\Loader::includeModule('iblock')) {
    $res = CIBlockElement::getList([], ['IBLOCK_ID' => 17, 'ID' => 361], false, false, []);

    while($ob = $res->GetNextElement()){

         foreach ($ob->GetProperties() as $id_prop => $val_prop){

             if ($val_prop["PROPERTY_TYPE"] == "F"){
                 $site_set[mb_strtolower($id_prop)] = CFile::GetPath($val_prop["VALUE"]);

             } else {
                 $site_set[mb_strtolower($id_prop)] = $val_prop["VALUE"];
             }
         }
    }
}

$site_set['style_file'] = null;
$site_set['style_file'] = "catalog-section";

if (CHTTP::GetLastStatus() == "404 Not Found"){
    $site_set['style_file'] = "404";

} elseif ($APPLICATION->GetCurPage(false) == "/"){
    $site_set['style_file'] = "home";

} elseif ($APPLICATION->GetCurPage(false) == "/catalog/"){
    $site_set['style_file'] = "catalog-section";

} elseif ($APPLICATION->GetCurPage(false) == "/personal/cart/"){
    $site_set['style_file'] = "cart";

} elseif ($APPLICATION->GetCurPage(false) == "/personal/order/make/"){
    $site_set['style_file'] = "order";

} elseif (strripos($APPLICATION->GetCurPage(false), 'element.php')){
    $site_set['style_file'] = "catalog-element";

} elseif ($APPLICATION->GetCurPage(false) == "/privacy-policy/"){
    $site_set['style_file'] = "privacy-policy";

} elseif ($APPLICATION->GetCurPage(false) == "/search/"){
    $site_set['style_file'] = "search";
}

$site_set = (object)$site_set;