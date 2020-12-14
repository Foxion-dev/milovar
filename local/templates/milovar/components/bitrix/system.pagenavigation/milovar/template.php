<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->SetPageProperty("count_prod", $arResult["NavRecordCount"]);

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

if($arResult["NavPageCount"] > 1){
    ?>
    <div class="paging-block">
        <?
        if($arResult["bDescPageNumbering"] === true):
            $bFirst = true;
            if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
                if($arResult["bSavePage"]):
                    ?>

                    <a class="paging-block__previous" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span class="scoba-left"></span></a>
                <?
                else:
                    if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1) ):
                        ?>
                        <a class="paging-block__previous" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span class="scoba-left"></span></a>
                    <?
                    else:
                        ?>
                        <a class="paging-block__previous" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span class="scoba-left"></span></a>
                    <?
                    endif;
                endif;

                if ($arResult["nStartPage"] < $arResult["NavPageCount"]):
                    $bFirst = false;
                    if($arResult["bSavePage"]):
                        ?>
                        <a class="paging-block__first" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>">1</a>
                    <?
                    else:
                        ?>
                        <a class="paging-block__first" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
                    <?
                    endif;

                    if ($arResult["nStartPage"] < ($arResult["NavPageCount"] - 1)):
                        ?>
                        <span class="paging-block__dots">...</span>
                    <?
                    endif;
                endif;
            endif;
            do
            {
                $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;

                if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                    ?>
                    <span class="<?=($bFirst ? "paging-block__first " : "")?>paging-block__current"><?=$NavRecordGroupPrint?></span>
                <?
                elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
                    ?>
                    <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "paging-block__first" : "")?>"><?=$NavRecordGroupPrint?></a>
                <?
                else:
                    ?>
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
                    ?> class="<?=($bFirst ? "paging-block__first" : "")?>"><?=$NavRecordGroupPrint?></a>

                <?
                endif;

                $arResult["nStartPage"]--;
                $bFirst = false;
            } while($arResult["nStartPage"] >= $arResult["nEndPage"]);

            if ($arResult["NavPageNomer"] > 1):
                if ($arResult["nEndPage"] > 1):
                    if ($arResult["nEndPage"] > 2):
                        ?>
                        <span class="paging-block__dots">...</span>
                    <?
                    endif;
                    ?>
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=$arResult["NavPageCount"]?></a>
                <?
                endif;

                ?>
                <a class="paging-block__next"href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span class="scoba-right"></span></a>
            <?
            endif;

        else:
            $bFirst = true;

            if ($arResult["NavPageNomer"] > 1):
                if($arResult["bSavePage"]):
                    ?>
                    <a class="paging-block__previous" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span class="scoba-left"></span></a>
                <?
                else:
                    if ($arResult["NavPageNomer"] > 2):
                        ?>
                        <a class="paging-block__previous" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span class="scoba-left"></span></a>
                    <?
                    else:
                        ?>
                        <a class="paging-block__previous" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span class="scoba-left"></span></a>
                    <?
                    endif;

                endif;

                if ($arResult["nStartPage"] > 1):
                    $bFirst = false;
                    if($arResult["bSavePage"]):
                        ?>
                        <a class="paging-block__first" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a>
                    <?
                    else:
                        ?>
                        <a class="paging-block__first" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
                    <?
                    endif;

                    if ($arResult["nStartPage"] > 2):
                        ?>
                        <span class="paging-block__dots">...</span>
                    <?
                    endif;
                endif;
            endif;

            do
            {
                if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                    ?>
                    <span class="<?=($bFirst ? "paging-block__first " : "")?>paging-block__current"><?=$arResult["nStartPage"]?></span>
                <?
                elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
                    ?>
                    <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "paging-block__first" : "")?>"><?=$arResult["nStartPage"]?></a>
                <?
                else:
                    ?>
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
                    ?> class="<?=($bFirst ? "paging-block__first" : "")?>"><?=$arResult["nStartPage"]?></a>
                <?
                endif;

                $arResult["nStartPage"]++;
                $bFirst = false;
            } while($arResult["nStartPage"] <= $arResult["nEndPage"]);

            if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
                if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
                    if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
                        ?>
                        <span class="paging-block__dots">...</span>
                    <?
                    endif;
                    ?>
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
                <?
                endif;
                ?>
                <a class="paging-block__next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span class="scoba-right"></span></a>
            <?
            endif;
        endif;

        if ($arResult["bShowAll"]):
            if ($arResult["NavShowAll"]):
                ?>
                <a class="blog-page-pagen" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0"><?=GetMessage("nav_paged")?></a>
            <?
            else:
                ?>
                <a class="blog-page-all" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1"><?=GetMessage("nav_all")?></a>
            <?
            endif;
        endif
        ?>
    </div>
    <?
}
?>