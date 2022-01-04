<?php
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "NAME", "PROPERTY_TIP", "PROPERTY_KOD", "PROPERTY_IMG", "PROPERTY_URL", "PROPERTY_SITE", "PROPERTY_PISMO");
$res = CIBlockElement::GetList (Array("sort"=>"ASC"), Array("IBLOCK_ID" => 2), false, false, $arSelect);

$i = 0;

while($row = $res->GetNext()) {

    if(!empty($row['PROPERTY_IMG_VALUE'])) {
        $clients[$row['ID']]['src']=CFile::ResizeImageGet($row['PROPERTY_IMG_VALUE'], array('width'=>200, 'height'=>140), BX_RESIZE_IMAGE_EXACT, true);
        $clients[$row['ID']]['name']=$row['NAME'];

    }
}
echo '<pre>';
print_r($clients);
echo '</pre>';
// exit;
    ?>

<section class="section clients">
    <div class="container">
       <div class="clients__body">
          <div class="clients__info text">
             <div class="clients__title title">
                <span></span>
                <h2>Клиенты<strong>.</strong></h2>
             </div>
             <p>Компании, которые доверили нам свою репутацию</p>
             <a href="#" class="btn fullscreen__btn fullscreen__btn-main">
                все компании
             </a>
             <div class="clients__slider-controls">
                <div class="clients__slider-prev prev">
                   <span class="icon-arrow-left clients__slider-icon"></span>
                </div>
                <div class="clients__slider-next next">
                   <span class="icon-arrow-rigth clients__slider-icon"></span>
                </div>
             </div>
          </div>
          <div class="clients__slider swiper">
             <div class="swiper-wrapper">
                    <div class="swiper-slide clients__slider-item">
                               <div class="clients__slider-img">
                                  <img src="img/clients-1.png" alt="">
                                  <a href="#" class="clients__slider-hidden">
                                     <div class="tabs__item small-text">
                                        <i>Пятёрочка</i>
                                        <p>Крупнейшая в мире компания по производству электротехники</p>
                                        <span class="icon-arrow-rigth clients__slider-arrow"></span>
                                     </div>
                                  </a>
                               </div>
                    <!-- 9-->
                    </div>
                
             </div>
          </div>
       </div>
    </div>
</section>