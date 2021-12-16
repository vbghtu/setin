<?
$MESS["MCACHE_TITLE"] = "Настройка на кеширането";
$MESS["MAIN_OPTION_HTML_CACHE"] = "Управление на генерацията на HTML страниците";
$MESS["MAIN_TAB_3"] = "Почистване на файлове от кеша";
$MESS["MAIN_TAB_2"] = "HTML кеш";
$MESS["MAIN_TAB_4"] = "Кеширане на компонентите";
$MESS["MAIN_OPTION_CLEAR_CACHE"] = "Почистване на файлове от кеша";
$MESS["MAIN_OPTION_PUBL"] = "Настройка на кеширането на компонентите";
$MESS["MAIN_OPTION_CLEAR_CACHE_OLD"] = "Само остарели";
$MESS["MAIN_OPTION_CLEAR_CACHE_ALL"] = "Всички";
$MESS["MAIN_OPTION_CLEAR_CACHE_MENU"] = "Меню";
$MESS["MAIN_OPTION_CLEAR_CACHE_MANAGED"] = "Всеки управлявани кешове";
$MESS["MAIN_OPTION_CLEAR_CACHE_STATIC"] = "Всички страници на HTML кеша";
$MESS["MAIN_OPTION_CLEAR_CACHE_CLEAR"] = "Почисти";
$MESS["MAIN_OPTION_CACHE_ON"] = "Авто кеша на компонентите е включено";
$MESS["MAIN_OPTION_CACHE_OFF"] = "Авто кеша на компонентите е изключено";
$MESS["MAIN_OPTION_CACHE_BUTTON_OFF"] = "Изключи авто кеша";
$MESS["MAIN_OPTION_CACHE_BUTTON_ON"] = "Включи авто кеша";
$MESS["MAIN_OPTION_HTML_CACHE_WARNING"] = "Внимание! Модула на статистиката или рекламата са отворени.Отчета на HTML кеша  ще се води некоректно";
$MESS["MAIN_OPTION_HTML_CACHE_WARNING_TRANSID"] = "Внимание! Включен е параметъра session.use_trans_sid. HTML кеша няма да работи.";
$MESS["MAIN_OPTION_HTML_CACHE_ON"] = "HTML кеша е включен";
$MESS["MAIN_OPTION_HTML_CACHE_OFF"] = "HTML кеша е изключен";
$MESS["MAIN_OPTION_HTML_CACHE_BUTTON_OFF"] = "Изключи HTML кеша";
$MESS["MAIN_OPTION_HTML_CACHE_BUTTON_ON"] = "Включи HTML кеша";
$MESS["MAIN_OPTION_HTML_CACHE_OPT"] = "Настройка на HTML кеша";
$MESS["MAIN_OPTION_HTML_CACHE_INC_MASK"] = "Маска на включване";
$MESS["MAIN_OPTION_HTML_CACHE_EXC_MASK"] = "Маска на изключение";
$MESS["MAIN_OPTION_HTML_CACHE_QUOTA"] = "Дискова квота (мега байта)";
$MESS["MAIN_OPTION_HTML_CACHE_SUCCESS"] = "Режима за създаването на HTML кеша е успешно променен.";
$MESS["MAIN_OPTION_HTML_CACHE_STAT"] = "Статистика";
$MESS["MAIN_OPTION_HTML_CACHE_STAT_HITS"] = "Кеш хитове";
$MESS["MAIN_OPTION_HTML_CACHE_STAT_MISSES"] = "Кеш пропуска";
$MESS["MAIN_OPTION_HTML_CACHE_STAT_QUOTA"] = "Почистване на кеша заради ограниченото дисково пространство";
$MESS["MAIN_OPTION_HTML_CACHE_STAT_POSTS"] = "Почистване на кеша заради модифициране на данните";
$MESS["MAIN_OPTION_HTML_CACHE_SAVE"] = "Запиши настройките на HTML кеша";
$MESS["MAIN_OPTION_HTML_CACHE_RESET"] = "Постави настройките по подразбиране";
$MESS["cache_admin_note4"] = "<p>Механизъма на HTML-кеша е най-добре да се включва на някой рядко проременящ се раздел с регулярни посещения на анонимни посетители, тъй като при включване на HTML-кеша протичат следващите процеси:</p>







