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
$arGroups = Array();
?>
<?$APPLICATION->SetTitle($arResult['NAME'].' | Park Kultury Nursery');?>
<section class="home-top home-top--about nursery">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="home-top__text">
          <div class="teachers__item teachers__item--page">
      			<div class="teachers__img teachers__img--page">
      				<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>">
      			</div>
      			<div class="teacher__info">
      				<h1><?=$arResult["NAME"]?></h1>
      				<div class="teacher__position">
      					<?foreach ($arResult["PROPERTIES"]["position"]["VALUE"] as $position):?>
      						<h4><?=$position?></h4>
      					<?endforeach;?>
      					<?foreach ($arResult["PROPERTIES"]["groups"]["VALUE"] as $group):?>
                  <?array_push($arGroups,$group)?>
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
      					<?foreach ($arResult["PROPERTIES"]["clubs"]["VALUE"] as $group):?>
                  <?array_push($arGroups,$group)?>
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
              <div class="teachers__language">
                  <div class="teachers__icon">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/icons/lang.svg"/>
                    Родной язык:
                  </div>
      						<h4><?=$arResult["PROPERTIES"]["language"]["VALUE"]?></h4>
              </div>
              <div class="teachers__education">
                <div class="teachers__icon">
                  <img src="<?=SITE_TEMPLATE_PATH?>/img/icons/education.svg"/>
                  Образование:
                </div>
                <?foreach ($arResult["PROPERTIES"]["education"]["VALUE"] as $education):?>
      						<h4><?=$education?></h4>
      					<?endforeach;?>
              </div>
      			</div>
      		</div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="home-top__gallery home-top__gallery--teacher">
          <?foreach ($arResult["PROPERTIES"]["gallery"]['VALUE'] as $photo):?>
    				<?$arFile = CFile::GetFileArray($photo); ?>
    				<a class="gallery" rel="group<?=$i?>" href="<?=$arFile["SRC"]?>">
    					<img src="<?=$arFile["SRC"]?>"/>
    				</a>
    			<?endforeach;?>
        </div>
        <?=$arResult["DETAIL_TEXT"]?>
      </div>
      <div class="col-lg-12">
        <div class="teachers__quote">
          <div class="teachers__quote__inner">
            <?=htmlspecialcharsBack($arResult["PROPERTIES"]["quote"]["VALUE"]["TEXT"])?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="nursery-groups">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="h2">Группы и клубы</h2>
      </div>
      <?
      $GLOBALS['arFilter'] = Array('ID' => $arGroups);
      $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "groups_nursery",
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
              "IBLOCK_ID" => "1",
              "IBLOCK_TYPE" => "nursery",
              "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
              "INCLUDE_SUBSECTIONS" => "Y",
              "MESSAGE_404" => "",
              "NEWS_COUNT" => "21",
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
              "PROPERTY_CODE" => array("icon","age"),
              "SET_BROWSER_TITLE" => "N",
              "SET_LAST_MODIFIED" => "N",
              "SET_META_DESCRIPTION" => "N",
              "SET_META_KEYWORDS" => "N",
              "SET_STATUS_404" => "N",
              "SET_TITLE" => "N",
              "SHOW_404" => "N",
              "SORT_BY1" => "sort",
              "SORT_BY2" => "rand",
              "SORT_ORDER1" => "ASC",
              "SORT_ORDER2" => "ASC",
              "STRICT_SECTION_CHECK" => "N"
            )
       );?>
       <?
       $GLOBALS['arFilter'] = Array('ID' => $arGroups);
       $APPLICATION->IncludeComponent(
             "bitrix:news.list",
             "groups_nursery",
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
               "IBLOCK_ID" => "3",
               "IBLOCK_TYPE" => "clubs",
               "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
               "INCLUDE_SUBSECTIONS" => "Y",
               "MESSAGE_404" => "",
               "NEWS_COUNT" => "21",
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
               "PROPERTY_CODE" => array("icon","age"),
               "SET_BROWSER_TITLE" => "N",
               "SET_LAST_MODIFIED" => "N",
               "SET_META_DESCRIPTION" => "N",
               "SET_META_KEYWORDS" => "N",
               "SET_STATUS_404" => "N",
               "SET_TITLE" => "N",
               "SHOW_404" => "N",
               "SORT_BY1" => "sort",
               "SORT_BY2" => "rand",
               "SORT_ORDER1" => "ASC",
               "SORT_ORDER2" => "ASC",
               "STRICT_SECTION_CHECK" => "N"
             )
        );?>
    </div>
  </div>
</section>
