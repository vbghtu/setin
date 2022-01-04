<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(empty($_POST['FIO']) || empty($_POST['TELE'])) {
    die();
}

CModule::IncludeModule("iblock");

	$el = new CIBlockElement;
	$PROP = array();
	foreach($_POST as $key=>$value)
	{

		if ($key == 'MESS')
		{
			$PROP[$key][0] = array(
				"VALUE" => array(
					"TEXT" => $value,
					"TYPE" => "text"
				)
			);
		}
		else
		{
			$PROP[$key]=$value;
		}

	}
	$section_id=false;
		
	$arLoadProductArray = Array(  
		"MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем  
		"IBLOCK_ID"      => 3,  
		"IBLOCK_SECTION_ID"=>	$section_id,
		"PROPERTY_VALUES"=> $PROP,  
		"NAME"           => "Новая заявка с сайта ".date("d.n.Y H:i"),  
		"ACTIVE"         => "Y",            // активен
	);
	/*if($PRODUCT_ID = $el->Add($arLoadProductArray))
	{ */
		//CEvent::Send(
        CEvent::SendImmediate(
			"ORDER_NEW",
			"s1",
			array(
				"DATE_ORDER"=> date("d.n.Y H:i"),
				"FIO"=> htmlspecialchars($_POST['FIO']),
				"COMPANY"=> htmlspecialchars($_POST['COMPANY']),
				"MAIL"=> htmlspecialchars($_POST['MAIL']),
				"STATUS"=> htmlspecialchars($_POST['STATUS']),
				"TELE"=> htmlspecialchars($_POST['TELE']),
				"MESS"=> htmlspecialchars($_POST['MESS']),
				"SERVICE"=> htmlspecialchars($_POST['SERVICE']),
			),
			"N",
			"17"
		);

        sleep(1); ///---- ждём 1 сек
        $PRODUCT_ID = $el->Add($arLoadProductArray);
       echo "Ваша заявка принята.</p>";
	/*}
	else
	{	
		echo "<p><strong>Произошла непредвинная ошибка!</strong><br /><br />Повторите пожалуйста запрос.</p>";
	} */

?>