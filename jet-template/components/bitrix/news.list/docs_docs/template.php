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
<div class="docs">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	$doc = CFile::GetFileArray($arItem["PROPERTIES"]["doc"]["VALUE"]);
	$size = $doc['FILE_SIZE'] / 1024;
	$unit = 'КБ';
	if ($size > 1024) {
	    $size = $size / 1024;
	    $unit = 'МБ';
	}
	$size = number_format((float)$size, 1, '.', '');
	$cert = '';
	if ($arItem["PROPERTIES"]["cert"]["VALUE"]){
	    $cert = CFile::GetFileArray($arItem["PROPERTIES"]["cert"]["VALUE"]);
	}
	?>
	<div class="doc">
	    <div class="doc__top">
	        <?if ($cert):?>
               <a download href="<?=$cert['SRC']?>" class="doc__cert">
                ЭЦП
                    <div class="doc__dropdown">
                        <div><div>Директор:</div><div>Угрына Наталья Викторовна</div></div>
                        <div><div>Подписано:</div><div><?=$arItem['TIMESTAMP_X']?></div></div>
                        <div><div>Ключ:</div><div>616138F09F521AE0627FF09808A96F3E1CCB0981</div></div>
                    </div>
               </a>
            <?endif;?>
            <a download href="<?=$doc['SRC']?>" class="doc__type"><?=end(explode('.',$doc['ORIGINAL_NAME']))?></a>
            <a download href="<?=$doc['SRC']?>" class="doc__name"><?=$arItem["NAME"]?></a>
	    </div>
	    <div class="doc__bottom">
	        <div class="doc__size"><?=$size?> <?=$unit?></div>
	        <a download href="<?=$doc['SRC']?>">Скачать документ</a>
	        <?if ($cert):?>
               <a download href="<?=$cert['SRC']?>">Скачать подпись</a>
            <?endif;?>
	    </div>
	</div>
<?endforeach;?>
</div>

<style>
    .docs {
            display: flex;
            flex-direction: column;
       }
   .doc {
        display: flex;
        flex-direction: column;
        gap: 15px;
        border-bottom: 2px solid #eee;
        padding: 20px 0;
   }
   .doc:first-child {
        border-top: 2px solid #eee;
   }
   .doc__top {
        display: flex;
        align-items: center;
        gap: 8px;
   }
   .doc__cert {
        position: relative;
        cursor: pointer;
        padding: 5px 8px;
        border: 2px solid var(--red);
        font-weight: bold;
        font-size: 12px;
        flex-shrink: 0;
        text-decoration: none;
        color: var(--red);
   }
   .doc__type {
            cursor: pointer;
            margin-right: 8px;
            padding: 5px 8px;
            border: 2px solid var(--blue);
            font-weight: bold;
            font-size: 12px;
            text-decoration: none;
            text-transform: uppercase;
            color: var(--blue);
   }
   .doc__name {
    text-decoration: none;
    font-size: 18px;
    transition: .3s;
    color: inherit;
   }
   .doc__name:hover {
    color: var(--red);
   }
   .doc__bottom {
           display: flex;
           align-items: center;
           font-size: 12px;
           gap: 16px;
   }
   .doc__size {
        margin-right: 10px;
        opacity: .6;
   }
   .doc__bottom a {
       color: var(--red);
   }
   .doc__dropdown {
        position: absolute;
        bottom: -5px;
        transform: translateX(-50%) translateY(100%);
        left: 50%;
        padding: 10px;
        background: #fff;
        box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        transition: .3s;
        opacity: 0;
        pointer-events: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        gap: 5px;
        font-size: 9px;
        z-index: 5;
        color: var(--text);
   }
   .doc__dropdown h3 {
    margin: 0;
    font-size: 10px;
    font-weight: bold;
   }
   .doc__dropdown > div > div:first-child {
      font-weight: bold;
      opacity: .7;
   }
   .doc__cert:hover .doc__dropdown {
           opacity: 1;
           pointer-events: auto;
   }
   @media (max-width: 767px) {
     .doc__top {
        flex-wrap: wrap;
     }
     .doc__dropdown {
        display: none;
     }
   }
</style>
