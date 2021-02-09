<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$user_id = $arResult['DISPLAY_PROPERTIES']['USER_ID']['DISPLAY_VALUE'];
if ($user_id)
{
	$rsUSER = CUser::GetById($user_id);
	$f=$rsUSER->Fetch();
	$arResult['DISPLAY_PROPERTIES']['USER_ID']['DISPLAY_VALUE'] = CUser::FormatName(CSite::GetNameFormat(false), array("NAME" => $f['NAME'], "LAST_NAME" => $f['LAST_NAME'], "SECOND_NAME" => $f['SECOND_NAME'], "LOGIN" => $f['LOGIN']));
}

$GLOBALS['parent_url_tovar'] = $arResult["SECTION"]['SECTION_PAGE_URL'];


//ссылки на товары
$arOrder = array('id'=>'desc');
$arFilter = array(
	'SECTION_ID'=>$arResult["SECTION"]["ID"],
	'IBLOCK_ID' => $arResult["SECTION"]["IBLOCK_ID"]
);
$res_tov = CIBlockElement::GetList($arOrder, $arFilter);

$arResult['link_tovar'] = [
	'prev' => null,
	'next' => null,
];
$arr_link = [];
while ($tov = $res_tov->GetNext()){

	$arr_link[] = [
		'id' => $tov["ID"],
		'link' => $tov["DETAIL_PAGE_URL"]
	];
}

foreach ($arr_link as $key_link => $val_link){

	if($val_link['id'] == $arResult['ID']){
		$arResult['link_tovar']['prev'] = $arr_link[$key_link - 1]['link'];
		$arResult['link_tovar']['next'] = $arr_link[$key_link + 1]['link'];
	}
}

//'&quantity=2'
//фасовка
foreach ($arResult["OFFERS"] as $num_offer => $one_offer){

	$id_prop = array_search("Фасовка", $one_offer["PROPERTIES"]["CML2_ATTRIBUTES"]["DESCRIPTION"]);
	$prop_val = $one_offer["PROPERTIES"]["CML2_ATTRIBUTES"]["VALUE"][$id_prop];
	$basket_link = $one_offer["ADD_URL"];
	$price_id = $one_offer["PRICES"]["RETAIL"]["PRICE_ID"];
	$price = $one_offer["CATALOG_PRICE_" . $price_id];

	$arResult['offer_data'][] = [
		'portion' => $prop_val,
		'big-date' => json_encode(compact('price', 'basket_link')),
		'class_active' => $num_offer == 0 ? " is-chek" : ""
	];
}

?>
