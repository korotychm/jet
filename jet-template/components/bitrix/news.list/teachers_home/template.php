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
	<a class="teachers__item" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
		<div class="teachers__img img">
			<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>">
		</div>
		<div class="teacher__info">
			<h3><?=$arItem["NAME"]?></h3>
			<div class="teacher__position">
				<?foreach ($arItem["PROPERTIES"]["position"]["VALUE"] as $position):?>
					<h4><?=$position?></h4>
				<?endforeach;?>
				<?foreach ($arItem["PROPERTIES"]["groups"]["VALUE"] as $group):?>
					<div class="teacher__icon">
						<?$db_props = CIBlockElement::GetProperty(1, $group, "sort", "asc", array());
							$PROPS = array();
							while($ar_props = $db_props->Fetch())
							$PROPS[$ar_props['CODE']] = $ar_props['VALUE'];
							$arFile = CFile::GetFileArray($PROPS['icon']);
						?>
						<img src="<?=$arFile["SRC"]?>"/>
					</div>
				<?endforeach;?>
				<?foreach ($arItem["PROPERTIES"]["clubs"]["VALUE"] as $group):?>
					<div class="teacher__icon">
						<?$db_props = CIBlockElement::GetProperty(3, $group, "sort", "asc", array());
							$PROPS = array();
							while($ar_props = $db_props->Fetch())
							$PROPS[$ar_props['CODE']] = $ar_props['VALUE'];
							$arFile = CFile::GetFileArray($PROPS['icon']);
						?>
						<img src="<?=$arFile["SRC"]?>"/>
					</div>
				<?endforeach;?>
			</div>
		</div>
	</a>
<?endforeach;?>
