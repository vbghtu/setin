<?php
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "NAME", "PROPERTY_TIP", "PROPERTY_KOD", "PROPERTY_IMG", "PROPERTY_URL", "PROPERTY_SITE", "PROPERTY_PISMO");
$res = CIBlockElement::GetList (Array("sort"=>"ASC"), Array("IBLOCK_ID" => 2), false, false, $arSelect);
$GLOBALS["APPLICATION"]->AddHeadString('<link rel="stylesheet" type="text/css" href="'.SITE_TEMPLATE_PATH.'/css/swiper-bundle.min.css" />');


$r=0;
$index=1;
while($row = $res->GetNext()) {
    if(!empty($row['PROPERTY_IMG_VALUE'])) {
        if($r%9==0){
            $index++;
        }
        $clients[$index][$row['ID']]['src']=CFile::ResizeImageGet($row['PROPERTY_IMG_VALUE'], array('width'=>200, 'height'=>140), BX_RESIZE_IMAGE_EXACT, true);
        $clients[$index][$row['ID']]['name']=$row['NAME'];
        $clients[$index][$row['ID']]['text']=$row['PROPERTY_KOD_VALUE']['TEXT'];
        $clients[$index][$row['ID']]['site']=$row['PROPERTY_SITE_VALUE'];

    }
    $r++;
}

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
             <a href="/portfolio" class="btn fullscreen__btn fullscreen__btn-main">
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
                 <?  foreach ($clients as &$client): ?>
                 <div class="swiper-slide clients__slider-item">
                     <?foreach($client as $item):?>
                               <div class="clients__slider-img">
                                  <img src="<?=$item['src']['src']?>" alt="<?=$item['name']?>">
                                  <a href="<?=$item['site']?>" target="_blank" class="clients__slider-hidden">
                                     <div class="tabs__item small-text">
                                        <i><?=$item['name']?></i>
                                        <p><?if(!empty($item['text'])):?><?=$item['text']?><?else:?>Крупнейшая в мире компания по производству электротехники<?endif?></p>
                                        <span class="icon-arrow-rigth clients__slider-arrow"></span>
                                     </div>
                                  </a>
                               </div>
                     <? endforeach;?>
                 </div>
               <? endforeach;?>
             </div>
          </div>
       </div>
    </div>
</section>