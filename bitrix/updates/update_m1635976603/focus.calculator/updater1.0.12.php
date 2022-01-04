<?

//Копируем новый templates в папки
$updater->CopyFiles('install/components/templates/.default/', 'components/bitrix/focus.calculator/templates/.default/');
$updater->CopyFiles('install/js/', 'js/focus.calculator/');
$updater->CopyFiles('install/components/templates/.default/lang/en/js_script_mess.js', 'js/focus.calculator/lang/en/js_script_mess.js');
$updater->CopyFiles('install/components/templates/.default/lang/ru/js_script_mess.js', 'js/focus.calculator/lang/ru/js_script_mess.js');

//записываем новые данные по  умолчанию в настройки модуля
COption::SetOptionString("focus.calculator", "captcha", "Y");
COption::SetOptionString("focus.calculator", "log_path", "/upload/focus.calculator_log.txt");
COption::SetOptionString("focus.calculator", "doc_url", "http://2of3.ru/calculators/free/docs/");
COption::SetOptionString("focus.calculator", "doc_text", file_get_contents($_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/focus.calculator/lang/'.LANG.'/readme.txt'));
$rsSites = CSite::GetList($by="sort", $order="asc");
if ($arSite = $rsSites->Fetch())
{ COption::SetOptionString("focus.calculator", "to_mail", $arSite["EMAIL"]); }

?>