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
	<div class="col-lg-4 news-grid__item category<?=$arItem["PROPERTIES"]["category"]["VALUE"]?>">
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news__item">
			<div class="news__img">
				<div style='background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)'></div>
			</div>
			<div class="news__info">
				<h3><?=$arItem["NAME"]?></h3>
				<div class="news__bottom">
							<?
							$res = CIBlockElement::GetByID($arItem["PROPERTIES"]["category"]["VALUE"]);
							if($ar_res = $res->GetNext());
							?>
							<h4><?=$ar_res['NAME']?></h4>
					<div class="news__icon">
						<div class="news__icon__icon">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/calendar.svg" />
							<?if ($arItem['ACTIVE_FROM']!=''):?>
								<?=substr($arItem['ACTIVE_FROM'],0,10)?>
							<?else:?>
								<?=substr($arItem['TIMESTAMP_X'],0,10)?>
							<?endif;?>
						</div>
					</div>
				</div>
				<p><?=$arItem["PREVIEW_TEXT"]?>...</p>
			</div>
		</a>
	</div>
<?endforeach;?>
