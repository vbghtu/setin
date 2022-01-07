<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


CModule::IncludeModule("iblock");

$arSelect = Array("NAME", "PROPERTY_h1", "DETAIL_TEXT", "ID" => 1939);
$arFilter = Array("IBLOCK_ID"=>26, "ID" => 1939);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement()){
	$row = $ob->GetFields();  
} 

$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(26,1939); 

$IPROPERTY = $ipropValues->getValues();

$APPLICATION->SetTitle($IPROPERTY['ELEMENT_META_TITLE']);
$APPLICATION->SetPageProperty("description", $IPROPERTY['ELEMENT_META_DESCRIPTION']);

?>


<div class="lazs1">
	<div class="container">
		<h1 class="lazs1__h1">3D сканирование</h1>
		<div class="lazs1__h2"> 
			<div class="lazs1__h2-text">Работаем по всей России! <br>Огромный опыт и крупные заказчики.</div>
		</div>
		<div class="lazs1__img"><img src="/images/3d/skaner3d.png" alt="asdafasf"></div>
	</div>
</div>


<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/"><span itemprop="name">Главная</span></a><meta itemprop="position" content="1" /></span>
				<span> / </span>
				<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#"><span itemprop="name"><?=$row['PROPERTY_H1_VALUE'];?></span></a><meta itemprop="position" content="2" /></span>
			</div>
		</div>
	</div>
</div>


<div class="lazs2">
	<div class="container">
		<h1 class="lazs2__title">Технология 3D лазерного сканирования</h1>
		<div class="lazs2__wrap">
			<div class="lazs2__left">
				<p>Технология лазерного сканирования <span class="bigger">позволяет выполнить миллиарды измерений</span> объемного <span class="bigger">объекта</span> путём последовательного касания лазера каждой точки объекта <span class="bigger">по вертикали и горизонтали</span>. </p>
				<p>Лазерное 3D сканирование <span class="bigger">позволяет создать точную цифровую копию</span> сканируемого объекта, на основе которой можно выполнить любые измерения элементов данного объекта <span class="bigger">и создать как объёмные так и классические чертежи</span>.</p>
				<p>Примененяем лазерное сканирование для сопровождения информационного моделирования зданий и сооружений - BIM, фасадные съёмки, цифровые чертежи цехов, заводов.</p>
				<p><span class="bigger">Используем 3D сканеры фирмы FARO130.</span></p>
			</div>
			<div class="lazs2__right">
				<img src="/images/3d/laz_s1.jpg" alt="trereeer">
			</div>
		</div>
	</div>
</div>


<div class="lazs3">
	<div class="container">
		<div class="lazs3__btn1">Получить консультацию</div>
		<a href="/upload/prezentacia_nadzor.pdf" download class="lazs3__btn2">Скачать презентацию</a>
	</div>
</div>


<div class="lazs4">
	<div class="container">
		<h2 class="lazs4__h1">У НАС УЖЕ ЗАКАЗАЛИ ЛАЗЕРНОЕ 3D СКАНИРОВАНИЕ</h2>
		<div class="lazs4__wrap">
			<div class="lazs4__item"><img src="/images/3d/partn_laz_1.png" alt="sad1"></div>
			<div class="lazs4__item"><img src="/images/3d/partn_laz_2.png" alt="sad2"></div>
			<div class="lazs4__item"><img src="/images/3d/partn_laz_3.png" alt="sad3"></div>
			<div class="lazs4__item"><img src="/images/3d/partn_laz_4.png" alt="sad4"></div>
			<div class="lazs4__item"><img src="/images/3d/partn_laz_5.png" alt="sad5"></div>
			<div class="lazs4__item"><img src="/images/3d/partn_laz_6.png" alt="sad6"></div>
			<div class="lazs4__item"><img src="/images/3d/partn_laz_7.png" alt="sad7"></div>
			<div class="lazs4__item"><img src="/images/3d/partn_laz_8.png" alt="sad8"></div>
			<div class="lazs4__item"><img src="/images/3d/partn_laz_9.png" alt="sad9"></div>
			<div class="lazs4__item"><img src="/images/3d/partn_laz_10.png" alt="sad10"></div>
		</div>
	</div>
</div>


