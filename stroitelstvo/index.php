<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "проект строительство коттедж компания загородный дом работа специалист");
$APPLICATION->SetPageProperty("description", "Готовые проекты и услуги по строительству коттеджей и загородных домов: более 7 лет опыта, подбор дома от сдачи под ключ. Любые специалисты, от геодезиста до дизайнера интерьеров.");
$APPLICATION->SetTitle("Проекты: cтроительства загородных домов и коттеджей");
?> 



<section class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/"><span itemprop="name">Главная</span></a><meta itemprop="position" content="1" /></span>
				<span>/</span>
				<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#"><span itemprop="name">Строительство</span></a><meta itemprop="position" content="2" /></span>
				<span>/</span>
			</div>
		</div>
	</div>
</section>

<section class="stat-sect1 tehn-sect1">
	<div class="container"> 

		<h1>Строительство загородных домов и коттеджей</h1>

		<div class="row"><div class="col-md-12">		  

			<p>У нас заказывают:</p>

			<div class="newh2"><a href="/stroitelstvo/projects/">Наши проекты:</a></div><br />

			<?php

			CModule::IncludeModule("iblock");


			$arSelect = Array("ID", "NAME", "PROPERTY_NEW_PRICE", "PROPERTY_KART_SMALL_DESCRIPTION", "PROPERTY_KART_DESCRIPTION", "PROPERTY_KVM", "PROPERTY_KART_PHOTO", "DETAIL_PAGE_URL", "PROPERTY_KVM");
			$res = CIBlockElement::GetList (Array("RAND" => "ASC"), Array("IBLOCK_ID" => 15, "ACTIVE" => "Y"), false, Array ("nTopCount" => 4), $arSelect);

			while($row = $res->GetNext()) {

				$img_src = CFile::ResizeImageGet($row["PROPERTY_KART_PHOTO_VALUE"], array('width'=>220, 'height'=>200), BX_RESIZE_IMAGE_EXACT, true);	

				?>

				<div class="col-md-3 col-sm-6"><div align="center"><a href="<?=$row['DETAIL_PAGE_URL'];?>"><br />
					<p><img style="border: 1px solid #c0d0e0;padding: 3px;" src="<?=$img_src['src'];?>"></p>
					<p><b><?=$row['NAME']?></b></p>
					<p style="color:#0975e9;font-size: 14px;font-weight: bold;"><?=$row['PROPERTY_KVM_VALUE'];?> м²</p>
					<p style="color: #df1d0d;font-size: 14px;font-weight: bold;"><?=$row['PROPERTY_NEW_PRICE_VALUE'];?></p>
					<p style="text-align:justify;padding:5px;"><?=$row['PROPERTY_KART_SMALL_DESCRIPTION_VALUE']['TEXT']?></p>
				</a></div></div>

				<?php	

			}
			
			?>

			<div class="clear"></div>

			<div class="newh2">Почему строительство заказывают у нас</div> <br />

			<ul style="padding-left:15px;">

				<li><a href="/stroitelstvo/stroitelnye-brigady/">Профессиональные строительные бригады</a></li>
				<li><a href="/stroitelstvo/garantiynye-sroki/">Гарантийные сроки</a></li>
				<li><a href="/stroitelstvo/prozrachnost-raboty-kompanii/">Прозрачность работы компании</a></li>
				<li><a href="/stroitelstvo/pomoshch-v-vybore-uchastka/">Помощь в выборе участка</a></li> 
				<li><a href="/stroitelstvo/tekhnologiya-stroitelstva/">Технология строительства</a></li> 
				<li><a href="/stroitelstvo/sluzhba-tekhnicheskogo-nadzora/">Служба технического надзора</a></li>
			</ul>

			<p><b>Мы можем спроектировать и построить любой дом по Вашим пожеланиям, в. т.ч. по картинке из журнала или фото!</b></p>

			<div class="row wrap-items">


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/projects/">Все проекты</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/projects/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/stroitelnye-brigady/">Строительные бригады</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/stroitelnye-brigady/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/pomoshch-v-vybore-uchastka/">Помощь в выборе участка</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/pomoshch-v-vybore-uchastka/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/proektirovanie-kottedzhey/">Архитектурное проектирование</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/proektirovanie-kottedzhey/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/rekonstruktsiya-kottedzhey/">Реконструкция коттеджей</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/rekonstruktsiya-kottedzhey/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/inzhenernye-seti/">Инженерно-технические сети</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/inzhenernye-seti/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/dizayn-intererov/">Дизайн интерьеров</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/dizayn-intererov/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/landshaft-diz/">Ландшафтный дизайн</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/landshaft-diz/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/otdelka-pomeshcheniy/">Отделка помещений</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/otdelka-pomeshcheniy/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/materialy/">Входной контроль материалов</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/materialy/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/sluzhba-tekhnicheskogo-nadzora/">Служба технического надзора</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/sluzhba-tekhnicheskogo-nadzora/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/kreditnaya-programma/">Кредитная программа</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/kreditnaya-programma/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/prozrachnost-raboty-kompanii/">Прозрачность работы компании</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/prozrachnost-raboty-kompanii/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/informatsiya/">Информация о строительстве</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/informatsiya/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/tekhnologii/">Технологии строительства</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/tekhnologii/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/garantiynye-sroki/">Гарантийный сроки</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/garantiynye-sroki/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>


				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item">
						<div class="head-item"><a href="/stroitelstvo/vopros-otvet/">Вопрос-ответ</a></div>

						<div class="bottom-leep">
							<a href="/stroitelstvo/vopros-otvet/" class="read-more">Подробнее</a>
						</div>
					</div>
				</div>

			</div>
			<div class="newh2">Услуги по строительству коттеджей и загородных домов:</div> <br />

			<ul style="padding-left:15px;">
				<li>Комплексное решение вопроса от подбора домов до сдачи дома «под ключ»</li>
				<li>Опыт работ более 7 лет</li>
				<li>У нас есть все необходимые лицензии и свидетельства СРО</li>
				<li>Весь спектр специалистов от геодезиста до дизайнера интерьеров</li>
				<li>Технадзор за строительством</li>
				<li>Предоставление Заказчику еженедельных отчетов с фотофиксацией этапов строительства и отдельных конструкций, в том числе скрытых работ – БЕСПЛАТНО</li>
				<li>Предоставление полного пакета исполнительной документации по окончании строительства.</li>
				<li>Дальнейшее обслуживание вашего коттеджа: от мелкого ремонта до расширения дома, от рекомендаций по ландшафтному дизайну до интерьерных решений!!!</li>
			</ul>

			<div class="newh2">Почему мы начали строить?</div> <br />

			<p>Основная причина – ошибки проектных и строительных компаний, допускаемых</p>

			<ul style="padding-left:15px;">
				<li>при проектировании коттеджей;</li>
				<li>при строительстве коттеджей;</li>
				<li>в подборе кадров как ИТР, так и рабочих специалистов</li>
			</ul>

			<p>Комплексное решение вопросов – от рекомендаций по выбору участка для строительства до сдачи коттеджа в эксплуатацию.</p>

			<p>Работая на рынке предоставления экспертных услуг в области строительства более 6 лет, специалисты нашей компании обратили внимание на то, что огромный сегмент рынка малоэтажного строительства не обеспечен как организационно, так и технологически теми инструментами для решения строительных задач, которыми обладают строительные компании, ведущие масштабное строительство. В результате ошибок, допускаемых при строительно-монтажных работах, отдельные несущие и ограждающие конструкции не способны выполнять функции, заложенные в проектах.</p>

		</div></div>
	</div></section>



	<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_map.php");?>			

	<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>