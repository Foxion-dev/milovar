<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult as $key => $val){

    if($key == "SECTIONS"){

        foreach ($val as $ertre => $tyu){
            $db_list = CIBlockSection::GetList(["SORT"=>"ASC"],["IBLOCK_ID" => $tyu["IBLOCK_ID"], "ID"=>$tyu["ID"]], false, [], false);

            while($ob = $db_list->GetNextElement()){
                $arResult["SECTIONS"][$ertre]["CHILDS"] = $ob->fields['RIGHT_MARGIN'] - $ob->fields['LEFT_MARGIN'] > 1;
            }
        }
    }
}
