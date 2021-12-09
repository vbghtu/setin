<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

CModule::IncludeModule("iblock");

$arSelect = Array("NAME", "PROPERTY_h1", "DETAIL_TEXT", "ID" => 1940);
$arFilter = Array("IBLOCK_ID"=>26, "ID" => 1940);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement()){
   $row = $ob->GetFields();  
} 

$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(26,1940); 

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
          <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#"><span itemprop="name"><?=$row['PROPERTY_H1_VALUE'];?></span></a><meta itemprop="position" content="2" /></span>
        </div>
      </div>
    </div>
  </section>

<section class="stat-sect1">


		<div class="container"> 
 
          <h1><?=$row['PROPERTY_H1_VALUE'];?></h1>
		  
		  <div class="row">
		  
	
	<div class="col-md-12">	
		  
		
		  
    	<?=$row['DETAIL_TEXT'];?>
       
        <?
            CModule::IncludeModule("iblock");
            $arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "PROPERTY_URL", "PROPERTY_IMAGE");
            $res = CIBlockElement::GetList (
               Array(),
               Array("IBLOCK_ID" => 11),
               false,
               false,
               $arSelect
            );

            $list_fields = array();

            while($ar_fields = $res->GetNext())
            {
              $list_fields[] = $ar_fields;
            }

            foreach ($list_fields as $elem)
            {
              $img_src = CFile::ResizeImageGet($elem["PROPERTY_IMAGE_VALUE"], array('width'=>265, 'height'=>143), BX_RESIZE_IMAGE_EXACT, true);
              $elem['IMAGE'] = $img_src['src'];

              ?>
           <div align="center">
		   
		   	<?php if(!empty($row['PROPERTY_URL_VALUE'])) { ?>
			
			<a target="_blank" href="<?=$elem['PROPERTY_URL_VALUE']?>" rel="nofollow">
			
			<?php } ?> <img src="<?=$elem['IMAGE']?>" class="preview fL" width="265" height="143"  /> <?php if(!empty($row['PROPERTY_URL_VALUE'])) { ?></a><?php } ?> </div>
      <br />
              
              <p><?=$elem['PREVIEW_TEXT']?></p>
           
          
         <?
            }
            ?> 

        
 	</div>	</div>
</div></section>



<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_map.php");?>			

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>