<?
require_once($_SERVER["DOCUMENT_ROOT"]. "/bitrix/modules/main/include/prolog_before.php");
/**
 * @global CMain $APPLICATION
 */
CModule::IncludeModule("iblock");
$arSelect = array(
    'ID',    'NAME',    'PROPERTY_ONE',
    'PROPERTY_TWO',    'PROPERTY_THREE',
    'PROPERTY_SEVEN',    'PROPERTY_FIVE',
    'PROPERTY_FOURTEEN',    'PREVIEW_PICTURE',
    'DETAIL_PAGE_URL',    'PREVIEW_PICTURE',
);

$numpage = (int) $_GET['PAGEN_1'];
if(empty($numpage)) {
    $numpage = 1;
}


$rsElement = CIBlockElement::GetList(
    array("ID" => "DESC"),
    Array("IBLOCK_ID" => 1,
        'ACTIVE' => 'Y',
        "SECTION_ID" => array(15)),
    false,
    Array("nTopCount" => false,"nPageSize"=> 10, "iNumPage" => $numpage, 'checkOutOfRange' => true),
    $arSelect );


$APPLICATION->SetPageProperty('H1','Коттеджные посёлки');

if($numpage>1){
    $APPLICATION->AddChainItem("Страница ".$numpage, "");
    $APPLICATION->SetTitle("Коттеджные посёлки – примеры работ компании СтройЭкспертНадзор - Страница ".$numpage);
    $APPLICATION->SetPageProperty("description", "Портфолио компании СтройЭкспертНадзор в области Коттеджные посёлки с подробным описанием объектов и фото. Страница ".$numpage);

}else{
    $APPLICATION->SetTitle("Коттеджные посёлки – примеры работ компании СтройЭкспертНадзор");
    $APPLICATION->SetPageProperty("description", "Портфолио компании СтройЭкспертНадзор в области Коттеджные посёлки с подробным описанием объектов и фото.");

}

if($numpage > $rsElement->NavPageCount ){
    include($_SERVER["DOCUMENT_ROOT"]."/404.php");
    return;
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_default_h.php"); ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_clients.php");?>

    <section class="section examples">
        <div class="container">
            <div class="specialization__title title">
                <h2>Коттеджные посёлки - Примеры работ<strong>.</strong></h2>
            </div>

            <?php
            while( $row = $rsElement->GetNext()){
                $img_obj = CFile::ResizeImageGet($row['PREVIEW_PICTURE'], array('width'=>407, 'height'=>734), BX_RESIZE_IMAGE_EXACT, true);
                $obj['IMAGE'] = $img_obj['src'];
                ?>
                <div class="examples__card">
                    <div class="examples__card-img">
                        <img src="<?=$obj['IMAGE']?>" alt="<?=$row['NAME']?>">
                    </div>
                    <div class="examples__card-content">
                        <div class="examples__card-title">
                            <p><?=$row['NAME']?></p>
                        </div>
                        <div class="examples__card-body">
                            <div class="examples__card-item text">
                                <i>Вид услуги</i>
                                <p>Строительная экспертиза</p>
                            </div>
                            <div class="examples__card-item text">
                                <i>Задача:</i>
                                <p><?if(!empty($row['PROPERTY_FIVE_VALUE']['TEXT'])):?>
                                        <?=htmlspecialchars_decode($row['PROPERTY_FIVE_VALUE']['TEXT'])?>
                                    <?else:?>
                                        Оценка технического состояния и определение несущей способности несущих
                                        конструкций
                                    <?endif;?>
                                </p>
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
            <?
            $APPLICATION->IncludeComponent(
                'bitrix:system.pagenavigation',
                'pagi',
                array(
                    'NAV_TITLE'   => 'Элементы', // поясняющий текст для постраничной навигации
                    'NAV_RESULT'  => $rsElement,  // результаты выборки из базы данных
                    'SHOW_ALWAYS' => false ,      // показывать постраничную навигацию всегда?
                )
            );
            ?>
        </div>

    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>