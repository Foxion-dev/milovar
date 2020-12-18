<?php
$final_arr = [];

foreach($arResult['ITEMS']["AnDelCanBuy"] as $key_prod => $one_offer){
    $product = CCatalogSku::GetProductInfo($one_offer["PRODUCT_ID"]);

    if (is_array($product)){
        $db_groups = CIBlockElement::GetElementGroups($product['ID'], false);
        $cat_path = [];

        while($parent = $db_groups->getNext()){
            $cat_path[] = $parent['NAME'];
            $db_groups_main = CIBlockSection::GetByID($parent['IBLOCK_SECTION_ID']);

            while($parent_main = $db_groups_main->getNext()){
                $cat_path[] = $parent_main['NAME'];
            }
        }

        if(count($cat_path) > 1){
            $cat_path = array_reverse($cat_path);
            $cat_path = implode("/", $cat_path);
        } else {
            $cat_path = $cat_path[0];
        }
        $final_arr[$one_offer["ID"]]['path'] = $cat_path;

        $off_object = CIBlockElement::GetList(Array(), Array("ID"=>$one_offer["PRODUCT_ID"]));

        while($off_or = $off_object->GetNextElement()){
            $turi = $off_or->GetProperties();
            $id_fas = array_search("Фасовка", $turi["CML2_ATTRIBUTES"]["DESCRIPTION"]);

            $final_arr[$one_offer["ID"]]['fasovka'] = $turi["CML2_ATTRIBUTES"]["VALUE"][$id_fas];

        }
    }
}


foreach ($arResult["BASKET_ITEM_RENDER_DATA"] as $keyfdgdfg => $tryr){
    $key_id = $tryr['ID'];

    $arResult["BASKET_ITEM_RENDER_DATA"][$keyfdgdfg]["COLUMN_LIST"][0]["VALUE"] = $final_arr[$key_id]['path'];
    $arResult["BASKET_ITEM_RENDER_DATA"][$keyfdgdfg]["COLUMN_LIST"][0]["VALUE_2"] = $final_arr[$key_id]['fasovka'];
    $arResult["BASKET_ITEM_RENDER_DATA"][$keyfdgdfg]["COLUMN_LIST"][0]["NAME"] = "";
}

