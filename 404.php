<?php

if (strpos($_SERVER['REQUEST_URI'], "/technadzor/") !== false)
{
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: http://".$_SERVER['HTTP_HOST']."/tehnadzor/");
  die;
}


require_once($_SERVER["DOCUMENT_ROOT"]. "/bitrix/modules/main/include/prolog_before.php");

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");



$APPLICATION->IncludeComponent("bitrix:menu",".default",Array(
        "ROOT_MENU_TYPE" => "top", 
        "MAX_LEVEL" => "1", 
        "CHILD_MENU_TYPE" => "top", 
        "USE_EXT" => "Y",
        "DELAY" => "N",
        "ALLOW_MULTI_SELECT" => "Y",
        "MENU_CACHE_TYPE" => "N", 
        "MENU_CACHE_TIME" => "3600", 
        "MENU_CACHE_USE_GROUPS" => "Y", 
        "MENU_CACHE_GET_VARS" => "" 
    )
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

?>


	<section class="sect-404">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>404</h2>
					<h3>страница не найдена</h3>
					<p>Вы перешли по неверной ссылки или данная страница была удалена</p>
				</div>
				<div class="col-md-2 col-sm-2"></div>
				<div class="col-md-3 col-sm-3">
					<p>Перейдите на главную страницу</p>
					<a href="/" class="to-home">Главная</a>
				</div>
				<div class="col-md-5 col-sm-5">
					<p>Или воспользуйтесь поиском по сайту</p>
					<form method="GET" action="/search/" class="search-form">
						<input name="search" type="text" placeholder="Поиск по сайту">
						<input type="submit" value=" ">
						<div class="close-btn"></div>
					</form>
				</div>
				<div class="col-md-2 col-sm-2"></div>
			</div>
		</div>
	</section>

	
	<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>