<?php

$arSelect = Array("NAME", "PROPERTY_ADDRESS", "PREVIEW_PICTURE", "PROPERTY_OPIS_1", "DETAIL_PAGE_URL", "IBLOCK_SECTION_ID");

$res = CIBlockElement::GetList (Array('ID' => 'DESC'), Array("IBLOCK_ID" => 7, "!PREVIEW_PICTURE" => false), false, Array("nTopCount" => 24), $arSelect);

$row = array();

$i = 1;

$slider = '<div class="item">';

while($row = $res->GetNext()){

	$i++;
	
	$slider .= '
	<div class="wrap-img">
	<a class="modal-image" href="' . CFile::GetPath($row['PREVIEW_PICTURE']) .'"><span itemscope itemtype="http://schema.org/ImageObject"><img src="' . CFile::GetPath($row['PREVIEW_PICTURE']) .'" itemprop="contentUrl" title="' . $row['NAME'] . '" alt="' . $row['NAME']. ' - СтройЭкспертНадзор"></span></a>
	</div>';

	$slider_mobile .= '<div class="item"><div class="wrap-img"><a class="modal-image" href="' . CFile::GetPath($row['PREVIEW_PICTURE']) .'"><span itemscope itemtype="http://schema.org/ImageObject"><img src="' . CFile::GetPath($row['PREVIEW_PICTURE']) .'" title="' . $row['NAME'] . '" alt="' . $row['NAME']. ' - СтройЭкспертНадзор" itemprop="contentUrl""></span></a></div></div>';

	if ($i % 2 && $i < 25) {

		$slider .= '</div><div class="item">';
		
	}

}

$slider .= "</div>";					

?>

<div class="wrap-absect6-slider">

	<!-- Слайдер, который будет отображаться на ДЕСКТОПЕ -->
	<div class="absect6-slider owl-carousel">
		<?=$slider;?>
	</div>

	<!-- Слайдер, который будет отображаться на МОБИЛЬНЫХ -->
	<div class="absect6-mobile-slider owl-carousel">
		<?=$slider_mobile ;?>
	</div>

	<div id="absect6_owl_prev"></div>
	<div id="absect6_owl_next"></div>
</div>
<div class="col-md-12">
	<div class="wrap-btn">
		<a href="/review/" class="to-portfolio">Все отзывы</a>
	</div>
</div>
