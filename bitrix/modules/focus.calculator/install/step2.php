<?
if(!check_bitrix_sessid()) return;
IncludeModuleLangFile(__FILE__);
?>

<form action="<?echo $APPLICATION->GetCurPage()?>">


    <? include( $_SERVER['DOCUMENT_ROOT']."/bitrix/modules/focus.calculator/install/lang/".LANG."/install/step2.php" ) ?>


    <input type="hidden" name="lang" value="<?echo LANG?>">
    <input type="submit" name="" value="<?echo GetMessage("MOD_BACK")?>">
</form>
