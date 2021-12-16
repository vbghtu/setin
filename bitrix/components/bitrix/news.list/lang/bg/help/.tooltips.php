<?
$MESS ['IBLOCK_TYPE_TIP'] = "От падащият списък се избира един от създадените в системата тип на инфоблок.След натискане на бутона <b><i>ок</b></i> ще бъдат заредени тези инфоблокове който са създадени за избраният тип.Тип тук може и да не се избира.";
$MESS ['IBLOCK_ID_TIP'] = "В списъка са представени всички информационни блокове,създадени за посоченият тип, или всички информационни блокове от системата,ако типа не е избран.Може да се избере един от тях или позицията <i>друго</i>,тогава в близкото поле е необходимо да се посочи кода на блока,например, ={\$_REQUEST[\"IBLOCK_ID\"]}.";
$MESS ['NEWS_COUNT_TIP'] = "Посочва се броя на елементите,който ще бъдат показани на една страница.";
$MESS ['SORT_BY1_TIP'] = "В списъка са изброени полетата,по който може да се извършва сортирането на новините.Също така може да се избере позицията<i>друго</i>и да се зададе в близкото поле кода на нужното поле.";
$MESS ['SORT_ORDER1_TIP'] = "По възходящ или низходящ ред.";
$MESS ['SORT_BY2_TIP'] = "В списъка са изброени полетата,по който може да се извърши второ сортирането на новините, в случай на съвпадане на значенията от първото сортиране.Също така може да се избере позицията<i>друго</i>и да се зададе в близкото поле кода на нужното поле.";
$MESS ['SORT_ORDER2_TIP'] = "По възходящ или низходящ ред.";
$MESS ['FILTER_NAME_TIP'] = "Задава се името на променливата,в която се предава масива на параметрите от филтъра.Служи за определяне на излизащите от филтъра елементи.Полето може да бъде оставено празно, тогава се използва значението по подразбиране.";
$MESS ['FIELD_CODE_TIP'] = "От даденото поле може да се изберат полета за елементите от инфоблока,по който ще бъде възможна филтрация.Също така може да се добавят други полета във вид на символен код (в полетата отдолу).";
$MESS ['PROPERTY_CODE_TIP'] = "Изброени са свойствата на елементите от инфоблоковете.От тях може да се изберат тези,по който е възможна филтрация.Също може да се добавят други полета във вид на символен код(в полето отдолу).";
$MESS ['DETAIL_URL_TIP'] = "Посочва се шаблона на линка към страницата за подробният преглед.Например, news_detail.php?ID=#ELEMENT_ID#";
$MESS ['PREVIEW_TRUNCATE_LEN_TIP'] = "Ако типа на анонса на елемента от инфоблока е текст,то може да се посочи неговата максималната дължина,след което текста ще бъде отсечен.";
$MESS ['ACTIVE_DATE_FORMAT_TIP'] = "В списъка са изброени всички възможни варианти за показване на датата,формирани в компонента.Избирайки позицията <i>друго</i>,може да се формира собствен вариант по php-функцията <i>date</i>.";
$MESS ['DISPLAY_PANEL_TIP'] = "При отметната опция,бутоните ще се показват в режим за редактиране на сайта на админ.панела,също така и в комплекта от бутони в областа на редактиране на даденият компонент.";
$MESS ['SET_TITLE_TIP'] = "При отметната опция като заглавие на страницата ще бъде поставено името на текущият инфоблок.";
$MESS ['INCLUDE_IBLOCK_INTO_CHAIN_TIP'] = "При отметната опция,в нишката за навигация ще бъде добавено името на инфоблока.";
$MESS ['ADD_SECTIONS_CHAIN_TIP'] = "Ако опцията е отметната и в инфоблока са създадени раздели,то при применаване по тях имената им ще бъдат добавени в нишката за навигация.";
$MESS ['HIDE_LINK_WHEN_NO_DETAIL_TIP'] = "Опцията позволява да се скрие линка,ако няма подробна информация за елемента,или потребителя няма права за нейният преглед.";
$MESS ['PARENT_SECTION_TIP'] = "В даденото поле може да се посочи ID на \"родителският\" раздел,за да се ограничи избора на елементи по него.";
$MESS ['CACHE_TYPE_TIP'] = "<i>Авто</i>: работи при включено кеширане в течение на зададеното време;<br /><i>Кешира</i>: за кеширането е  необходимо да се определи само времето за кеширане;<br /><i>Не кешира</i>: във всички случай не кешира.";
$MESS ['CACHE_TIME_TIP'] = "Полето служи за посочване на времето за кеширане,в секунди.";
$MESS ['CACHE_FILTER_TIP'] = "При отметната опция,всеки резултат получен от филтъра,ще се кешира.Има смисъл да се отметни,ако много от потребителите използват един и същ избор от филтъра. ";
$MESS ['DISPLAY_TOP_PAGER_TIP'] = "При отметната опция навигацията по елементите ще бъде показана горе на страницата,над списъка.";
$MESS ['DISPLAY_BOTTOM_PAGER_TIP'] = "При отметната опция навигацията по елементите ще бъде показана долу на страницата,под списъка.";
$MESS ['PAGER_TITLE_TIP'] = "В даденото поле се посочва името на категорията,по което ще се извършва навигацията по списъка(например, новини, статии и др.)";
$MESS ['PAGER_SHOW_ALWAYS_TIP'] = "При не отметната опция,под страничната навигация няма да се извежда,ако всички елементи са на една страница.Но винаги ще се показва при отметната.";
$MESS ['PAGER_TEMPLATE_TIP'] = "Посочва се името на шаблона за под страничната навигация.Ако полето е празно,се избира шаблон по подразбиране (<i>.default</i>).Също така в системата е зададен и шаблона <i>orange</i>.";
$MESS ['PAGER_DESC_NUMBERING_TIP'] = "Механизъма се използва,ако при добавянето на елемент в инфоблок,той винаги попада най-горе в списъка,По този начин се променя само последната страница.Всички предишни могат да се кешират за дълго.";
$MESS ['PAGER_DESC_NUMBERING_CACHE_TIME_TIP'] = "Посочва се време за кеширане на страницата за обратна навигация,в секунди.";
$MESS ['AJAX_MODE_TIP'] = "Включване за компонента режим AJAX.";
$MESS ['AJAX_OPTION_SHADOW_TIP'] = "При изпълнение на применаването ще се затъмни областа,която трябва да се редактира.";
$MESS ['AJAX_OPTION_JUMP_TIP'] = "Ако потребителя извърши преминаване в режим AJAX, то при завършване на зареждането компонента ще се превърти от начало.";
$MESS ['AJAX_OPTION_STYLE_TIP'] = "След завършване на преминаването в режима AJAX,ще се обработи и зареди списък със CSS стилове.";
$MESS ['AJAX_OPTION_HISTORY_TIP'] = "Когато потребителя изпълнява преминаване в AJAX,то при включена опция могат да се използват бутоните на браузера \"Назад\" и \"Напред\".";
$MESS ['CHECK_DATES_TIP'] = "Опцията служи за показване само на активните елементи от инфоблока.";
?>