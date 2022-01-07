<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
CModule::IncludeModule("iblock");

$arSelect = Array("NAME", "PROPERTY_h1", "DETAIL_TEXT", "ID" => 1953);
$arFilter = Array("IBLOCK_ID"=>26, "ID" => 1953);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement()){
   $row = $ob->GetFields();  
} 

$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(26,1953); 

$IPROPERTY = $ipropValues->getValues();

$APPLICATION->SetTitle($IPROPERTY['ELEMENT_META_TITLE']);
$APPLICATION->SetPageProperty("description", $IPROPERTY['ELEMENT_META_DESCRIPTION']);
?>


<section class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/"><span itemprop="name">Главная</span></a><meta itemprop="position" content="1" /></span>
				<span> / </span>
				<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/pereplanirovka/"><span itemprop="name">Перепланировка</span></a><meta itemprop="position" content="2" /></span>
				<span> / </span>
				<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#"><span itemprop="name"><?=$row['PROPERTY_H1_VALUE'];?></span></a><meta itemprop="position" content="3" /></span>
			</div>
		</div>
	</div>
</section>

<section class="stat-sect1 ekspert_sect2">
	<div class="container">
		
		<div class="row">	<div class="col-md-12">	

			<h1>Стоимость согласования перепланировки</h1>

	

	<?=$row['DETAIL_TEXT'];?>

		</div>
	</div>
</div>
</section>

<section class="sect4">
	<div class="container">
		<div class="viewt" id="title_ten">Заказать перепланировку</div>
		<form id="ten">
			<div class="wrap-input">
				<div class="label">Ваше имя</div>
				<input type="text" name="name_ten" id="name_ten">
			</div>
			<div class="wrap-input">
				<div class="label">Телефон *</div>
				<input type="tel" name="phten_ten" id="phten_ten" required>
			</div>

			<input id="type" name="type" type="hidden" value="заказ перепланировки">

			<div class="wrap-input for-chekbox">
				<div class="checkbox">
					<input id="check_ten" type="checkbox" name="check_ten" value="yes">
					<label for="check_ten">
						Я согласен с <a href="/agreement/">правилами компании</a> <br>
						по обработке и хранению <br>
						персональных данных
					</label>
				</div>

			</div>
			<div class="wrap-input">
				<input type="submit" value="Заказать перепланировку">
			</div>

			<div class="clear"></div>

			<div align="center" id="check_form_ten" style="color:#E0FFFF;"><b></b></div>

			<div class="clear"></div>
		</form>
	</div>
</section>



<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_form.php");?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>				 