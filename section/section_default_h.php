<section class="top-section">
    <div class="container">
        <? //require($_SERVER["DOCUMENT_ROOT"]."/section/bredcrumbs.php");?>
        <?php $APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "setin_bread",
            Array(
                "PATH" => "",
                "SITE_ID" => "s1",
//                "START_FROM" => "0"
            )
        );?>
        <div class="top-section__body">
            <div class="top-section__title">
                <h1><?=$row['PROPERTY_H1_VALUE'];?></h1>
                <?//$row['DETAIL_TEXT']; - Соджержание страницы?>
                <span></span>
            </div>
            <div class="top-section__img contacts-map">
                <iframe
                    src="https://yandex.ua/map-widget/v1/?um=constructor%3A2b21023250797ec2f79fc6cbc1bd1292e992940e8827fbe62ffffd0cd483a071&source=constructor"
                    width="100%" height="100%" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</section>