<ul style=\"font-size:100%\">







<li>механизъма на HTML-кеша обработва само страниците, не посочени в маската на изключенията и посочени в маската на  включването;</li>







<li>ако на тези страници влиза не авторизиран потребител, то се изпълнява проверка на съществуването на кеш файл, и ако не е намерен, то се предава страницата от кеша, не задействайки модулите на системата; например, няма да  работи модула на статистиката (не се отчитат хитовете), модула на рекламата, главният и другите модули;</li>







<li>при това, ако в момента на включването на кеша е бил задействан модула на компресията, страницата ще се компресира;</li>







<li>ако страницата в кеша не намерена, то кода се изпълнява в нормален режим; когато страницата е напълно оформена, нейното копие се записва в HTML-кеша;</li>







</ul>







<p>Почистване на кеша:</p>







<ul style=\"font-size:100%\">







<li>ако записаният обем е с превишен дисков лимит на кеша, то кеша се почиства напълно;</li>







<li>също така пълното почистване на кеша се извършва при всякакво редактиране на данните в административната част на системата;</li>







<li>ако в публичната част на сайта пртича POST данни (например, добавяне на коментар или гласуване), се отхвърля съответната част на кеша;</li>







</ul>















<p>Необходимо е да се отбележи, че ако не авторизиран потребител премине в не кешираната част на сайта, за него ще започне сесия, и за този посетител HTML-кеша няма повече да  работи.</p>















<p>От всичко по горе казано следва че:</p>







<ul style=\"font-size:100%\">







<li>не се води отчет в статистиката;</li>