<section class="sect4 sect4_laz">
	<div class="container">
		<div class="viewt" id="title_one">Заказать лазерное сканирование</div>
		<form id="one">
			<div class="wrap-input">
				<div class="label">Ваше имя</div>
				<input type="text" name="name_one" id="name_one">
			</div>
			<div class="wrap-input">
				<div class="label">Телефон *</div>
				<input type="tel" name="phone_one" id="phone_one" required="">
			</div>
			<input type="hidden" id="page_url" name="page_url" value="/tehnadzor/nadzor_za_stroitelstvom_doma/">
			<div class="wrap-input for-chekbox wrap-input_check">
				<div class="checkbox"><input id="check_one" type="checkbox" name="check_one" value="yes"><label for="check_one">Я согласен с правилами <a href="/agreement/">СтройЭкпертНадзора</a> <br>по обработке и хранению <br>персональных данных</label></div>
			</div>
			<div class="wrap-input wrap-input_btn"><input type="submit" value="Заказать лазерное сканирование" id="zakazat2"></div>
			<div class="clear"></div>
			<div align="center" id="check_form_one" style="color:#E0FFFF;"><b></b></div>
			<div class="clear"></div>
		</form>
	</div>
</section>



<div class="lazs5">
	<div class="container">
		<h2 class="lazs4__h1">В каких случаях вам ПОМОЖЕТ лазерное сканирование?</h2>
		<div class="lazs5__tabs tabs-wrapper">
			<div class="tab_header">
				<div class="tab"><span></span></div>
				<div class="tab"><span></span></div>
				<div class="tab"><span></span></div>
				<div class="tab"><span></span></div>
				<div class="tab"><span></span></div>
				<div class="tab"><span></span></div>
				<div class="tab"><span></span></div>
			</div>
			<div class="tab_content">
				<div class="tab_item lazs5__cont">
					<div class="lazs5__cont-left">
						<img src="/images/3d/laz_when_1.jpg" alt="lzw1">
					</div>
					<div class="lazs5__cont-right">
						<div class="lazs5__cont-h1">Cоздание обмерных чертежей этажей для последующего проектирования</div>
						<div class="lazs5__cont-text">когда отсутствует исполнительная документация</div>
					</div>
				</div>
				<div class="tab_item lazs5__cont">
					<div class="lazs5__cont-left">
						<img src="/images/3d/laz_when_2.jpg" alt="lzw2">
					</div>
					<div class="lazs5__cont-right">
						<div class="lazs5__cont-h1">Cоздание обмерных чертежей фасадов уникальных исторических зданий</div>
						<div class="lazs5__cont-text">насыщенных архитектурными элементами, скульптурой и лепниной</div>
					</div>
				</div>
				<div class="tab_item lazs5__cont">
					<div class="lazs5__cont-left">
						<img src="/images/3d/laz_when_3.jpg" alt="lzw3">
					</div>
					<div class="lazs5__cont-right">
						<div class="lazs5__cont-h1">Cоздание обмерных чертежей промышленных сооружений</div>
						<div class="lazs5__cont-text">насыщенных оборудованием и коммуникациями</div>
					</div>
				</div>
				<div class="tab_item lazs5__cont">
					<div class="lazs5__cont-left">
						<img src="/images/3d/laz_when_4.jpg" alt="lzw4">
					</div>
					<div class="lazs5__cont-right">
						<div class="lazs5__cont-h1">Для создания обмерных чертежей линейных протяжённых сооружений</div>
						<div class="lazs5__cont-text">трубопроводы и газопроводы</div>
					</div>
				</div>
				<div class="tab_item lazs5__cont">
					<div class="lazs5__cont-left">
						<img src="/images/3d/laz_when_5.jpg" alt="lzw5">
					</div>
					<div class="lazs5__cont-right">
						<div class="lazs5__cont-h1">Для подсчёта объёма складируемых сыпучих материалов</div>
						<div class="lazs5__cont-text">сложной формы</div>
					</div>
				</div>
				<div class="tab_item lazs5__cont">
					<div class="lazs5__cont-left">
						<img src="/images/3d/laz_when_6.jpg" alt="lzw6">
					</div>
					<div class="lazs5__cont-right">
						<div class="lazs5__cont-h1">Лазерное 3D сканирование для создания BIM модели существующего здания или сооружения</div>
					</div>
				</div>
				<div class="tab_item lazs5__cont">
					<div class="lazs5__cont-left">
						<img src="/images/3d/laz_when_7.jpg" alt="lzw7">
					</div>
					<div class="lazs5__cont-right">
						<div class="lazs5__cont-h1">При строительном контроле путём сопоставления проекта и сканирования построенного на объекте</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="lazs6">
	<div class="container">
		<h3 class="lazs6__h1">Преимущества лазерного сканирования</h3>
		<div class="lazs6__wrap">
			<div class="lazs6__item">
				<div class="lazs6__item-icon"><img src="/images/3d/preim_laz_1.svg" alt="asdasd"></div>
				<div class="lazs6__item-text">Существенное сокращение сроков на осуществления контрольных измерений объекта при значительно большем их числе</div>
			</div>
			<div class="lazs6__item">
				<div class="lazs6__item-icon"><img src="/images/3d/preim_laz_2.svg" alt="asdasd"></div>
				<div class="lazs6__item-text">Позволяет быстрее и точнее выполнить обмерные чертежи, исполнительную документацию</div>
			</div>
			<div class="lazs6__item">
				<div class="lazs6__item-icon"><img src="/images/3d/preim_laz_3.svg" alt="asdasd"></div>
				<div class="lazs6__item-text">Сопоставимая или меньшая стоимость обмерных работ по сравнению с измерениями с помощью классических геодезических приборов</div>
			</div>
			<div class="lazs6__item">
				<div class="lazs6__item-icon"><img src="/images/3d/preim_laz_4.svg" alt="asdasd"></div>
				<div class="lazs6__item-text">Ваши проектировщики смогут тут же приступить к созданию bim модели здания и учесть все мельчайшие нюансы и коммуникации здания</div>
			</div>
			<div class="lazs6__item">
				<div class="lazs6__item-icon"><img src="/images/3d/preim_laz_5.svg" alt="asdasd"></div>
				<div class="lazs6__item-text">Высокая точность и плотность измерений менее миллиметра. Фокусное расстояние от нескольких см, до нескольких сот метров</div>
			</div>
			<div class="lazs6__item">
				<div class="lazs6__item-icon"><img src="/images/3d/preim_laz_6.svg" alt="asdasd"></div>
				<div class="lazs6__item-text">С помощью лазерного 3D сканирования сможете моментально сопоставить факт с проектом и определить отклонения путём наложения</div>
			</div>
		</div>
	</div>
