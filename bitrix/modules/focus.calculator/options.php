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
            //"max_file_size" => Array(GetMessage("SEARCH_OPTIONS_REINDEX_MAX_SIZE"), Array("text", "")),
            //"include_mask" => Array(GetMessage("SEARCH_OPTIONS_MASK_INC"), Array("text", 60)),
            //"exclude_mask" => Array(GetMessage("SEARCH_OPTIONS_MASK_EXC"), Array("textarea", 5, 60)),
            //"page_tag_property" => Array(GetMessage("SEARCH_OPTIONS_PAGE_PROPERTY"), Array("text", "tags")),
            "doc_text" => Array(GetMessage("FOCUS_CALCULATOR_DOCS_TEXT"), Array("htmltext", 30, 70)),
        )
    ),
);
$tabControl = new CAdminTabControl("tabControl", $aTabs);


if($REQUEST_METHOD=="POST" && strlen($Update.$Apply.$RestoreDefaults)>0 && check_bitrix_sessid())
{
    if(strlen($RestoreDefaults)>0)
    {
        COption::RemoveOption("focus.calculator");
    }
    else
    {
        $docs_text = COption::GetOptionString("focus.calculator", "docs_text");

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
    }

    if(CModule::IncludeModule('focus.calculator'))
        CSearchStatistic::SetActive(COption::GetOptionString("focus.calculator", "stat_phrase")=="Y");


    if(strlen($Update)>0 && strlen($_REQUEST["back_url_settings"])>0)
        LocalRedirect($_REQUEST["back_url_settings"]);
    else
        LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($mid)."&lang=".urlencode(LANGUAGE_ID)."&back_url_settings=".urlencode($_REQUEST["back_url_settings"])."&".$tabControl->ActiveTabParam());
}


$aMenu = array(
    array(
        "TEXT"=>GetMessage("FOCUS_CALCULATOR_CREATOR"),
        "LINK"=>"http://www.focusmedia.ru",
        "TITLE"=>GetMessage("FOCUS_CALCULATOR_CREATOR_TITLE"),
    ),
    array(
        "TEXT"=>GetMessage("FOCUS_CALCULATOR_DOCS"),
        "LINK"=>"/bitrix/modules/focus.calculator/lang/ru/readme.txt",
        "TITLE"=>GetMessage("FOCUS_CALCULATOR_DOCS_TITLE"),
    ),
);
$context = new CAdminContextMenu($aMenu);
$context->Show();

$tabControl->Begin();
?>

<? 
include("default_option.php");
//echo "<pre>"; print_r($search_default_option); echo "</pre>"; 
?>

<form method="post" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=urlencode($mid)?>&amp;lang=<?=LANGUAGE_ID?>">
<?

foreach($aTabs as $aTab):
    $tabControl->BeginNextTab();
    foreach($aTab["OPTIONS"] as $name => $arOption):
        $val = $search_default_option[$name];
        //$val = COption::GetOptionString("focus.calculator", $name);        
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
                        <textarea rows="<?echo $type[1]?>" cols="<?echo $type[2]?> "name="<?echo htmlspecialchars($name)?>" style=
                        "width:100%"><?echo htmlspecialchars($val)?></textarea>
                    <?elseif($type[0]=="simpletext"):?>
                        <?echo htmlspecialchars($val)?>
                    <?elseif($type[0]=="htmltext"):?>
                        <?echo str_replace("\n", "<br>\n", $val)?>
                    <?endif?>
            </td>
        </tr>
    <?endforeach;
endforeach;?>

<?$tabControl->Buttons();?>
    <input type="submit" name="Update" value="<?=GetMessage("MAIN_SAVE")?>" title="<?=GetMessage("MAIN_OPT_SAVE_TITLE")?>">
    <input type="submit" name="Apply" value="<?=GetMessage("MAIN_OPT_APPLY")?>" title="<?=GetMessage("MAIN_OPT_APPLY_TITLE")?>">
    <?if(strlen($_REQUEST["back_url_settings"])>0):?>
        <input type="button" name="Cancel" value="<?=GetMessage("MAIN_OPT_CANCEL")?>" title="<?=GetMessage("MAIN_OPT_CANCEL_TITLE")?>" onclick="window.location='<?echo htmlspecialchars(CUtil::addslashes($_REQUEST["back_url_settings"]))?>'">
        <input type="hidden" name="back_url_settings" value="<?=htmlspecialchars($_REQUEST["back_url_settings"])?>">
    <?endif?>
    <input type="submit" name="RestoreDefaults" title="<?echo GetMessage("MAIN_HINT_RESTORE_DEFAULTS")?>" OnClick="return confirm('<?echo AddSlashes(GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING"))?>')" value="<?echo GetMessage("MAIN_RESTORE_DEFAULTS")?>">
    <?=bitrix_sessid_post();?>
<?$tabControl->End();?>
</form>
