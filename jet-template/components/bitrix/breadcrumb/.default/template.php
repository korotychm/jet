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

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()

$strReturn .= '<div class="breadcrumbs-container"><div class="bx-breadcrumb container" itemprop="https://schema.org/breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++){
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '/' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1){
		$strReturn .= '
			<div class="bx-breadcrumb-item" id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				'.$arrow.'
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url">
					<span itemprop="name">'.$title.'</span>
				</a>
				<meta itemprop="position" content="'.($index + 1).'" />
			</div>';
	}else{
		$strReturn .= '
			<div class="bx-breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				'.$arrow.'
				<span itemprop="name">'.$title.'</span>
				<meta itemprop="position" content="'.($index + 1).'" />
			</div>';
	}
}

$strReturn .= '<div style="clear:both"></div></div></div>';

return $strReturn;
