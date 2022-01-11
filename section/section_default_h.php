<?
/**
 * @global CMain $APPLICATION
 */

$page = $APPLICATION->GetCurPage();
$h1=$APPLICATION->GetPageProperty('H1');

if(isset($row['PROPERTY_H1_VALUE']) and !empty($row['PROPERTY_H1_VALUE']) ){
    $name=$row['PROPERTY_H1_VALUE'];
}else if(isset($h1) and !empty($h1)){
    $name=$h1;
}else{
    $name='';
}
?>
<section class="top-section">
    <div class="container">
        <?php $APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "setin_bread",
            Array(
                "PATH" => "",
                "SITE_ID" => "s1",
            )
        );?>
        <div class="top-section__body">
            <div class="top-section__title">
                <h1><?=(!empty($name))? $name:$APPLICATION->ShowTitle(false);?></h1>
                <?//$row['DETAIL_TEXT']; - Соджержание страницы?>
            </div>
            <? if($page == "/contacts/"): ?>
                <div class="top-section__img contacts-map">
                    <iframe  src="https://yandex.ua/map-widget/v1/?um=constructor%3A2b21023250797ec2f79fc6cbc1bd1292e992940e8827fbe62ffffd0cd483a071&source=constructor"
                        width="100%" height="100%" frameborder="0"></iframe>
                </div>
            <?endif;?>
        </div>
    </div>
</section>