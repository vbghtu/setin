<?
IncludeModuleLangFile(__FILE__);
?>


<form action="<?echo $APPLICATION->GetCurPage()?>" name="form1">
<?=bitrix_sessid_post()?>
<input type="hidden" name="lang" value="<?echo LANG?>">
<input type="hidden" name="id" value="focus.calculator">
<input type="hidden" name="install" value="Y">
<input type="hidden" name="step" value="2">


<? include( $_SERVER['DOCUMENT_ROOT']."/bitrix/modules/focus.calculator/install/lang/".LANG."/install/step1.php" ) ?>


<input type="submit" name="inst" value="<?= GetMessage("MOD_INSTALL")?>">
</form>
