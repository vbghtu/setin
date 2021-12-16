<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!empty($mypage_two)) {
	
	function deleteGETex($url, $name, $amp = true) {
		$url = str_replace("&amp;", "&", $url); // Заменяем сущности на амперсанд, если требуется
		list($url_part, $qs_part) = array_pad(explode("?", $url), 2, ""); // Разбиваем URL на 2 части: до знака ? и после
		parse_str($qs_part, $qs_vars); // Разбиваем строку с запросом на массив с параметрами и их значениями
		unset($qs_vars[$name]); // Удаляем необходимый параметр
		if (count($qs_vars) > 0) { // Если есть параметры
			$url = $url_part."?".http_build_query($qs_vars); // Собираем URL обратно
			if ($amp) $url = str_replace("&", "&amp;", $url); // Заменяем амперсанды обратно на сущности, если требуется
		}
		else $url = $url_part; // Если параметров не осталось, то просто берём всё, что идёт до знака ?
		return str_replace("&amp;", "&", $url); // Возвращаем итоговый URL
	}
	
	$link = deleteGETex($_SERVER['REQUEST_URI'], "PAGEN_2");
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: " . trim($link));
	die;
}
?>


<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	
	<?php
	$numpagex = (int) $_GET['PAGEN_1'];
	
	if($APPLICATION->GetCurPage() == "/news/") {
		?><title>Новости компании СтройЭкспертНадзор<?=(!empty($numpagex) ? " - страница "  . $numpagex : "");?></title> <?php
	} else { 
		?> <title><?=$APPLICATION->ShowTitle();?></title> <?php
	}

	if(!empty($mypage)) {
		?>
		<meta name="yandex" content="noindex, follow"/>
		<meta name="googlebot" content="index, follow"/>
		<?php
	}

	$APPLICATION->ShowMeta("description"); 
	$APPLICATION->ShowProperty('prev'); 
	$APPLICATION->ShowProperty('next');
	?>
	
	<!-- Картинка появляющаяся в социальных сетях, при отправке ссылки на сайт в сообщении или на стену -->
	<meta property="og:image" content="<?=SITE_TEMPLATE_PATH;?>/img/logo.jpg">
	<!-- init viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH;?>/img/favicon.ico" type="image/x-icon">
	<!-- Icon For Apple Devices -->
	
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=SITE_TEMPLATE_PATH;?>/img/logo.jpg">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=SITE_TEMPLATE_PATH;?>/img/logo.jpg">
	<link rel="apple-touch-icon-precomposed" href="<?=SITE_TEMPLATE_PATH;?>/img/logo.jpg">

<meta name="yandex-verification" content="068e24a0719c4b51" />

	<!-- stylesheets -->
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/css/libs.css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/css/fonts.css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/css/header.css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/css/style.css">
	<!-- fonts -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=cyrillic-ext" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet"> -->


	<style>
	#my-map {
		height: 620px;
		width: 100%;
	}
	#my-map2-marshrut {
		height: 600px;
		width: 100%;
	}
</style>

<meta name="google-site-verification" content="Bp93nCkNpVLnfQZATKrOJhlNIVL6oNEgRJYy7OpLg60" />


</head>
<body>

