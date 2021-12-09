<?
global $MESS;
$PathInstall = str_replace('\\', '/', __FILE__);
$PathInstall = substr($PathInstall, 0, strlen($PathInstall)-strlen('/index.php'));
IncludeModuleLangFile($PathInstall.'/install.php');
include($PathInstall.'/version.php');

if (class_exists('flesk_photorandomscroll')) return;

Class flesk_photorandomscroll extends CModule
{
	var $MODULE_ID = "flesk.photorandomscroll";
	public $MODULE_VERSION;
	public $MODULE_VERSION_DATE;
	public $MODULE_NAME;
	public $MODULE_DESCRIPTION;
	public $PARTNER_NAME;
	public $PARTNER_URI;
	public $MODULE_GROUP_RIGHTS = 'N';

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

		$this->PARTNER_NAME = GetMessage("FLESK_PARTNER_NAME");
		$this->PARTNER_URI = 'http://flesk.su/development/components/foto-skroyler';

		$this->MODULE_NAME = GetMessage('FLESK_MODULE_NAME');
		$this->MODULE_DESCRIPTION = GetMessage('FLESK_MODULE_DESCRIPTION');
	}

	function DoInstall()
	{
		CopyDirFiles($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/flesk.photorandomscroll/install/components/',
					$_SERVER['DOCUMENT_ROOT'].'/bitrix/components/flesk.su/', true, true);
		RegisterModule('flesk.photorandomscroll');
	}

	function DoUninstall()
	{
		UnRegisterModule('flesk.photorandomscroll');
	}
}
?>