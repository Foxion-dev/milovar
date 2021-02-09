<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$sec_custom = CIBlockSection::GetList(["SORT"=>"ASC"], ['IBLOCK_ID'=>$arParams["IBLOCK_ID"]], false, $arSelect);
$sec_custom->SetUrlTemplates("", $arParams["SECTION_URL"]);
$arResult["SECTIONS_CUSTOM"] = [];

while($sec_one_custom = $sec_custom->GetNext()){
    $arResult["SECTIONS_CUSTOM"][] = $sec_one_custom;
}

foreach ($arResult as $key => $val){

    if($key == "SECTIONS_CUSTOM"){

        foreach ($val as $ertre => $tyu){
            $db_list = CIBlockSection::GetList(["SORT"=>"ASC"],["IBLOCK_ID" => $tyu["IBLOCK_ID"], "ID"=>$tyu["ID"]], false, [], false);

            while($ob = $db_list->GetNextElement()){
                $arResult["SECTIONS_CUSTOM"][$ertre]["CHILDS"] = $ob->fields['RIGHT_MARGIN'] - $ob->fields['LEFT_MARGIN'] > 1;
            }
        }
    }
}