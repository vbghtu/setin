<!--<ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">-->
<!--    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">-->
<!--        <a itemprop="item" href="/">Главная</a>-->
<!--        <meta itemprop="position" content="1" />-->
<!--    </li>-->
<!--    <li>-->
<!--        <p><span></span>Контакты</p>-->
<!--    </li>-->
<!--</ul>-->

<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//$arResult

//delayed function must return a string
if(empty($arResult))
    return "";

$main=array('TITLE'=>'Главная','LINK'=>'/');
array_unshift($arResult, $main);

//$queue = array("orange", "banana");
//array_unshift($queue, "apple", "raspberry");
//print_r($queue);

//echo '<pre>';
//print_r($arResult);
//echo '</pre>';
//exit();
$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
//$css = $APPLICATION->GetCSSArray();
//if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
//{
//    $strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
//}

$strReturn .= '<ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
//    $arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

    if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
    {
        $strReturn .= '
			<li  itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item">
					'.$title.'
				</a>
				<meta itemprop="position" content="'.($index + 1).'" />
			</li>';
    }
    else
    {
        $strReturn .= '
			<li class="bx-breadcrumb-item">
				<span>'.$title.'</span>
			</li>';
    }
}

$strReturn .= '</ul>';

return $strReturn;
