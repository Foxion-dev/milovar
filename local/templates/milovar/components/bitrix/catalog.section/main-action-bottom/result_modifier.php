<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


foreach ($arResult['ITEMS'] as $key => $item){

    foreach ($item["OFFERS"] as $keyOffer => $itemOffer){
        $id_prop = array_search("Фасовка", $itemOffer["PROPERTIES"]["CML2_ATTRIBUTES"]["DESCRIPTION"]);
        $prop_val = $itemOffer["PROPERTIES"]["CML2_ATTRIBUTES"]["VALUE"][$id_prop];
        $basket_link = $itemOffer["ADD_URL"];
        $price_id = $itemOffer["PRICES"]["RETAIL"]["PRICE_ID"];
        $price = $itemOffer["CATALOG_PRICE_" . $price_id];
        $class_active = $keyOffer == 0 ? " is-chek" : "";

        $arResult['ITEMS'][$key]['variacii'][$keyOffer] = [
            'value' => $prop_val,
            'class' => $class_active,
            'big_data' => json_encode(compact('price', 'basket_link'))
        ];

        if($keyOffer == 0){

            $arResult['ITEMS'][$key]['but_big_data'] = [
                'price' => number_format($price, 0, "", " "),
                'info' => json_encode(compact('price', 'basket_link')),
            ];
        }
    }
}