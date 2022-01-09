<?php
require_once($_SERVER["DOCUMENT_ROOT"]. "/bitrix/modules/main/include/prolog_before.php");
/**
 * @global CMain $APPLICATION
 */
$APPLICATION->SetPageProperty("title", "404 Страница не найдена");
$APPLICATION->SetPageProperty("description", "404 Страница не найдена");
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 Страница не найдена");

require($_SERVER["DOCUMENT_ROOT"] . "/section/section_default_h.php");
?><div class="container">
        <div class="not_found">
            <span> 404</span>
            <span class="text">страница не найдена</span>
        </div>

</div>
<br><?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>