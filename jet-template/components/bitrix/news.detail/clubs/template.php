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
              <?if ($arResult["PROPERTIES"]["age"]["VALUE"]!=''):?>
      				    <p style='margin-bottom: 15px;'>Возраст: <b><?=$arResult["PROPERTIES"]["age"]["VALUE"]?></b></p>
              <?endif;?>
              <?if ($arResult["PROPERTIES"]["time"]["VALUE"]!=''):?>
                  <p style='margin-bottom: 15px;'>Длительность: <b><?=$arResult["PROPERTIES"]["time"]["VALUE"]?></b></p>
              <?endif;?>
              <div class="group-price">
                <?if ($arResult["PROPERTIES"]["price1"]["VALUE"]!=''):?>
                  <div class="group-price__item">
                    <p>Стоимость единичного<br>занятия:</p><p><span style="font-family: Arial;"><?=$arResult["PROPERTIES"]["price1"]["VALUE"]?><img style="width: 12px;" src="<?=SITE_TEMPLATE_PATH?>/img/icons/ruble.svg?v=2" /></span></p>
                  </div>
                <?endif;?>
                <?if ($arResult["PROPERTIES"]["price2"]["VALUE"]!=''):?>
                  <div class="group-price__item">
                    <p>Стоимость занятия при<br>покупке абонемента:</p><p><span style="font-family: Arial;"><?=$arResult["PROPERTIES"]["price2"]["VALUE"]?><img style="width: 12px;" src="<?=SITE_TEMPLATE_PATH?>/img/icons/ruble.svg?v=2" /></span></p>
                  </div>
                <?endif;?>
              </div>
      			</div>
            <div class="detailed">
              <?=$arResult["DETAIL_TEXT"]?>
              <div class="wow slideInLeft" style="margin-top: 30px;"><a class="btn anchor" href="#clubsform">Записаться</a><a href="#timetable" class="btn anchor btn--sec">Расписание</a></div>
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
        <p>В Публичной Оферте, которую вы можете найти по <a style="color: var(--red);" href="/oferta.pdf" target="_blank">данной ссылке</a>, изложены основные правила, положения и существенные условия предоставления услуг Детским Садом «Park Kultury Nursery».</p>
        <p>Акцепт оферты означает, что вы согласны со всеми положениями настоящего предложения, и равносилен заключению договора оказания услуг. Датой заключения договора считается дата внесения оплаты. По <a style="color: var(--red);" href="/payment.pdf" target="_blank">данной ссылке</a> вы можете найти квитанцию для оплаты.</p>
        <form class="leadform" id="clubsform">
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
<section class="timetable" id="timetable">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="h2">Расписание клуба</h2>
      </div>
      <div class="col-lg-12">
        <div class="timetable__table">
          <div class="timetable__day">
            <h3 class="h4">Понедельник</h3>
            <?$GLOBALS['arFilter'] = Array("PROPERTY_club" => $arResult['ID'],"PROPERTY_day_VALUE" => Array('Понедельник','Monday'));?>
            <?$APPLICATION->IncludeComponent(
                  "bitrix:news.list",
                  "timetable_clubs",
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
                    "IBLOCK_ID" => "14",
                    "IBLOCK_TYPE" => "clubs",
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
                    "PROPERTY_CODE" => array("day","time","club"),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "PROPERTY_time",
                    "SORT_BY2" => "rand",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N"
                  )
             );?>
          </div>
          <div class="timetable__day">
            <h3 class="h4">Вторник</h3>
            <?$GLOBALS['arFilter'] = Array("PROPERTY_club" => $arResult['ID'],"PROPERTY_day_VALUE" => Array('Вторник','Tuesday'));?>
            <?$APPLICATION->IncludeComponent(
                  "bitrix:news.list",
                  "timetable_clubs",
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
                    "IBLOCK_ID" => "14",
                    "IBLOCK_TYPE" => "clubs",
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
                    "PROPERTY_CODE" => array("day","time","club"),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "PROPERTY_time",
                    "SORT_BY2" => "rand",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N"
                  )
             );?>
          </div>
          <div class="timetable__day">
            <h3 class="h4">Среда</h3>
            <?$GLOBALS['arFilter'] = Array("PROPERTY_club" => $arResult['ID'],"PROPERTY_day_VALUE" => Array('Среда','Wednesday'));?>
            <?$APPLICATION->IncludeComponent(
                  "bitrix:news.list",
                  "timetable_clubs",
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
                    "IBLOCK_ID" => "14",
                    "IBLOCK_TYPE" => "clubs",
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
                    "PROPERTY_CODE" => array("day","time","club"),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "PROPERTY_time",
                    "SORT_BY2" => "rand",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N"
                  )
             );?>
          </div>
          <div class="timetable__day">
            <h3 class="h4">Четверг</h3>
            <?$GLOBALS['arFilter'] = Array("PROPERTY_club" => $arResult['ID'],"PROPERTY_day_VALUE" => Array('Четверг','Thursday'));?>
            <?$APPLICATION->IncludeComponent(
                  "bitrix:news.list",
                  "timetable_clubs",
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
                    "IBLOCK_ID" => "14",
                    "IBLOCK_TYPE" => "clubs",
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
                    "PROPERTY_CODE" => array("day","time","club"),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "PROPERTY_time",
                    "SORT_BY2" => "rand",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N"
                  )
             );?>
          </div>
          <div class="timetable__day">
            <h3 class="h4">Пятница</h3>
            <?$GLOBALS['arFilter'] = Array("PROPERTY_club" => $arResult['ID'],"PROPERTY_day_VALUE" => Array('Пятница','Friday'));?>
            <?$APPLICATION->IncludeComponent(
                  "bitrix:news.list",
                  "timetable_clubs",
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
                    "IBLOCK_ID" => "14",
                    "IBLOCK_TYPE" => "clubs",
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
                    "PROPERTY_CODE" => array("day","time","club"),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "PROPERTY_time",
                    "SORT_BY2" => "rand",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N"
                  )
             );?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="nursery-teachers">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="h2">Преподаватели клуба</h2>
      </div>
    </div>
  </div>
  <div class="teachers-grid">
    <div class="container">
      <div class="row">
        <?
        $GLOBALS['arFilter'] = Array('PROPERTY_clubs' => $arResult['ID']);
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
