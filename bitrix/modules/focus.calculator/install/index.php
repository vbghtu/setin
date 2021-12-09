<?
global $MESS;
$PathInstall = str_replace('\\', '/', __FILE__);
$PathInstall = substr($PathInstall, 0, strlen($PathInstall)-strlen('/index.php'));
IncludeModuleLangFile($PathInstall.'/install.php');
include($PathInstall.'/version.php');
include('tools/file_system.php');

if (class_exists('focus_calculator')) return;

Class focus_calculator extends CModule
{
    var $MODULE_ID = "focus.calculator";
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;
    public $MODULE_CSS;
    public $PARTNER_NAME;
    public $PARTNER_URI;


    function __construct()
    {

        $arModuleVersion = array();

        $path = str_replace('\\', '/', __FILE__);
        $path = substr($path, 0, strlen($path) - strlen('/index.php'));
        include($path.'/version.php');

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->PARTNER_NAME = GetMessage("FOCUS_PARTNER_NAME");
        $this->PARTNER_URI = 'http://www.focusmedia.ru/';

        $this->MODULE_NAME = GetMessage('FOCUS_MODULE_NAME');
        $this->MODULE_DESCRIPTION = GetMessage('FOCUS_MODULE_DESCRIPTION');
    }



    function DoInstall()
    {

        global $DOCUMENT_ROOT, $APPLICATION, $step;
        $step = IntVal($step);

        if($step < 2)
        {
            $APPLICATION->IncludeAdminFile(GetMessage("FOCUS_INSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/focus.calculator/install/step1.php");

        }
        elseif($step == 2)
        {
            copyDir($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/focus.calculator/install/components/',
            $_SERVER['DOCUMENT_ROOT'].'/bitrix/components/bitrix/focus.calculator');
            copyDir($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/focus.calculator/install/iblock/',
            $_SERVER['DOCUMENT_ROOT'].'/upload/');
            RegisterModule('focus.calculator');

            $APPLICATION->IncludeAdminFile(GetMessage("FOCUS_INSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/focus.calculator/install/step2.php");
        }


    }

    function DoUninstall()
    {
        removeDir($_SERVER['DOCUMENT_ROOT'].'/bitrix/components/bitrix/focus.calculator');
        unlink($_SERVER['DOCUMENT_ROOT'].'/upload/calculator.xml');

        UnRegisterModule('focus.calculator');
    }
    

}
?>