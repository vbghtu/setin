<?
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/options.php");
IncludeModuleLangFile(__FILE__);

$aTabs = array(
    array(
        "DIV" => "index",
        "TAB" => GetMessage("FOCUS_CALCULATOR_TAB_INDEX"),
        "ICON" => "focus.calculator_settings",
        "TITLE" => GetMessage("FOCUS_CALCULATOR_TAB_TITLE_INDEX_2"),
        "OPTIONS" => Array(
	        "mail_iconv" => Array(GetMessage("FOCUS_CALCULATOR_ICONV"), Array("checkbox", 1)),
	        "to_mail" => Array(GetMessage("FOCUS_TO_MAIL"), Array("text", 30)),
	        "save_log" => Array(GetMessage("FOCUS_LOG_SAVE"), Array("checkbox", 1)),
	        "log_path" => Array(GetMessage("FOCUS_LOG_PATH"), Array("text", 50)),
	        "captcha" => Array(GetMessage("FOCUS_CAPTCHA"), Array("checkbox", 1)),
            "doc_url" => Array(GetMessage("FOCUS_CALCULATOR_DOCS_URL"), Array("htmltext")),
            "doc_text" => Array(GetMessage("FOCUS_CALCULATOR_DOCS_TEXT"), Array("textarea", 30, 70)),
        )
    ),
);
$tabControl = new CAdminTabControl("tabControl", $aTabs);

//echo "<pre>"; print_r($_REQUEST); echo "</pre>";
include("default_option.php");

if(strlen($_REQUEST['RestoreDefaults'])>0)
{
	COption::RemoveOption("focus.calculator");
	foreach( $search_default_option as $name => $value )
	{ COption::SetOptionString("focus.calculator", $name, $value); }
	$rsSites = CSite::GetByID(SITE_ID);
	$arSite = $rsSites->Fetch();
	//echo "<pre>"; print_r(get_defined_constants()); echo "</pre>";
	$rsSites = CSite::GetList($by="sort", $order="asc");
	if ($arSite = $rsSites->Fetch())
	{ COption::SetOptionString("focus.calculator", "to_mail", $arSite["EMAIL"]); }

}
elseif( $REQUEST_METHOD=="POST" )
{
	foreach($aTabs as $i => $aTab)
	{
	    foreach($aTab["OPTIONS"] as $name => $arOption)
	    {
	        $val = $_POST[$name];
	        if($arOption[1][0]=="checkbox" && $val!="Y")
	            $val="N";

	        COption::SetOptionString("focus.calculator", $name, $val, $arOption[0]);
	    }
	}

	if(CModule::IncludeModule('search'))
	{
		if(CModule::IncludeModule('focus.calculator'))
		CSearchStatistic::SetActive(COption::GetOptionString("focus.calculator", "stat_phrase")=="Y");
    }
}

if( strlen($_REQUEST["back_url_settings"])>0 )
{ LocalRedirect($_REQUEST["back_url_settings"]); }
//else
//    LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($mid)."&lang=".urlencode(LANGUAGE_ID)."&back_url_settings=".urlencode($_REQUEST["back_url_settings"])."&".$tabControl->ActiveTabParam());

$aMenu = array(
    array(
        "TEXT"=>GetMessage("FOCUS_CALCULATOR_CREATOR"),
        "LINK"=>"http://www.focusmedia.ru",
        "TITLE"=>GetMessage("FOCUS_CALCULATOR_CREATOR_TITLE"),
    ),
    array(
        "TEXT"=>GetMessage("FOCUS_CALCULATOR_DOCS"),
        "LINK"=>"/bitrix/modules/focus.calculator/lang/".LANG."/readme.txt",
        "TITLE"=>GetMessage("FOCUS_CALCULATOR_DOCS_TITLE"),
    ),
);
$context = new CAdminContextMenu($aMenu);
$context->Show();

$tabControl->Begin();

?>

<form method="post" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=urlencode($mid)?>&amp;lang=<?=LANGUAGE_ID?>" name="calculator_settings">
<?

foreach($aTabs as $aTab):
    $tabControl->BeginNextTab();
    foreach($aTab["OPTIONS"] as $name => $arOption):
        /*
	    if( strlen($_REQUEST['RestoreDefaults'])>0 )
        { $val = $search_default_option[$name]; }
        else
        { $val = COption::GetOptionString("focus.calculator", $name); echo $name." ".$val."<br/>"; }
        */
        $val = COption::GetOptionString("focus.calculator", $name);
        $type = $arOption[1];
    ?>
        <tr>
            <td valign="top" width="50%"><?if($type[0]=="checkbox")
                            echo "<label for=\"".htmlspecialchars($name)."\">".$arOption[0]."</label>";
                        else
                            echo $arOption[0];?></td>
            <td valign="top" width="50%">
                    <?if($type[0]=="checkbox"):?>
                        <input type="checkbox" name="<?echo htmlspecialchars($name)?>" id="<?echo htmlspecialchars($name)?>" value="Y"<?if($val=="Y")echo" checked";?>>
                    <?elseif($type[0]=="text"):?>
                        <input type="text" size="<?echo $type[1]?>" maxlength="255" value="<?echo htmlspecialchars($val)?>" name="<?echo htmlspecialchars($name)?>">
                    <?elseif($type[0]=="textarea"):?>
                        <textarea rows="<?echo $type[1]?>" cols="<?echo $type[2]?> "name="<?echo htmlspecialchars($name)?>" style="width:100%"><?echo $val?></textarea>
                    <?elseif($type[0]=="simpletext"):?>
                        <?echo htmlspecialchars($val)?>
                    <?elseif($type[0]=="htmltext"):?>
                        <?echo $val;?>
                    <?elseif($type[0]=="link"):?>
                    	<a href="<?echo htmlspecialchars($val)?>"><?echo htmlspecialchars($name)?></a>
                    <?endif?>
            </td>
        </tr>
    <?endforeach;
endforeach;?>

<?$tabControl->Buttons();?>
	<?/*?>
    <input type="submit" name="Update" value="<?=GetMessage("MAIN_SAVE")?>" title="<?=GetMessage("MAIN_OPT_SAVE_TITLE")?>">
    <?*/?>
    <input type="submit" name="Apply" value="<?=GetMessage("MAIN_OPT_APPLY")?>" title="<?=GetMessage("MAIN_OPT_APPLY_TITLE")?>">
    <?if(strlen($_REQUEST["back_url_settings"])>0):?>
        <input type="button" name="Cancel" value="<?=GetMessage("MAIN_OPT_CANCEL")?>" title="<?=GetMessage("MAIN_OPT_CANCEL_TITLE")?>" onclick="window.location='<?echo htmlspecialchars(CUtil::addslashes($_REQUEST["back_url_settings"]))?>'">
        <input type="hidden" name="back_url_settings" value="<?=htmlspecialchars($_REQUEST["back_url_settings"])?>">
    <?endif?>
    <input type="button" name="RestoreButton" title="<?echo GetMessage("MAIN_HINT_RESTORE_DEFAULTS")?>" OnClick="RestoreDefault()" value="<?echo GetMessage("MAIN_RESTORE_DEFAULTS")?>">
    <?=bitrix_sessid_post();?>
<?$tabControl->End();?>
<script>
function RestoreDefault()
{
	if( confirm('<?echo AddSlashes(GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING"))?>') )
	{
		document.location = "<?echo $APPLICATION->GetCurPage()?>?RestoreDefaults=Y&lang=<?echo LANG?>&mid=<?echo urlencode($mid)."&".bitrix_sessid_get();?>";
	}
}
</script>
</form>