<!-- ===========================================================
	START HEADER -->

	<header class="header">
		<div class="container">
			<a class="logo" href="/">
				<img class="logo-standart" src="<?=SITE_TEMPLATE_PATH;?>/img/logo.jpg" alt="logo">
				<img class="logo-150" src="<?=SITE_TEMPLATE_PATH;?>/img/logo-150.png" alt="logo1">
				<img class="logo-220" src="<?=SITE_TEMPLATE_PATH;?>/img/logo-220.png" alt="logo2">
			</a>
			<div class="wrap-contacts">
				<div class="tel1">
					<!-- <span class="big-tel roipodmena"></span> -->
					<!-- <span class="small-tel">бесплатно по РФ</span> -->
				</div>
				<div class="tel2">
				<!-- seoroipodmena-->	<span class="big-tel seoroipodmena"><a href="tel:+74992133313" onclick="yaCounter27025170.reachGoal('phone_click');">+7 499 213-33-13</a></span>
					<span class="small-tel">Пн - Пт 9:00 - 19:00</span>
					<span class="free">Бесплатно по России и Крыму</span>
				</div>
			</div>
			<div class="social">
				<a target="_blank" href="whatsapp://send?phone=+79164532407" class="whatsapp"></a>
				<a target="_blank" href="tg://resolve?domain=AlexErshkov" class="telega"></a>
			</div>
			<a href="mailto:info@seitn.ru" class="header__email">info@seitn.ru</a>
			<div class="wrap-btn"><a href="#" class="btn-header">Заказать звонок</a></div>
			<div class="wrap-search">
				<div class="icon-search"></div>
				<form method="GET" action="/search/" class="search-form">
					<input type="text" name="search" placeholder="Поиск по сайту">
					<input type="submit" value=" ">
					<div class="close-btn"></div>
				</form>
			</div>

			<!-- Для экрана меньше 1200 пикселей -->
			<div class="open-1200-menu"></div>
			

		</div>
	</header>
	<div class="close-1200-menu"></div>
	<div class="overflow-block"></div>

	<div class="header sticky-header">
		<div class="container">
			<div class="logo">
				<a href="/">
					<img class="logo-standart" src="<?=SITE_TEMPLATE_PATH;?>/img/logo.jpg" alt="logo">
					<img class="logo-150" src="<?=SITE_TEMPLATE_PATH;?>/img/logo-150.png" alt="logo1">
					<img class="logo-220" src="<?=SITE_TEMPLATE_PATH;?>/img/logo-220.png" alt="logo2">
					<img src="<?=SITE_TEMPLATE_PATH;?>/img/logo-stick-320.jpg" alt="stlogo" class="show-on-425">
				</a>
			</div>
			<ul class="small-menu">
				<li><a href="/stoimost_uslug/">Цены</a></li>
				<li><a href="/portfolio/">Портфолио</a></li>
				<li><a href="/contacts/">Контакты</a></li>
			</ul>
			<div class="wrap-contacts">
