<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["TAGS_CHAIN"] = array();
if($arResult["REQUEST"]["~TAGS"])
{
	$res = array_unique(explode(",", $arResult["REQUEST"]["~TAGS"]));
	$url = array();
	foreach ($res as $key => $tags)
	{
		$tags = trim($tags);
		if(!empty($tags))
		{
			$url_without = $res;
			unset($url_without[$key]);
			$url[$tags] = $tags;
			$result = array(
				"TAG_NAME" => htmlspecialcharsex($tags),
				"TAG_PATH" => $APPLICATION->GetCurPageParam("tags=".urlencode(implode(",", $url)), array("tags")),
				"TAG_WITHOUT" => $APPLICATION->GetCurPageParam((count($url_without) > 0 ? "tags=".urlencode(implode(",", $url_without)) : ""), array("tags")),
			);
			$arResult["TAGS_CHAIN"][] = $result;
		}
	}
}

$productIds = [];

foreach ($arResult["SEARCH"] as $item){
    $productIds[] = $item["ITEM_ID"];
}

$resOffer = CCatalogSKU::getOffersList(
    $productIds,
    $iblockID = 0,
    $skuFilter = array(),
    $fields = array('NAME'),
    $propertyFilter = array('CODE' => ["CML2_ATTRIBUTES"])
);

foreach ($arResult["SEARCH"] as $key_sech => $val_search){
    $prod_id = $val_search["ITEM_ID"];
    $grab = GetIBlockElement($prod_id);

    $img = CFile::GetPath($grab["DETAIL_PICTURE"]);
    $img = isset($img) ? $img : '/local/templates/milovar/components/bitrix/search.page/milovar/images/no_photo.png';

    $arResult["SEARCH"][$key_sech]['IMG'] =  $img;

    foreach ($resOffer[$prod_id] as $odin_offer){
        $fas_id = $odin_offer["PROPERTIES"]["CML2_ATTRIBUTES"]["DESCRIPTION"];
        $fas_id = array_search("Фасовка", $fas_id);
        $link_basket =  '&action=ADD2BASKET&id=' . $odin_offer['ID'];
        $bascet_link = urldecode($_SERVER["REQUEST_URI"]);
		$bascet_link = explode("&", $bascet_link);

 		foreach ($bascet_link as $key_i => $va_i){
 			if((strripos($va_i, "uantity=") == 1) || (strripos($va_i, "ction=ADD2BASKET") == 1) || (strripos($va_i, "d=") == 1)){
				unset($bascet_link[$key_i]);
			}
		}

		$bascet_link = implode("&", $bascet_link) .  $link_basket;

        $arResult["SEARCH"][$key_sech]['OFFERS'][] = [
            'id' => $odin_offer['ID'],
            'ves' => $odin_offer["PROPERTIES"]["CML2_ATTRIBUTES"]["VALUE"][$fas_id],
			'price' => GetCatalogProductPrice($odin_offer['ID'], 3)["PRICE"],
            'big_data' => json_encode([
            	'price' => GetCatalogProductPrice($odin_offer['ID'], 3)["PRICE"],
				'basket_link' => $bascet_link ,
			]),
        ];
    }

    $arResult["SEARCH"][$key_sech]['OFFERS'] = array_reverse($arResult["SEARCH"][$key_sech]['OFFERS']);
}
?>

