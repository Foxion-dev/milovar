<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$user_id = $arResult['DISPLAY_PROPERTIES']['USER_ID']['DISPLAY_VALUE'];
if ($user_id)
{
	$rsUSER = CUser::GetById($user_id);
	$f=$rsUSER->Fetch();
	$arResult['DISPLAY_PROPERTIES']['USER_ID']['DISPLAY_VALUE'] = CUser::FormatName(CSite::GetNameFormat(false), array("NAME" => $f['NAME'], "LAST_NAME" => $f['LAST_NAME'], "SECOND_NAME" => $f['SECOND_NAME'], "LOGIN" => $f['LOGIN']));
}

$GLOBALS['parent_url_tovar'] = $arResult["SECTION"]['SECTION_PAGE_URL'];

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

?>
