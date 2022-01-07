<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Компания СтройЭкспертНадзор. Услуги по техническому надзору и обследованию зданий и сооружений, более 7 лет в Москве, московской области и других регионах РФ.");
$APPLICATION->SetPageProperty("title", "Конаткты");

CModule::IncludeModule("iblock");

$arSelect = array("NAME", "PROPERTY_h1", "DETAIL_TEXT", "ID" => 1935);
$arFilter = array("IBLOCK_ID" => 26, "ID" => 1935);
$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);

while ($ob = $res->GetNextElement()) {
    $row = $ob->GetFields();
}

$metaList = $APPLICATION->GetPagePropertyList();
if (empty($metaList['DESCRIPTION']) || empty($metaList['TITLE'])) {
    $ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(26, 1935);
    $IPROPERTY = $ipropValues->getValues();
    if (empty($metaList['DESCRIPTION'])) {
        $APPLICATION->SetPageProperty("description", $IPROPERTY['ELEMENT_META_DESCRIPTION']);
    }
    if (empty($metaList['TITLE'])) {
        $APPLICATION->SetTitle($IPROPERTY['ELEMENT_META_TITLE']);
    }
}
?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_default_h.php"); ?>
    <section class="section page-contacts page-contacts-special">
        <div class="container">
            <div class="page-contacts__body text">
                <p>АДРЕС</p>
                <i> <?= $GLOBALS['arProps']['addres']['VALUE'] ?></i>
                <p>Телефон</p>
                <a href="tel:<?= $GLOBALS['arProps']['phone']['VALUE'] ?>" class="mail page-contacts__mail">
                    <?= $GLOBALS['arProps']['phone']['VALUE'] ?>
                </a>
                <p>E-mail</p>
                <a href="email:<?= $GLOBALS["arProps"]['email']["VALUE"] ?>" class="mail header__mail">
                    <?= $GLOBALS["arProps"]['email']["VALUE"] ?>
                </a>

                <p>График работы</p>
                <i> <?= $GLOBALS["arProps"]['work_time']["VALUE"] ?></i>
            </div>
            <div class="table-body">
                <div class="wrap-table text">
                    <div class="row">
                        <span class="name">Полное наименование</span>
                        <span class="value"><?= $GLOBALS["arProps"]['name']["VALUE"] ?></span>
                    </div>
                    <div class="row">
                        <span class="name">Сокращённое наименование</span>
                        <span class="value"><?= $GLOBALS["arProps"]['shortName']["VALUE"] ?></span>
                    </div>
                    <div class="row">
                        <span class="name">ИНН</span>
                        <span class="value"><?= $GLOBALS["arProps"]['inn']["VALUE"] ?></span>
                    </div>
                    <div class="row">
                        <span class="name">КПП</span>
                        <span class="value"><?= $GLOBALS["arProps"]['kpp']["VALUE"] ?></span>
                    </div>
                    <div class="row">
                        <span class="name">ОГРН</span>
                        <span class="value"><?= $GLOBALS["arProps"]['ogrn']["VALUE"] ?></span>
                    </div>
                    <div class="row">
                        <span class="name">ОКПО</span>
                        <span class="value"><?= $GLOBALS["arProps"]['okpo']["VALUE"] ?></span>
                    </div>
                    <div class="row">
                        <span class="name">р/с</span>
                        <span class="value"><?= $GLOBALS["arProps"]['ps']["VALUE"] ?></span>
                    </div>
                    <div class="row">
                        <span class="name">Наименование банка</span>
                        <span class="value"><?= $GLOBALS["arProps"]['BankName']["VALUE"] ?></span>
                    </div>
                    <div class="row">
                        <span class="name">БИК</span>
                        <span class="value"><?= $GLOBALS["arProps"]['bik']["VALUE"] ?></span>
                    </div>
                    <div class="row">
                        <span class="name">Кор.счет</span>
                        <span class="value"><?= $GLOBALS["arProps"]['korschet']["VALUE"] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_form.php"); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>