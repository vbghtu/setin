<?
require_once($_SERVER["DOCUMENT_ROOT"]. "/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetPageProperty("title", "Наши работы");
$APPLICATION->SetPageProperty("description", "Наши работы");


CModule::IncludeModule("iblock");
$arSelect = Array("ID", "NAME", "PROPERTY_TIP", "PROPERTY_KOD", "PROPERTY_IMG", "PROPERTY_URL", "PROPERTY_SITE", "PROPERTY_PISMO");
$iclients = CIBlockElement::GetList (Array("sort"=>"ASC"), Array("IBLOCK_ID" => 2), false, false, $arSelect);


while($row = $iclients->GetNext()) {
    if(!empty($row['PROPERTY_IMG_VALUE'])) {
        $clients[$row['ID']]['src']=CFile::ResizeImageGet($row['PROPERTY_IMG_VALUE'], array('width'=>200, 'height'=>140), BX_RESIZE_IMAGE_EXACT, true);
        $clients[$row['ID']]['name']=$row['NAME'];
        $clients[$row['ID']]['text']=$row['PROPERTY_KOD_VALUE']['TEXT'];
        $clients[$row['ID']]['site']=$row['PROPERTY_SITE_VALUE'];
    }
}



//$page = $APPLICATION->GetCurPage();

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Портфолио");
//$APPLICATION->AddChainItem("Наши работы", "/portfolio/");

//while ($ob = $res->GetNextElement()) {
//    $row = $ob->GetFields();
//}
//$page = $APPLICATION->GetCurPage();



//$arSelect = Array("ID", "PROPERTY_SEVEN");
// $res = CIBlockElement::GetList ( array("ID" => "DESC"), Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "!PROPERTY_SEVEN"=>false, "SECTION_ID" => array(2)), false, false, $arSelect);
//$row = array();
//$i_count = 0;
//while($row = $res->GetNext()){
//	$i_count++;
//    $array_i[$row['ID']] = array("i" => $i_count);
//}
//var_dump($res);
//exit;

?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_default_h.php"); ?>
<div class="container">
    <div class="realization__title title">
        <h2>Наши заказчики<strong>.</strong></h2>
    </div>
    <div class="clients__slider swiper clients__slider-portfolio">
            <div class="swiper-slide clients__slider-item clients__slider-item-portfolio">
                <?
                $i=1;
                foreach($clients as $item):
                    if($i<=11 or $i>12):?>
                    <div class="clients__slider-img <?=($i>12)? 'hidden' :'' ?>">
                        <img src="<?=$item['src']['src']?>" alt="<?=$item['name']?>">
                        <a href="<?=$item['site']?>" target="_blank" class="clients__slider-hidden">
                            <div class="tabs__item small-text">
                                <i><?=$item['name']?></i>
                                <p><?if(!empty($item['text'])):?><?=$item['text']?><?else:?>Крупнейшая в мире компания по производству электротехники<?endif?></p>
                                <span class="icon-arrow-rigth clients__slider-arrow"></span>
                            </div>
                        </a>
                    </div>
                    <?elseif($i==12):?>
                    <div class="clients__slider-img">
                        <span class="leaders__btn btnmore">Посмотреть все<span></span></span>
                    </div>

                <? endif; $i++; endforeach;?>

            </div>
    </div>
</div>
<section class="section examples">
    <div class="container">
        <div class="specialization__title title">
            <h2>Примеры работ<strong>.</strong></h2>
        </div>

<?php
//echo  $_SERVER["DOCUMENT_ROOT"];
//$nav = new \Bitrix\Main\UI\PageNavigation("nav-more-news");
//$nav->allowAllRecords(true)
//    ->setPageSize(5)
//    ->initFromUri();
//
//
//$APPLICATION->IncludeComponent(
//    "bitrix:main.pagenavigation",
//    "",
//    array(
//        "NAV_OBJECT" => $nav,
//        "SEF_MODE" => "Y",
//    ),
//    false
//);
        $arSelect = array(
            'ID',
            'NAME',
            'PROPERTY_ONE',
            'PROPERTY_TWO',
            'PROPERTY_THREE',
            'PROPERTY_SEVEN',
            'PROPERTY_FIVE',
            'PROPERTY_FOURTEEN',
            'PREVIEW_PICTURE',
            'DETAIL_PAGE_URL',
            'PREVIEW_PICTURE',

        );

        $numpage = (int) $_GET['PAGEN_1'];

        if(empty($numpage)) {
            $numpage = 1;
        }

        $rsElement = CIBlockElement::GetList(
                array("ID" => "DESC"),
                Array("IBLOCK_ID" => 1,
                    'ACTIVE' => 'Y',
                    "SECTION_ID" => array(9, 2)),
                false,
                Array("nTopCount" => false,"nPageSize"=> 6, "iNumPage" => $numpage, 'checkOutOfRange' => true),
                $arSelect );

ob_start(); // начинаем буферизацию вывода
$APPLICATION->IncludeComponent(
    'bitrix:system.pagenavigation',
    'modern',
    array(
        'NAV_TITLE'   => 'Элементы', // поясняющий текст для постраничной навигации
        'NAV_RESULT'  => $rsElement,  // результаты выборки из базы данных
        'SHOW_ALWAYS' => false       // показывать постраничную навигацию всегда?
    )
);
$navString = ob_get_clean();
// выводим постраничную навигацию
echo $navString;
while( $row = $rsElement->GetNext()){
            $img_obj = CFile::ResizeImageGet($row['PREVIEW_PICTURE'], array('width'=>407, 'height'=>734), BX_RESIZE_IMAGE_EXACT, true);
            $obj['IMAGE'] = $img_obj['src'];
?>
        <div class="examples__card">
            <div class="examples__card-img">
                <img src="<?=$obj['IMAGE']?>" alt="">
            </div>
            <div class="examples__card-content">
                <div class="examples__card-title">
                    <p><?=$row['NAME']?></p>
                </div>
                <div class="examples__card-body">
                    <div class="examples__card-item text">
                        <i>Вид услуги</i>
                        <p>Строительный контроль</p>
                    </div>
                    <div class="examples__card-item text">
                        <i>Задача:</i>
                        <p><?=htmlspecialchars_decode($row['PROPERTY_FIVE_VALUE']['TEXT'])?></p>
                    </div>
                    <div class="examples__card-item text">
                        <i>Решение:</i>
                        <?if(empty($row['PROPERTY_FOURTEEN_VALUE']['TEXT'])):?>
                        <p>Выполнено визуально-инструментальное обследование с последующим поверочным расчётом несущей способности конструкции в программе SCAD</p>
                            <ul>
                                <li>
                                    <p> Подготовлен отчёт о выявленных дефектах несущих конструкции объекта экспертизы и о результатах инструментальнои оценки</p>
                                </li>
                                <li>
                                    <p>Даны рекомендации для восстановления утраченных эксплуатационных качеств строительных конструкции здания</p>
                                </li>
                            </ul>
                        <?else:
                           echo htmlspecialchars_decode($row['PROPERTY_FOURTEEN_VALUE']['TEXT']);
                        endif;?>
                    </div>
                </div>
            </div>
        </div>
    <?    }   ?>

    </div>
</section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_form.php"); ?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>