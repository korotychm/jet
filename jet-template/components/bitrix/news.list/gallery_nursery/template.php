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
$i=0;
?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$i++;
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="col-lg-12 about__item">
		<h2 class="h2"><?=$arItem["NAME"]?></h2>
		<div class="about__gallery">
			<?foreach ($arItem["PROPERTIES"]["gallery"]['VALUE'] as $photo):?>
				<?$arFile = CFile::GetFileArray($photo); ?>
				<a class="gallery" data-fancybox-group="group<?=$i?>" href="<?=$arFile["SRC"]?>">
					<img src="<?=$arFile["SRC"]?>"/>
				</a>
			<?endforeach;?>
		</div>
	</div>
<?endforeach;?>
