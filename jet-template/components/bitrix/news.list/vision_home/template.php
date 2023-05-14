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
?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="col-lg-3">
		<div class="vision__item wow slideInUp">
			<div class="vision__img img">
				<img <?if (($arItem["NAME"]=='Общение')||($arItem["NAME"]=='Communication')):?>class="rombus"<?endif;?> src="<?=$arItem["DISPLAY_PROPERTIES"]["icon"]["FILE_VALUE"]["SRC"]?>" />
			</div>
			<h2 class="h3"><?=$arItem["NAME"]?></h2>
			<p class="small-text"><?=$arItem["PREVIEW_TEXT"]?></p>
			<div class="for-popup">
				<?=$arItem["DETAIL_TEXT"]?>
			</div>
		</div>
	</div>
<?endforeach;?>
