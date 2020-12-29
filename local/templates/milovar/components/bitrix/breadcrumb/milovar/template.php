<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

switch ($APPLICATION->GetCurPage(false)){

    case "/personal/cart/":
        unset($arResult[1]);
    break;

    case "/personal/order/make/":
        $arResult[1] = [
            "TITLE" => "Корзина",
            "LINK" => "/personal/cart/"
        ];
        $arResult[2]['TITLE'] = "Оформление заказа";
    break;
}

$arResult = array_values($arResult);

$itemSize = count($arResult);

if(isset($GLOBALS['parent_url_tovar'])){
    $strReturn .= "<div class='breadcrumbs__prev'><a href='" . $GLOBALS['parent_url_tovar'] . "' class='breadcrumbs__prev-link'><span class='breadcrumbs__prev-arr'></span>Вернуться к списку товаров</a></div>";
}

$strReturn .= "<div class='breadcrumbs__list' itemprop=\"http://schema.org/breadcrumb\" itemscope itemtype=\"http://schema.org/BreadcrumbList\">";

for($index = 0; $index < $itemSize; $index++){
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '<div class="breadcrumbs__separ"><span class="breadcrumbs__item-text">-</span></div>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1){
		$strReturn .= $arrow . '<div class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a class="breadcrumbs__item-link" href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item">
					<span class="breadcrumbs__item-text" itemprop="name">'.$title.'</span>
				</a>
				<meta itemprop="position" content="'.($index + 1).'" />
			</div>';

	}else{
		$strReturn .= $arrow . '<div class="breadcrumbs__item">
				<span class="breadcrumbs__item-text">'.$title.'</span>
			</div>';
	}
}

$strReturn .= "</div>";

return $strReturn;