<li>модула на рекламата ще работи само в момента на създаването на кеша (това не се отнася  за външна динамична реклама (Google и пр.);</li>







<li>например, за не авторизираните потребители резултатите от сравненията на артикулите, няма да бъдат записани (тъй като неговите данни се запазват в сесията, \"не\");</li>







<li>необходимо е задължително да се  зададе дисков лимит, за да се избегнат DoS-атаките по дисковото пространство;</li>







<li>след включването на механизъма HTML-кеширане, е необходимо да се провери всички функции на раздела, към който е пременен кеша (например, може да не сработи  публикациите на коментарите със старите шаблони на блоговете);</li>







</ul>







";
$MESS["MAIN_OPTION_CACHE_OK"] = "Файловете са почистени от кеша";
$MESS["MAIN_OPTION_CACHE_SUCCESS"] = "Типа на авто кеша на компонентите е успешно превключен";
$MESS["MAIN_OPTION_CACHE_ERROR"] = "Типа на авто кеша на компонентите вече има това значение";
$MESS["cache_admin_note1"] = "<table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">







		<tr>







				<td valign=\"top\">Използването на режима &quot;Авто кеширане&quot; позволява да се ускори работата на сайта в няколко пъти!</td>







		</tr>







		<tr>







				<td valign=\"top\"><br />







				Обърнете внимание: при използването на режима &quot;Авто кеширане&quot;, обновяването на информацията, извеждана от компонентите, протича в съответствие с параметрите на отделните компоненти. </td>







		</tr>







		<tr>







				<td valign=\"top\"><br />







				За да обновите съдържанието на кешираните обекти на страницата, Вие можете: </td>







		</tr>







</table>







<table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">







		<tr>







				<td align=\"center\" valign=\"top\">&nbsp;</td>







		</tr>







		<tr>







				<td valign=\"top\">1. Преминете на нужната страница и обновете нейното съдържание, чрез специален бутон в контролният панел за почистване на кешираната информация.<br />







				<img src=\"/bitrix/images/main/page_cache.png\" width=\"288\" height=\"108\" vspace=\"5\" /></td>







		</tr>







		<tr>







				<td align=\"center\" valign=\"top\">&nbsp;</td>







		</tr>







		<tr>







				<td valign=\"top\">2. В режим Редактиране на сайта използвайте бутоните за почистване на кеша в панела на отделните компоненти.<br />







				<img src=\"/bitrix/images/main/comp_cache.png\" width=\"275\" height=\"83\" vspace=\"5\" /></td>







		</tr>







		<tr>







				<td valign=\"top\">&nbsp;</td>







		</tr>







		<tr>















				<td valign=\"top\">3. Необходимо е преминаването към настройките на избраните компоненти и да включете режим на работа без кеширане. <br>







				<img src=\"/bitrix/images/main/spisok.gif\" width=\"180\" height=\"62\" vspace=\"5\" /></td>







				</tr>







</table>







<br />







<p>Забележка: При включване на режима авто кеширане на компонентите, компонентите с настройка на кеширане <i>\"Авто\"</i> ще бъдат  преведени в режим на работа с кеширане.<br />







<br />







Компонентите с настройка на кеширане <i>\"Кешира\"</i> и време за кеширане по голямо от нула, винаги ще  работят в режим на кеширане.<br />







<br />







Компонентите с настройка на кеширането <i>\"Не кешира \"</i> или  с време за кеширане равно на нула, винаги ще работят без кеширане.</p>";
$MESS["cache_admin_note2"] = "След премахването на кеш файловете, данните ще бъдат обновени до актуалното им състояние.







                Новите кеш файлове ще се създават постепенно, според посещенията на страниците с кешираните области.";
$MESS["main_cache_managed_saved"] = "Настройките на управляваният кеш са записани.";
$MESS["main_cache_managed"] = "Управляван кеш";
$MESS["main_cache_managed_sett"] = "Настройка на кеширането";
$MESS["main_cache_managed_on"] = "Кеширането на компонентите е включено.";
$MESS["main_cache_managed_off"] = "Кеширането на компонентите е изключено (не се препоръчва).";
$MESS["main_cache_managed_turn_off"] = "Изключи кеширането (не се препоръчва).";
$MESS["main_cache_managed_const"] = "Определената константа BX_COMP_MANAGED_CACHE - кеширането е винаги включено.";
$MESS["main_cache_managed_turn_on"] = "Включи кеширането";
$MESS["main_cache_managed_note"] = "Технологията на кеширането <b>Сache Dependencies</b> автоматично кешира компонентите при промяна на данни. 
		Ако кеширането е включено, няма да е необходимо ръчно да се обновява кеша на компонентите при промени в новините или артикули, промените веднага ще бъдат достъпни за посетителите на сайта.
		
	<br><br>
	<span style=\"color:grey\">Забележка: не всички компоненти могат да поддържат управлявано кеширане.</span>";
$MESS["cache_admin_note5"] = "В тази редакция HTML кеша е винаги включен.";
$MESS["main_cache_wrong_cache_type"] = "Грешен тип кеширане.";
$MESS["main_cache_wrong_cache_path"] = "Грешен път до файла на кеша.";
$MESS["main_cache_in_progress"] = "Извършва се изтриване на файловете на кеша.";
$MESS["main_cache_finished"] = "Изтриването на файловете на кеша приключи.";
$MESS["main_cache_files_scanned_count"] = "Обработено: #value#";
$MESS["main_cache_files_scanned_size"] = "Размера на обработените файлове: #value#";
$MESS["main_cache_files_deleted_count"] = "Изтрито: #value#";
$MESS["main_cache_files_deleted_size"] = "Размера на изтритите файлове: #value#";
$MESS["main_cache_files_delete_errors"] = "Грешка при изтриването: #value#";
$MESS["main_cache_files_last_path"] = "Текуща директория: #value#";
$MESS["main_cache_files_start"] = "Старт";
$MESS["main_cache_files_continue"] = "Продължи";
$MESS["main_cache_files_stop"] = "Спри";
?>