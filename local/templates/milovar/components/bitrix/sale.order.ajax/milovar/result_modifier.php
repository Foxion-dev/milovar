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
        $GLOBALS['id_fild_loc'] = $prop_one["ID"];

        foreach ($prop_one["VARIANTS"] as $rt => $ret){

            if(is_numeric(strripos($ret["NAME"], " - "))){
                $arrCity = explode(" - ", $ret["NAME"]);
                $itog_city[$arrCity[0]][$ret['CODE']] = $arrCity[1];
            }
        }
    }
}
$arResult['search_city'] = $itog_city;

foreach ($arResult['DELIVERY'] as $key_deliver => $one_deliver){

    switch ($one_deliver["ID"]){
        case "31":
            $arResult['DELIVERY'][$key_deliver]["NAME"] .= " <span>(5 минут от метро)</span>";
            $arResult['DELIVERY'][$key_deliver]["DESCRIPTION"] = <<<DELTEXT
<p>Адрес: Москва, улица Вавилова, 9Ас2<br></p>
<p>График работы: с 11:00 до 20:00<br></p>
<h3><a href="https://yandex.ru/maps/-/CCQzbRtvcA" rel="nofollow" target="_blank">Схема - как пройти в магазин "Мыловар Про"</a></h3>
<div style="width: 100%; height: 500px">
<div style="width: 210px; float: left">
  <a href="https://yandex.ru/maps/-/CCQvrIWWLC" rel="nofollow" target="_blank">
  <img src="/local/templates/milovar/images/order/shema.png" style="width: 200px; height: 440px" />
  </a>
</div>
<div style="width: 640px; float: right; pading-left: 4px">
   <img src="/local/templates/milovar/images/order/12.png" alt="" style="float: left; margin-right: 4px; margin-top: 4px;" width="200" height="140" />
   <img src="/local/templates/milovar/images/order/3.png" alt="" style="float: left; margin-right: 4px; margin-top: 4px;" width="200" height="140" />
   <img src="/local/templates/milovar/images/order/5.png" alt="" style="float: left; margin-right: 4px; margin-top: 4px;" width="200" height="140" />
   <img src="/local/templates/milovar/images/order/7.png" alt="" style="float: left; margin-right: 4px; margin-top: 4px;" width="200" height="140" />
   <img src="/local/templates/milovar/images/order/2.png" alt="" style="float: left; margin-right: 4px; margin-top: 4px;" width="200" height="140" />
   <img src="/local/templates/milovar/images/order/9.png" alt="" style="float: left; margin-right: 4px; margin-top: 4px;" width="200" height="140" />
   <img src="/local/templates/milovar/images/order/10.png" alt="" style="float: left; margin-right: 4px; margin-top: 4px;" width="200" height="140" />
   <img src="/local/templates/milovar/images/order/4.png" alt="" style="float: left; margin-right: 4px; margin-top: 4px;" width="200" height="140" />     
   <img src="/local/templates/milovar/images/order/8.png" alt="" style="float: left; margin-right: 4px; margin-top: 4px;" width="200" height="140" />
 </div>
</div>
<p><strong>Как нас найти:</strong> от м. Ленинский проспект, мимо магазина "Магнолия" доходим до ул.Вавилова (120м). По пешеходным переходам оказываемся на противоположной стороне и у светофора поворачиваем налево. Проходите еще 160м вдоль линии ТЭЦ. За зданием МОЭСК через 30 метров Вы увидите&nbsp;рекламу автосервиса Порше (MS-Avto), Вам сюда.  
Подходите к коричневым воротам справа от них калитка с домофоном, говорите, что Вы в Мыловар про и Вас пропускает вежливый охранник.
На территории два здания Вас интересует левое здание, первая дверь, второй этаж.</p>
<p><strong>Внимание!</strong> Заказы выдаются только после подтверждения поступления на пункт выдачи.</p>
DELTEXT;

        break;
        case "29":
            $arResult['DELIVERY'][$key_deliver]["NAME"] = "Доставка Почтой РФ";
        break;
    }
}

foreach ($arResult['PAY_SYSTEM'] as $key_pay => $one_pay){

    switch ($one_pay["ID"]){
        case "11":
            $arResult['PAY_SYSTEM'][$key_pay]['NAME'] = str_replace("(для физ. лиц)", "<span>(для физ. лиц)</span>", $one_pay['NAME']);
        break;
    }
}

foreach ($arResult["GRID"]["ROWS"] as $key_prod => $key_val) {
    $offId = $key_val["data"]["PRODUCT_ID"];
    $product = CCatalogSku::GetProductInfo($offId);
    $db_groups = CIBlockElement::GetElementGroups($product['ID'], false);

    $cat_path = [];

    while ($parent = $db_groups->getNext()) {
        $cat_path[] = $parent['NAME'];
        $db_groups_main = CIBlockSection::GetByID($parent['IBLOCK_SECTION_ID']);

        while ($parent_main = $db_groups_main->getNext()) {
            $cat_path[] = $parent_main['NAME'];
        }
    }

    if (count($cat_path) > 1) {
        $cat_path = array_reverse($cat_path);
        $cat_path = implode("/", $cat_path);
    } else {
        $cat_path = $cat_path[0];
    }

    $off_object = CIBlockElement::GetList(array(), array("ID" => $offId));

    while ($off_or = $off_object->GetNextElement()) {
        $turi = $off_or->GetProperties();
        $id_fas = array_search("Фасовка", $turi["CML2_ATTRIBUTES"]["DESCRIPTION"]);

        $arResult["GRID"]["ROWS"][$key_prod]['CUSTOM'] = [
            "CAT_PATH" => $cat_path,
            "FASOVKA" => $turi["CML2_ATTRIBUTES"]["VALUE"][$id_fas]
        ];

    }
}