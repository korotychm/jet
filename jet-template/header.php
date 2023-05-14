<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
function bclass() {global $APPLICATION; return ''.(($APPLICATION->GetCurPage() == SITE_DIR . 'index.php' || $APPLICATION->GetCurPage() == SITE_DIR) ? 'home' : 'not-home').''; }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=3.0, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="format-detection" content="telephone=no" />
<link rel="preload" href="https://fonts.googleapis.com/css?family=Rubik:400,600,700,900&display=swap&subset=cyrillic" as="style" onload="this.onload=null;this.rel='stylesheet'" />
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap-grid.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" />
<noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap-grid.min.css" /></noscript>
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" />
<noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" /></noscript>
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" />
<noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" /></noscript>
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.css" as="style" onload="this.onload=null;this.rel='stylesheet'" />
<noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.css" /></noscript>
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" />
<noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" /></noscript>
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" />
<noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" /></noscript>
<meta name="yandex-verification" content="b5bfb938406ea2f9" />
<meta name="facebook-domain-verification" content="722fy5w4wdyaitslzfaoykhzvx9dz5" />
<meta name="google-site-verification" content="Gvzt7qe-cdOq6dbFGFzFCSj2ght9_LS3ryEBfc_M6fQ" />
<?$APPLICATION->ShowHead();?>
<link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH?>/img/favicon.png" type="image/x-icon" />
<title><?$APPLICATION->ShowTitle()?></title>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body class="<?echo bclass();?><? if (defined('ERROR_404') || ERROR_404 == 'Y'){ echo ' error404'; }?>">
<header class="header-section">
        <div class="container">
            <div class="header-holder">
                <div class="header-primary d-flex flex-wrap justify-content-between align-items-center">
                    <div class="brand-logo d-none d-lg-inline-block">
                        <div class="logo">
                            <a href="/">
                                <img src="assets/images/logo/logo.png" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="header-wrapper justify-content-lg-end">
                        <div class="mobile-logo d-lg-none">
                            <a href="/"><img src="assets/images/logo/logo.png" alt="logo"></a>
                        </div>
                        <div class="menu-area">
                            <ul class="menu">
                                <li>
                                    <a href="/news/">Новости</a>
                                </li>
                                <li>
                                    <a href="/promocodes/">Промокоды</a>
                                </li>
                                <li><a href="/support/">Поддержка</a></li>
                            </ul>
                            <a class="wallet-btn" href="/reg/" >
                                <span>ВХОД / РЕГИСТРАЦИЯ</span> <i style="margin-left: 15px;" class="fa-solid fa-user"></i></a>
                            <!-- toggle icons -->
                            <div class="header-bar d-lg-none">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </header>
<? if ($APPLICATION->GetCurPage(true) !== SITE_DIR."index.php" && ERROR_404 != "Y") { ?>
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "", array("START_FROM" => "0", "PATH" => "", "SITE_ID" => "-"), false, Array('HIDE_ICONS' => 'Y'));?>
<?}?>
