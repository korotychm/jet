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
	<div class="col-lg-4">
		<div class="group__item wow slideInUp">
			<div class="group__img img">
				<img src="<?=$arItem["DISPLAY_PROPERTIES"]["icon"]["FILE_VALUE"]["SRC"]?>"/>
			</div>
			<div class="group__info">
				<h3 class="h3"><?=$arItem["NAME"]?></h3>
				<p>Возраст: <?=$arItem["PROPERTIES"]["age"]["VALUE"]?></p>
			</div>
			<div class="group__text">
				<?=$arItem["PREVIEW_TEXT"]?>
				<div style="margin-top: 15px;">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="btn group__link" style="margin: 0;">Подробнее</a>
				</div>
			</div>
		</div>
	</div>
<?endforeach;?>
