<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$strTitle = "";

$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
$CURRENT_DEPTH = 0;


foreach($arResult["SECTIONS_CUSTOM"] as $arSection) {
$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));

if($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"]){

    echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH),"<ul class='catalog-category__list deep-lev-" , $CURRENT_DEPTH , "'>";

}elseif($CURRENT_DEPTH == $arSection["DEPTH_LEVEL"]){
    echo "</li>";

}else{

    while($CURRENT_DEPTH > $arSection["DEPTH_LEVEL"]){

        echo "</li>";
        echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
        $CURRENT_DEPTH--;
    }

    echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</li>";
}

if ($_REQUEST['SECTION_ID']==$arSection['ID']){

    $link = '<b>'.$arSection["NAME"].'</b>';
    $strTitle = $arSection["NAME"];

}else{
    $link = '<a href="'.$arSection["SECTION_PAGE_URL"].'" class=catalog-category__link>'.$arSection["NAME"].'</a>';
}

echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH);

$childs = $arSection["CHILDS"] ? "<span class='catalog-category__sub'></span>" : "";
?>


<li id="<?=$this->GetEditAreaId($arSection['ID']);?>" class='catalog-category__item'>
    <div class='catalog-category__item-link'><?=$link?><?= $childs ?></div>


    <?

    $CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
    }

    while($CURRENT_DEPTH > $TOP_DEPTH)
    {
        echo "</li>";
        echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
        $CURRENT_DEPTH--;
    }

    ?>
