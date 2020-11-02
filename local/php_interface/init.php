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

$site_set = (object)$site_set;