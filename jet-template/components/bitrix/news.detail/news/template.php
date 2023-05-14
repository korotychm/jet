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
<?$APPLICATION->SetTitle($arResult['NAME'].' | Park Kultury Nursery');?>
<section class="home-top home-top--about nursery">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="home-top__text">
          <div class="group__item group__item--page">
      			<div class="group__info">
      				<h1><?=$arResult['NAME']?></h1>
              <?
							$res = CIBlockElement::GetByID($arResult["PROPERTIES"]["category"]["VALUE"]);
							if($ar_res = $res->GetNext());
							?>
              <div style="display:flex; align-items: center;">
        				<p style='margin-bottom: 15px; margin-right: 20px;'><?=$ar_res['NAME']?></p>
                <div class="news__icon" style='margin-bottom: 15px;'>
      						<div class="news__icon__icon">
      							<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/calendar.svg" />
      							<?if ($arResult['ACTIVE_FROM']!=''):?>
      								<?=substr($arResult['ACTIVE_FROM'],0,10)?>
      							<?else:?>
      								<?=substr($arResult['TIMESTAMP_X'],0,10)?>
      							<?endif;?>
      						</div>
      					</div>
              </div>
      			</div>
            <div class="detailed">
              <?=$arResult["DETAIL_TEXT"]?>
            </div>
      		</div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="home-top__gallery">
          <?foreach ($arResult["PROPERTIES"]["gallery"]['VALUE'] as $photo):?>
    				<?$arFile = CFile::GetFileArray($photo); ?>
    				<a class="gallery" rel="group<?=$i?>" href="<?=$arFile["SRC"]?>">
    					<img src="<?=$arFile["SRC"]?>"/>
    				</a>
    			<?endforeach;?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="news-grid">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="h2">Другие новости</h2>
      </div>
      <?
      $GLOBALS['arFilter']=Array('!ID'=>$arResult['ID']);
      $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "news_news",
            Array(
              "ACTIVE_DATE_FORMAT" => "d.m.Y",
              "ADD_SECTIONS_CHAIN" => "Y",
              "AJAX_MODE" => "N",
              "AJAX_OPTION_ADDITIONAL" => "",
              "AJAX_OPTION_HISTORY" => "N",
              "AJAX_OPTION_JUMP" => "N",
              "AJAX_OPTION_STYLE" => "Y",
              "CACHE_FILTER" => "N",
              "CACHE_GROUPS" => "Y",
              "CACHE_TIME" => "36000000",
              "CACHE_TYPE" => "A",
              "CHECK_DATES" => "Y",
              "DETAIL_URL" => "",
              "DISPLAY_BOTTOM_PAGER" => "Y",
              "DISPLAY_DATE" => "Y",
              "DISPLAY_NAME" => "Y",
              "DISPLAY_PICTURE" => "Y",
              "DISPLAY_PREVIEW_TEXT" => "Y",
              "DISPLAY_TOP_PAGER" => "N",
              "FIELD_CODE" => array("",""),
              "FILTER_NAME" => "arFilter",
              "HIDE_LINK_WHEN_NO_DETAIL" => "N",
              "IBLOCK_ID" => "10",
              "IBLOCK_TYPE" => "news",
              "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
              "INCLUDE_SUBSECTIONS" => "Y",
              "MESSAGE_404" => "",
              "NEWS_COUNT" => "30",
              "PAGER_BASE_LINK_ENABLE" => "N",
              "PAGER_DESC_NUMBERING" => "N",
              "PAGER_DESC_NUMBERING_CACHE_TIME" => "1",
              "PAGER_SHOW_ALL" => "N",
              "PAGER_SHOW_ALWAYS" => "N",
              "PAGER_TEMPLATE" => ".default",
              "PAGER_TITLE" => "Новости",
              "PARENT_SECTION" => "",
              "PARENT_SECTION_CODE" => "",
              "PREVIEW_TRUNCATE_LEN" => "",
              "PROPERTY_CODE" => Array("category"),
              "SET_BROWSER_TITLE" => "N",
              "SET_LAST_MODIFIED" => "N",
              "SET_META_DESCRIPTION" => "N",
              "SET_META_KEYWORDS" => "N",
              "SET_STATUS_404" => "N",
              "SET_TITLE" => "N",
              "SHOW_404" => "N",
              "SORT_BY1" => "ACTIVE_FROM",
              "SORT_BY2" => "DATE_CREATE",
              "SORT_ORDER1" => "DESC",
              "SORT_ORDER2" => "DESC",
              "STRICT_SECTION_CHECK" => "N"
            )
       );?>
    </div>
  </div>
</section>
