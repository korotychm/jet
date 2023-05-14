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

<section class="home-top home-top--about" id="mission">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="home-top__text">
          <h1><?=$arResult['NAME']?></h1>
        </div>
      </div>
      <div class="col-lg-4">
           <div class="info-nav">
                  <?$APPLICATION->IncludeComponent(
                  	          "bitrix:news.list",
                  	          "docs_pages",
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
                  	            "CACHE_TIME" => "1",
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
                  	            "FILTER_NAME" => "",
                  	            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                  	            "IBLOCK_ID" => "16",
                  	            "IBLOCK_TYPE" => "org",
                  	            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                  	            "INCLUDE_SUBSECTIONS" => "Y",
                  	            "MESSAGE_404" => "",
                  	            "NEWS_COUNT" => "100",
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
                  	            "PROPERTY_CODE" => array(""),
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
                                $currentPage = $APPLICATION->GetCurDir();
                                if(CModule::IncludeModule("iblock")){
                                    $res = CIBlockSection::GetList(
                                        Array('sort' => 'asc'),
                                        Array('IBLOCK_ID' => 17 , 'ACTIVE' => 'Y')
                                    );
                                while ($row = $res->GetNext()){
                                $link = '/about/docs/'.$row['CODE'].'/';
                                ?>
                                    <a <?=($currentPage == $link)?'class="active"':'href="'.$link.'"'?>><?=$row["NAME"]?></a>
                                <?}}?>


                      			<a href="/teachers/">Преподаватели</a>
          </div>
      </div>
      <div class="col-lg-8">
        <div class="info-content">
          <?=htmlspecialcharsback($arResult["PROPERTIES"]["content"]["VALUE"]["TEXT"])?>
        </div>
      </div>
    </div>
  </div>
  <div class="home-top__wave"></div>
</section>
<style>
  .info-content {
    margin-top: -30px;
    padding: 30px;
    border: 10px solid #fff;
    background: rgba(255,255,255,.5);
  }
  .info-content h2 {
    font-size: 20px;
  }
  .info-content a {
      color: var(--red)
    }
  .info-content h3 {
    margin-top: 30px;
    border-bottom: 2px solid var(--blue);
    margin-bottom: 10px;
    font-size: 16px;
  }
  .info-content p {
    margin: 0;
    font-family: Arial;
  }
  .info-nav {
    margin-top: -30px;
    margin-bottom: 100px;
  }
  .info-nav a {
    display: block;
    width: 100%;
    color: inherit;
    padding: 8px 0;
    text-decoration: none;
    transition: .5s;
    font-size: 18px;
    font-weight: 600;
  }
  .info-nav a:hover,
  .info-nav a.active {
    color: var(--red);
  }
</style>