</div>


<div class="lazs7">
	<div class="container">
		<h4 class="lazs7__h1">Какая информация необходима от Вас <br>для расчёта стоимости</h4>
		<div class="lazs7__wrap">
			<div class="lazs7__item">
				<div class="lazs7__item-icon"><img src="/images/3d/info_laz_1.svg" alt="asdasd"></div>
				<div class="lazs7__item-text">Что необходимо сканировать: <br>- только фасады, <br>- только планы, <br>- и фасады, и планы</div>
			</div>
			<div class="lazs7__item">
				<div class="lazs7__item-icon"><img src="/images/3d/info_laz_2.svg" alt="asdasd"></div>
				<div class="lazs7__item-text">Площадь объекта</div>
			</div>
			<div class="lazs7__item">
				<div class="lazs7__item-icon"><img src="/images/3d/info_laz_3.svg" alt="asdasd"></div>
				<div class="lazs7__item-text">Адрес, по которому расположен объект</div>
			</div>
			<div class="lazs7__item">
				<div class="lazs7__item-icon"><img src="/images/3d/info_laz_4.svg" alt="asdasd"></div>
				<div class="lazs7__item-text">Потребуется ли Вам создание чертежей: планов, фасадов, разрезов или только облако точек?</div>
			</div>
		</div>
	</div>
</div>



<section class="sect4 sect4_laz">
	<div class="container">
		<div class="viewt" id="title_one">Заказать лазерное сканирование</div>
		<form id="one">
			<div class="wrap-input">
				<div class="label">Ваше имя</div>
				<input type="text" name="name_one" id="name_one">
			</div>
			<div class="wrap-input">
				<div class="label">Телефон *</div>
				<input type="tel" name="phone_one" id="phone_one" required="">
			</div>
			<input type="hidden" id="page_url" name="page_url" value="/tehnadzor/nadzor_za_stroitelstvom_doma/">
			<div class="wrap-input for-chekbox wrap-input_check">
				<div class="checkbox"><input id="check_one" type="checkbox" name="check_one" value="yes"><label for="check_one">Я согласен с правилами <a href="/agreement/">СтройЭкпертНадзора</a> <br>по обработке и хранению <br>персональных данных</label></div>
			</div>
			<div class="wrap-input wrap-input_btn"><input type="submit" value="Заказать лазерное сканирование" id="zakazat2"></div>
			<div class="clear"></div>
			<div align="center" id="check_form_one" style="color:#E0FFFF;"><b></b></div>
			<div class="clear"></div>
		</form>
	</div>
</section>


<div class="lazs8">
	<div class="container">
		<h4 class="lazs8__h1">Какой продукт Вы получите на выходе</h4>
		<div class="lazs8__wrap">
			<div class="lazs8__item">
				<div class="lazs8__item-icon"><img src="/images/3d/check_laz.svg" alt="asdasd"></div>
				<div class="lazs8__item-text">Облако точек Вашего объекта с точностью 5 мм в виде файла, на основе которого Ваши проектировщики смогут начать проектные работы</div>
			</div>
			<div class="lazs8__item">
				<div class="lazs8__item-icon"><img src="/images/3d/check_laz.svg" alt="asdasd"></div>
				<div class="lazs8__item-text">Так же опционально Вы можете заказать отрисовку планов, фасадов или bim модель в нашей компании</div>
			</div>
		</div>
	</div>
</div>





<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_map.php");?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>