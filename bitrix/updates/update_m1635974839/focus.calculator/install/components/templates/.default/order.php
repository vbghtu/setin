<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
include("lang/ru/template.php");
CModule::IncludeModule("iblock");
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
?>

<?
//echo "<pre>"; print_r($_REQUEST); echo "</pre>";


//��������� ��� ��������
if($_REQUEST['task'] != ""):

	$captcha_ok = true;
	if( COption::GetOptionString("focus.calculator", "captcha") == "Y" )
	{		//��������� �������� �����������		if (!$APPLICATION->CaptchaCheckCode($_POST["captcha_word"], $_POST["captcha_sid"])):
		$captcha_ok = false;
		?>
    	<div class="amess_err">
	    <? echo $MESS["TOFT_ERR_CAPTURE"]; ?>
		</div>
		<?
    	endif;	}

    if ($captcha_ok)
    {
		//�������� ��������� �����
		$action = $_REQUEST["task"];
		switch ($action)
		{
		    case "send":
		    studio2of3_order_send();
		    break;

		    case "null":
		    studio2of3_null();
		    break;

		    default:
		    studio2of3_err_msg();
		    break;
		}
	}

endif;


function studio2of3_err_msg()
{
//�������� ��������� �� ������
?>
	<div class="amess_err">
    <? echo $MESS["TOFT_NULL"]; ?>
	</div>
<?
}


function studio2of3_null()
{
//������� ������ ��������
    echo "";
}


function studio2of3_order_send()
{

global $APPLICATION, $MESS;
//���������� ����� ������

    $arEventFields = array(
		"ORDER_DATE" => Date("d.m.Y h:i:s"),
        "FIO" => $MESS["FIO"].": ".studio2of3_check_string($_REQUEST["FIO"]),
        "EMAIL" => $MESS["EMAIL"].": ".studio2of3_check_string($_REQUEST["EMAIL"]),
        "PHONE" => $MESS["PHONE"].": ".studio2of3_check_string($_REQUEST["PHONE"]),
        "ORDER" => $MESS["ORDER"].":\n\n".studio2of3_check_string($_REQUEST["ORDER_SOSTAV"]),
    );

    if( trim(studio2of3_check_string($_REQUEST["MESS"])) != "" )
    { $arEventFields["ORDER"] = trim(studio2of3_check_string($_REQUEST["MESS"])); }

    $arEventFields["ORDER"] = str_replace(";", ";\n", $arEventFields["ORDER"]);
    $arEventFields["ORDER"] = str_replace("--------------------", "\n--------------------\n", $arEventFields["ORDER"]);

    //��������� ������ � ���
	if( COption::GetOptionString("focus.calculator", "save_log") == "Y" )
	{
		//���������� ����� � ���
		$handle = fopen($_SERVER["DOCUMENT_ROOT"].COption::GetOptionString("focus.calculator", "log_path"), "a");
		fwrite($handle, "\n\n--------------------\n".implode(";\n", $arEventFields)."\n\n");
		fclose($handle);
	}

    //echo "<pre>"; print_r( $arEventFields ); echo "</pre>";

    //���������� ����� ������� �������� mail()
    $rsSites = CSite::GetByID(SITE_ID);
	$arSite = $rsSites->Fetch();

    $arMail = array(
    	"to" => $arSite["EMAIL"],
    	"subject" => $MESS["TOFT_ORDER_PREFIX"]." ".$arSite["SITE_NAME"],
    	"message" => implode("\n\n", $arEventFields)."\n \n \n________________________________________________________________\n".$MESS["TOFT_ORDER_POSTFIX"]
    );

    $arMail["to"] = COption::GetOptionString("focus.calculator", "to_mail");
    if( $arMail["to"] == "" )
    { $arMail["to"] = $arSite["EMAIL"]; }

	//echo "<pre>"; print_r( $arEventFields ); echo "</pre>";
	//������� ���������� ������ ���������
    if ( mail($arMail["to"], $arMail["subject"], $arMail["message"] ) == 1 )
    {    	//����� ���������� ������ �������
    	if ( mail(studio2of3_check_string($_REQUEST["EMAIL"]), $arMail["subject"], $arMail["message"] ) == 1 )
    	{
	        ?>
			<div class="amess_success">
			<h3><? echo $MESS["TOFT_ORDER_SUCCESS"]; ?></h3>
			</div>
	        <?
        }
        else
        {			//��������� ��������� �� ������
	       ?>
			<div class="amess_err">
			<h4><? echo $MESS["TOFT_ERR_MAIL"];?><h4><br><? echo $MESS["TOFT_ERR_MAIL_CLIENT"]; ?>
			</div>
	        <?        }
    }
    else
    {
		//��������� ��������� �� ������
        ?>
		<div class="amess_err">
		<? echo $MESS["TOFT_ERR_MAIL"]."<br>".$MESS["TOFT_ERR_MAIL_MANAGER"]; ?>
		</div>
        <?
    }
}





//������� ��������

function studio2of3_check_string($str)
{
    //�������� ��������
    //return iconv("utf-8", "windows-1251",  strip_tags($str));

	$str = strip_tags($str);
	if( COption::GetOptionString("focus.calculator", "mail_iconv") == "Y" )
	{ $str = studio2of3_utf8_win($str); }

	return $str;
}


function studio2of3_get_field($cod, $name, $Body)
{
// ��������� ������ �� ���� � ���� ������
    $check = false;

    for($i=1; $i<=$_REQUEST[$cod."_COUNT"]; $i++)
    {


        if( !$check && $_REQUEST[$cod.$i] != ""  )
        { $Body .= $name."\n"; $check = true; }

        if ( $_REQUEST[$cod.$i] != "" )
        { $Body .= $_REQUEST[$cod.$i]."\n"; }
    }
}



function studio2of3_utf8_win ($s)
{
// ������� �������������� ������ �� UTF-8 � Win1251
	$out="";
	$c1="";
	$byte2=false;
	for ($c=0;$c<strlen($s);$c++)
	{
		$i=ord($s[$c]);
		if ($i<=127) $out.=$s[$c];
		if ($byte2)
		{
			$new_c2=($c1&3)*64+($i&63);
			$new_c1=($c1>>2)&5;
			$new_i=$new_c1*256+$new_c2;
				if ($new_i==1025)
				{ $out_i=168; }
				else
				{
					if ($new_i==1105)
					{ $out_i=184; }
					else
					{ $out_i=$new_i-848; }
				}
			$out.=chr($out_i);
			$byte2=false;
		}
		if (($i>>5)==6)
		{
			$c1=$i;
			$byte2=true;
		}
	}
return $out;
}



?>


<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>