<!-- 				<div class="tel1">
					<span class="big-tel roipodmena"></span>
				</div> -->
				<div class="tel2">
					<!--seoroipodmena--><span class="big-tel seoroipodmena"><a href="tel:+74992133313">+7 499 213-33-13</a></span>
				</div>

			</div>
			<div class="wrap-btn">
				<a href="#" class="btn-header">Обратный звонок</a>
			</div>
			<div class="wrap-search">
				<div class="icon-search"></div>
				<form class="search-form">
					<input type="text" placeholder="Поиск по сайту">
					<input type="submit" value=" ">
					<div class="close-btn"></div>
				</form>
			</div>
		</div>
	</div>

	<div class="menu">
		<div class="container">
			<ul class="ul-relative">
				<li class="wrap-dclick">
					<div class="arr-btn-menu"></div>
					<a class="double-click-punkt" href="/about_the_company/">О компании</a>
					<ul>
						<li><a href="/our-documents/">Сертификаты и свидетельства</a></li>
						<li><a href="/nashi_partnery/">Наши партнеры</a></li>
						<li><a href="/oborudovanie/">Наше оборудование</a></li>
						<li><a href="/tipovye_dogovory/">Типовые договора</a></li>
						<li><a href="/nashi-raboti-na-karte-rossii/">Наши объекты на карте России</a></li>
						<li><a href="/review/">Рекомендательные письма</a></li>
					</ul>
				</li>
				<li class="wrap-dclick">
					<div class="arr-btn-menu"></div>
					<a class="double-click-punkt" href="/stroitelnaya-ekspertiza/">Услуги</a>
					<ul>
						<li>
							<div class="arr-btn-menu"></div>
							<a href="/stroitelnaya-ekspertiza/">Экспертиза</a>
							<ul>
								<li><a href="/negosudarstvennaya_ekspertiza/">Негосударственная строительная экспертиза</a></li>
								<li><a href="/stroitelnaya-ekspertiza/ekspertiza_inzhenernyh_sistem/">Экспертиза инженерных сетей и коммуникаций</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_obektov_nedvizhimosti/">Экспертиза объектов недвижимости</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_stroitelnyh_rabot/">Экспертиза строительных работ</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_avarijnogo_zhilya/">Экспертиза аварийного жилья</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_zdanij_sooruzhenij/">Строительная экспертиза зданий и сооружений</a></li>
								<li><a href="/exspertiza_dokumentacii/">Экспертиза документации</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_promyshlennoj_bezopasnosti_sooruzhenij/">Экспертиза промышленной безопасности</a></li>
								<li><a href="/sudebnaya_ekspertiza/">Судебная экспертиза</a></li>
								
								<li><a href="/stroitelnaya-ekspertiza/domov/">Строительная экспертиза домов</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_svarnyh_shvov/">Экспертиза сварных швов</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_kottedzha/">Строительная экспертиза коттеджа</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_nezhilogo_pomeshcheniya/">Экспертиза нежилых помещений</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_kotelnoj/">Экспертиза котельной</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_proektnoj_dokumentacii/">Экспертиза проектной документации</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_sistemy_otopleniya/">Экспертиза систем отопления</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_rekonstrukcii/">Экспертиза реконструкции</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_betona/">Экспертиза бетона</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_mostov/">Экспертиза мостов</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_treshchin_v_dome/">Строительная экспертиза трещин</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_styazhki_pola/">Экспертиза стяжки пола</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_sistem_vodootvoda/">Экспертиза систем водоотвода</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_stroitelnyh_rabot/">Экспертиза строительных работ</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_ehlektriki/">Экспертиза электропроводки</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_kirpichnoi_kladki/">Экспертиза кирпичной кладки</a></li>
								<li><a href="/stroitelnaya-ekspertiza/stroitelnyh_konstrukcij/">Экспертиза конструкций здания</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_metallokonstrukcij/">Экспертиза металлоконструкций</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_polov/">Экспертиза полов</a></li>
								<li><a href="/stroitelnaya-ekspertiza/ekspertiza_fundamenta/">Экспертиза фундамента</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_sistem_ventilyacii/">Экспертиза систем вентиляции</a></li>
								<li><a href="/stroitelnaya-ekspertiza/dorozhnaya_exspertiza/">Дорожная экспертиза</a></li>
								<li><a href="/sudebnaya_ekspertiza/exspertiza_nezavershennogo_stroitelstva/">Экспертиза незавершенного строительства</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_obektov_nedvizhimosti/">Техническая экспертиза недвижимости</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_lestnic/">Экспертиза лестниц</a></li>
								<li><a href="/stroitelnaya-ekspertiza/ekspertiza_nedvizhimosti_pered_pokupkoi/">Экспертиза недвижимости перед покупкой</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_posle_pozhara/">Экспертиза после пожара</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_okon/">Экспертиза окон</a></li>
								<li><a href="/stroitelnaya-ekspertiza/ekspertiza_fasadov/">Экспертиза фасадов</a></li>
								<li><a href="/stroitelnaya-ekspertiza/ekspertiza_sten/">Экспертиза стен</a></li>
								<li><a href="/stroitelnaya-ekspertiza/dymovyh_trub/">Экспертиза дымовых труб</a></li>
								<li><a href="/sudebnaya_ekspertiza/domov/">Экспертиза дома для суда</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_balkona/">Экспертиза балкона</a></li>
								<li><a href="/sudebnaya_ekspertiza/exspertiza_ehlektroprovodki/">Судебная экспертиза электропроводки</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_kanalizacii/">Экспертиза канализации</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_smetnoj_dokumentacii/">Экспертиза сметной документации</a></li>
								<li><a href="/stroitelnaya-ekspertiza/ekspertiza_derevyannyx_domov/">Экспертиза деревянных домов</a></li>
								<li><a href="/stroitelnaya-ekspertiza/ekspertiza_krovli/">Экспертиза кровли</a></li>
								<li><a href="/sudebnaya_ekspertiza/exspertiza_remonta_kvartiry/">Экспертиза ремонта</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_kachestva_stroitelnyh_rabot/">Экспертиза качества строительных работ</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_kapitalnosti/">Экспертиза капитальности зданий</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_sistem_vodosnabzheniya/">Экспертиза систем водоснабжения</a></li>
							</ul>
						</li>
						<li>
							<div class="arr-btn-menu"></div>
							<a href="/tehnadzor/">Технадзор</a>
							<ul>
								<li><a href="/tehnadzor/remontom_kvartir/">Технадзор при ремонте</a></li>
								<li><a href="/tehnadzor/nadzor_za_stroitelstvom_doma/">Технадзор за строительством дома</a></li>
								<li><a href="/tehnadzor/montazhnyh_rabot/">Технадзор монтажных работ</a></li>
								<li><a href="/tehnadzor/kapitalnoe_stroitelstvo/">Технадзор при капитальном строительстве</a></li>
								<li><a href="/tehnadzor/promyshlennye_obekty/">Технадзор за строительством промышленных сооружений</a></li>
								<li><a href="/tehnadzor/restavracionnye_raboty/">Технадзор при реставрации</a></li>
								<li><a href="/tehnadzor/proektirovanie/">Технадзор в проектировании</a></li>
								
								<li><a href="/tehnadzor/trub/">Технадзор при строительстве магистральных трубопроводов</a></li>
								<li><a href="/tehnadzor/doma_iz_gazobloka/">Технадзор за строительством дома из газоблоков</a></li>
								<li><a href="/tehnadzor/doma_iz_kirpicha/">Технадзор за строительством домов из кирпича</a></li>
								<li><a href="/tehnadzor/restavracionnye_raboty/">Технадзор при реставрации</a></li>
								<li><a href="/tehnadzor/arxitekturno-stroitelnyj-nadzor/">Архитектурный надзор</a></li>
								<li><a href="/tehnadzor/karkasnye_doma/">Технадзор за строительством каркасного дома</a></li>
								<li><a href="/tehnadzor/kapitalnyi_remontom/">Технадзор за капитальным ремонтом</a></li>
								<li><a href="/tehnadzor/doma_iz_brusa/">Технадзор за строительством домов из бруса</a></li>
								<li><a href="/tehnadzor/doma_iz_penobloka/">Технадзор за строительством дома из пеноблока</a></li>
								<li><a href="/tehnadzor/derevyannye_doma/">Технадзор за строительством деревянного дома</a></li>
								<li><a href="/tehnadzor/remontom_kvartir/">Технадзор за ремонтом квартир</a></li>
							</ul>
						</li>
						<li>
							<div class="arr-btn-menu"></div>
							<a href="/obsledovanie-zdanij/">Обследование</a>
							<ul>
								<li><a href="/obsledovanie-zdanij/">Обследование зданий и сооружений</a></li>
								<li><a href="/lazernoe-skanirovanie-3d/">Лазерное сканирование 3d</a></li>
								<li><a href="/uslugi-georadara/">Георадарное обследование</a></li>
								<li><a href="/stroitelnaya-ekspertiza/teplovizionnoe-obsledovanie/">Тепловизионное обследование</a></li>
								<li><a href="/stroitelnaya-ekspertiza/exspertiza_podvalov/">Обследование подвалов</a></li>
								<li><a href="/stroitelnaya-ekspertiza/instrumentalnoe/">Инструментальное обследование зданий</a></li>
								<li><a href="/stroitelnaya-ekspertiza/ekspertiza_perekrytij/">Обследование перекрытий</a></li>
								<li><a href="/stroitelnaya-ekspertiza/vizualnoe/">Визуальное обследование зданий</a></li>
								<li><a href="/stroitelnaya-ekspertiza/obsledovanie_ochistnyh_sooruzhenij/">Обследование очистных сооружений</a></li>
								<li><a href="/stroitelnaya-ekspertiza/ekspertiza_inzhenernyh_sistem/">Инженерно-техническое обследование зданий</a></li>
							</ul>
						</li>
						<li><a href="/tehnadzor/stroitelnyy-kontrol/">Строительный контроль</a></li>
						<li><a href="/proektirovanie/">Проектирование</a></li>
						<!-- <li><a href="/qwewqe/">Изыскания</a></li> -->
						<!-- <li><a href="/qweqweqwe/">Оценка</a></li> -->
						<li>
							<div class="arr-btn-menu"></div>
							<a href="/pereplanirovka/">Перепланировка</a>
							<ul>
								<li><a href="/pereplanirovka/">Согласование перепланировки</a></li>
								<li><a href="/pereplanirovka/exspertiza_pereplanirovki/">Экспертиза перепланировки</a></li>
							</ul>
						</li>
						<li>
							<div class="arr-btn-menu"></div>
							<a href="/stroitelstvo/">Строительство</a>
							<ul>
								<li><a href="/tehnadzor/stroitelnyj_monitoring/">Строительный мониторинг</a></li>
								<li><a href="/tehnadzor/stroitelnyj_monitoring/">Строительный мониторинг</a></li>
								<li><a href="/tehnadzor/soprovozhdenie_stroitelnyh_proektov/">Инженерно-техническое сопровождение строительства</a></li>
								<li><a href="/stroitelstvo/informatsiya/">Полезно знать</a></li>
								<li><a href="/stroitelstvo/garantiynye-sroki/">Гарантийные сроки</a></li>
								<li><a href="/stroitelstvo/tekhnologii/">Технологии</a></li>
								<li><a href="/stroitelstvo/prozrachnost-raboty-kompanii/">Прозрачность работы компании</a></li>
								<li><a href="/stroitelstvo/sluzhba-tekhnicheskogo-nadzora/">Служба технического надзора</a></li>
								<li><a href="/stroitelstvo/otdelka-pomeshcheniy/">Отделка помещений</a></li>
								<li><a href="/stroitelstvo/materialy/">Материалы</a></li>
								<li><a href="/stroitelstvo/dizayn-intererov/">Дизайн интерьеров</a></li>
								<li><a href="/stroitelstvo/inzhenernye-seti/">Инженерные сети</a></li>
								<li><a href="/stroitelstvo/landshaft-diz/">Ландшафтный дизайн</a></li>
								<li><a href="/stroitelstvo/rekonstruktsiya-kottedzhey/">Реконструкция коттеджей</a></li>
								<li><a href="/stroitelstvo/proektirovanie-kottedzhey/">Проектирование коттеджей</a></li>
								<li><a href="/stroitelstvo/stroitelnye-brigady/">Строительные бригады</a></li>
								<li><a href="/stroitelstvo/projects/">Проекты одноквартих домов</a></li>
								<li><a href="/stroitelstvo/tekhnologiya-stroitelstva/">Технология строительства</a></li>
								<li><a href="/stroitelstvo/pomoshch-v-vybore-uchastka/">Помощь в выборе участка</a></li>
							</ul>
						</li>
						<li><a href="/stroitelnaya-ekspertiza/finansovo-tehnicheskiy_audit/">Финансово-технический аудит</a></li>
						<li><a href="/tehnicheskij_zakazchik/">Технический заказчик</a></li>
						<li>
							<div class="arr-btn-menu"></div>
							<a href="/laboratorija_nerazrushajushhego_kontrolya/">Другие услуги</a>
							<ul>
								<li><a href="/laboratorija_nerazrushajushhego_kontrolya/">Лаборатория неразрушающего контроля</a></li>
								<li><a href="/oral-consultations/">Устные консультации</a></li>
								<li><a href="/proverka_i_razrabotka_smet/">Подготовка сметной документации</a></li>
								<li><a href="/yuridicheskaya-podderzhka/">Юридическая поддержка</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="wrap-dclick">
					<div class="arr-btn-menu"></div>
					<a class="double-click-punkt" href="/portfolio/">Реализованные проекты</a>
					<ul>
						<li><a href="/nashi_zakazchiki/">Заказчики</a></li>
						<li><a href="/portfolio/tehnadzor/">Технадзор</a></li>
						<li><a href="/portfolio/stroitelnaya-ekspertiza/">Строительная экспертиза</a></li>
						<li><a href="/portfolio/cottage-towns/">Коттеджные поселки</a></li>
						<li><a href="/nashi_raboti_na_karte_rossii/">Наши объекты на карте РФ</a></li>
					</ul>
				</li>
				<li class="wrap-dclick">
					<div class="arr-btn-menu"></div>
					<a class="double-click-punkt" href="/polezno/">Полезная информация</a>
					<ul>
						<li><a href="/polezno/effektivnost-i-nadezhnost-stroitelnoy-ekspertizy/">Преимущества строительной экспертизы</a></li>
					</ul>
				</li>
				<li class="last-li-menu"><a href="/stoimost_uslug/">Цены</a></li>
				<li class="last-li-menu"><a href="/contacts/">Контакты</a></li>
			</ul>
		</div>
	</div>

	<!-- <div class="menu">
		<div class="container">
			<ul class="ul-relative">
				<li class="wrap-dclick">
					<div class="arr-btn-menu"></div>
					<a href="/tehnadzor/">Технадзор</a>
					<ul>
						<li><a href="/tehnadzor/stroitelnyy-kontrol/">Строительный контроль качества</a></li>
						<li><a href="/tehnadzor/remontom_kvartir/">Технадзор при ремонте</a></li>
						<li><a href="/tehnadzor/nadzor_za_stroitelstvom_doma/">Технадзор за строительством дома</a></li>
						<li><a href="/tehnadzor/montazhnyh_rabot/">Технадзор монтажных работ</a></li>
						<li><a href="/tehnadzor/kapitalnoe_stroitelstvo/">Технадзор при капитальном строительстве</a></li>
						<li><a href="/tehnadzor/promyshlennye_obekty/">Технадзор за строительством промышленных объектов</a></li>
						<li><a href="/tehnadzor/restavracionnye_raboty/">Технадзор при реставрации</a></li>
						<li><a href="/tehnadzor/proektirovanie/">Технический надзор в проектировании</a></li>
						<li><a href="/tipovye_dogovory/">Типовые договора технадзора</a></li>
					</ul>
				</li>
				<li class="wrap-dclick">
					<div class="arr-btn-menu"></div>
					<a class="double-click-punkt" href="/stroitelnaya-ekspertiza/">Строительная экспертиза</a>
					<ul>
						<li><a href="/negosudarstvennaya_ekspertiza/">Негосударственная строительная экспертиза</a></li>
						<li><a href="/polezno/024/">Преимущества строительной экспертизы</a></li>
						<li><a href="/obsledovanie-zdanij/">Техническое обследование зданий</a></li>
										<li><a href="/tipovye_dogovory/">Типовые договора технадзора</a></li>
						<li><a href="/stroitelnaya-ekspertiza/ekspertiza_inzhenernyh_sistem/">Экспертиза инженерных сетей и коммуникаций</a></li>
						<li><a href="/stroitelnaya-ekspertiza/exspertiza_obektov_nedvizhimosti/">Экспертиза объектов недвижимости</a></li>
						<li><a href="/stroitelnaya-ekspertiza/exspertiza_stroitelnyh_rabot/">Экспертиза строительных работ</a></li>
						<li><a href="/stroitelnaya-ekspertiza/exspertiza_avarijnogo_zhilya/">Экспертиза аварийного жилья</a></li>
						<li><a href="/exspertiza_dokumentacii/">Экспертиза документации</a></li>
						<li><a href="/stroitelnaya-ekspertiza/exspertiza_zdanij_sooruzhenij/">Экспертиза строительных сооружений</a></li>
						<li><a href="/lazernoe-skanirovanie-3d/ ">Лазерное сканирование 3D</a></li>
						<li><a href="/uslugi-georadara/">Георадарное обследование</a></li>
						<li><a href="/oral-consultations/">Устные консультации</a></li>
					</ul>
				</li>
				<li><a href="/tehnicheskij_zakazchik/">Технический заказчик</a></li>
				<li><a href="/stroitelnaya-ekspertiza/finansovo-tehnicheskiy_audit/">Финансово-технический аудит</a></li>
				<li><a href="/proektirovanie/">Проектирование</a></li>
				<li class="last-li-menu wrap-dclick">
					<div class="arr-btn-menu"></div>
					<a class="double-click-punkt" href="#">Другие услуги</a>
					<ul>
						<li><a href="/oral-consultations/">Консультации</a></li>
						<li><a href="/pereplanirovka/">Перепланировка</a></li>
						<li><a href="/stroitelstvo/">Строительство</a></li>
						<li><a href="/stroitelnaya-ekspertiza/exspertiza_promyshlennoj_bezopasnosti_sooruzhenij/">Экспертиза промышленной безопасности</a></li>
						<li><a href="/tehnadzor/stroitelnyj_monitoring/">Строительный мониторинг</a></li>
						<li><a href="/sudebnaya_ekspertiza/">Судебная экспертиза</a></li>
						<li><a href="/proverka_i_razrabotka_smet/">Подготовка сметной документации</a></li>
						<li><a href="/laboratorija_nerazrushajushhego_kontrolya/">Лаборатория неразрушающего контроля</a></li>
						<li><a href="/yuridicheskaya-podderzhka/">Юридическая поддержка</a></li>
					</ul>
				</li>
				<li><a href="/stoimost_uslug/">Цены</a></li>
				<li class="">
					<div class="arr-btn-menu"></div>
					<a href="/portfolio/">Портфолио</a>
					<ul>
						<li><a href="/nashi_raboti_na_karte_rossii/">Наши объекты на карте РФ</a></li>
						<li><a href="/nashi_zakazchiki/">Заказчики</a></li>
						<li><a href="/portfolio/tehnadzor/">Технадзор</a></li>
						<li><a href="/portfolio/stroitelnaya-ekspertiza/">Строительная экспертиза</a></li>
						<li><a href="/portfolio/cottage-towns/">Коттеджные поселки</a></li>
					</ul>
				</li>
				<li class="">
					<div class="arr-btn-menu"></div>
					<a href="/contacts/">Контакты</a>
					<ul>
						<li><a href="/about_the_company/">О компании</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>  -->

	<!-- <div class="open-menu-btn"></div> -->

<!-- ==============================================================
	END HEADER -->
