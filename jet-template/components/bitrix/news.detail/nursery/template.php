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
      			<div class="group__img">
      				<img src="<?=$arResult["DISPLAY_PROPERTIES"]["icon"]["FILE_VALUE"]["SRC"]?>"/>
      			</div>
      			<div class="group__info">
      				<h1><?=$arResult['NAME']?></h1>
      				<p style='margin-bottom: 15px;'>Возраст: <b><?=$arResult["PROPERTIES"]["age"]["VALUE"]?></b></p>
              <p style='margin-bottom: 15px;'>Длительность: <b><?=$arResult["PROPERTIES"]["time"]["VALUE"]?></b></p>
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
<section class="nursery-vision">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="nursery-vision__item">
    			<div class="nursery-vision__img">
    				<img class="rombus" src="<?=SITE_TEMPLATE_PATH?>/img/icons/vision4.svg" />
    			</div>
    			<div class="nursery-vision__info">
    				<h2 class="h3">Общение</h2>
    				<p>
    					<?=$arResult["PROPERTIES"]["communication"]['VALUE']['TEXT']?>
    				</p>
    			</div>
    		</div>
      </div>
      <div class="col-lg-12">
        <div class="nursery-vision__item">
    			<div class="nursery-vision__img">
    				<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/vision2.svg" />
    			</div>
    			<div class="nursery-vision__info">
    				<h2 class="h3">Любознательность</h2>
    				<p>
    					<?=$arResult["PROPERTIES"]["curiosity"]['VALUE']['TEXT']?>
    				</p>
    			</div>
    		</div>
      </div>
      <div class="col-lg-12">
        <div class="nursery-vision__item">
    			<div class="nursery-vision__img">
    				<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/vision1.svg" />
    			</div>
    			<div class="nursery-vision__info">
    				<h2 class="h3">Культура</h2>
    				<p>
    					<?=$arResult["PROPERTIES"]["culture"]['VALUE']['TEXT']?>
    				</p>
    			</div>
    		</div>
      </div>
      <div class="col-lg-12">
        <div class="nursery-vision__item">
    			<div class="nursery-vision__img">
    				<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/vision3.svg" />
    			</div>
    			<div class="nursery-vision__info">
    				<h2 class="h3">Творчество</h2>
    				<p>
    					<?=$arResult["PROPERTIES"]["creativity"]['VALUE']['TEXT']?>
    				</p>
    			</div>
    		</div>
      </div>
      <div class="col-lg-12">
        <form class="leadform">
          <div class="detsad-form wow slideInUp">
            <div class="row">
              <div class="col-lg-4">
                <input type="text" placeholder="Ваше имя" name="name"></input>
              </div>
              <div class="col-lg-4">
                <input type="email" placeholder="Ваш email" name="email"></input>
              </div>
              <div class="col-lg-4">
                <input class="phoneinput" type="text" placeholder="Ваш телефон" name="phone"></input>
              </div>
              <input type="hidden" name="group" value="<?=$arResult['NAME']?>">
               <div class="col-lg-12 form-btns">
                <button class="btn">Отправить заявку</button>
                <p class="agree">Нажимая на кнопку, вы соглашаетесь на обработку персональных данных на условиях, определенных <a href="/confidence/">Политикой Конфиденциальности</a></p>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<section class="nursery-teachers">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="h2">Учителя группы</h2>
      </div>
    </div>
  </div>
  <div class="teachers-grid">
    <div class="container">
      <div class="row">
        <?
        $GLOBALS['arFilter'] = Array('PROPERTY_groups' => $arResult['ID']);
        $APPLICATION->IncludeComponent(
              "bitrix:news.list",
              "teachers_teachers",
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
                "IBLOCK_ID" => "2",
                "IBLOCK_TYPE" => "teachers",
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
                "PROPERTY_CODE" => Array("position","groups","clubs"),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "rand",
                "SORT_BY2" => "rand",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N"
              )
         );?>
      </div>
    </div>
  </div>
</section>
