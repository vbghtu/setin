<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<? if( $arParams["SET_JQUERY"] == "Y" ): ?>
<script type="text/javascript" src="/bitrix/components/bitrix/focus.calculator/templates/.default/js/jquery-1.5.1.min.js"></script>
<? endif; ?>
<link rel="stylesheet" href="/bitrix/components/bitrix/focus.calculator/templates/.default/js/checkbox/jquery.a-ya-checkbox.css" />
<script type="text/javascript" src="/bitrix/components/bitrix/focus.calculator/templates/.default/js/checkbox/jquery.checkbox.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {
  // ":not([safari])" is desirable but not necessary selector
  $('input:checkbox:not([safari])').checkbox();
  $('input[safari]:checkbox').checkbox({cls:'jquery-a-ya-checkbox'});
  $('input:radio').checkbox({cls:'jquery-a-ya-radio'});
});

</script>

<?
$s_group = ""; //Line with the list of groups of services. It will be transformed in Javascript an array
$s_list = ""; //Line with the list of services. It will be transformed in Javascript an array
?>

<div id="Calculator_cont">
<form id="Calculator" name="" action="calculator.php" method="get" style="margin:0px; padding:0px;">

            <div id="period" style="padding-top:10px; margin-left:20px;">
            <div style="float:left;">
            <h4><?=GetMessage("COUNT_PERIOD")?><input type="text" name="period" value="" style="width:50px;" maxlength="3"></h4>
            </div>
            </div>

    <br clear="both">
    <div id="radio_line" style="padding-top:10px; ">

<?foreach($arResult["SECTIONS"] as $arSection):?>

    <?
    //echo "<pre>"; print_r($arSection); echo "</pre>";
    $s_group .= $arSection['CODE'].": \"false\", ";
    ?>

    <div class="checkbox_box cb_<?=$arSection['CODE']?>">
    <div><input type="checkbox" safari=1 id="<?=$arSection['CODE']?>_checkbox" name="<?=$arSection['CODE']?>" value="Y" onClick="check_s_group(this)"></div><div style="width:80px; padding-left:10px;"><?=$arSection['NAME']?></div>
    </div>

<?endforeach;?>

    </div>

                <br clear="both">
                <br>

<?foreach($arResult["SECTIONS"] as $arSection):?>
<div id="<?=$arSection['CODE']?>_cont" style="display:none;">

<? $i=0; ?>
<? foreach($arSection["ITEMS"] as $arElement): ?>
<? $i++; ?>
<? $s_list .= $arSection['CODE']."_".$i.": \"false\", "; ?>

<div id="<?=$arSection['CODE']?>_<?=$i?>" class="<?=$arSection['CODE']?>_service s_line">
    <div class="<?=$arSection['CODE']?>_service_head">
        <div><input type="checkbox" safari=1 id="<?=$arSection['CODE']?>_<?=$i?>" name="<?=$arSection['CODE']?>_<?=$i?>" value="Y" onClick="check_s_one(this)"></div>
        <div class="<?=$arSection['CODE']?>_service_head_text"><?=$arElement['NAME']?></div>
    </div>

    <br clear="both">
    <input type="hidden" name="<?=$arSection['CODE']?>_<?=$i?>_cost" value="<? echo $arElement['DISPLAY_PROPERTIES']['COST']['VALUE']; ?>">

    <div id="<?=$arSection['CODE']?>_<?=$i?>_cont" class="f_cont" style="display:none;">
        <fieldset class="formFieldset">
        <ol class="formContainer" style="line-height:16px;">

        <li style="width:100%">
        <div class="formCaption"><?=GetMessage("SERVICE_DATE")?></div>
        <div class="formBody">
        <div class="form_cont">
        <input name="<?=$arSection['CODE']?>_<?=$i?>_range" type="radio" checked value="month" id="<?=$arSection['CODE']?>_<?=$i?>_month"  />
        <span style="padiing-top:5px;"><label for="<?=$arSection['CODE']?>_<?=$i?>_range"><?=GetMessage("IN_MONTH")?></label></span>
        </div>
        <div class="form_cont" style="width:150px;">
        <input name="<?=$arSection['CODE']?>_<?=$i?>_range" type="radio" value="period" id="<?=$arSection['CODE']?>_<?=$i?>_period"  />
        <label for="<?=$arSection['CODE']?>_<?=$i?>_period"><?=GetMessage("FROM_COUNT_PERIOD")?></label>
        </div>
        </div>
        <div class="formDescription"></div>
        <div class="formSeparator"></div>
        </li>

        <? if( $arElement["DISPLAY_PROPERTIES"]["QUANTITY_ACCESS"]["VALUE"] == "да" ): ?>
        <li>
        <div class="formCaption">
        <?=GetMessage("COUNT_SERVICES_FROM_PERIOD")?> <b><?=$arElement["DISPLAY_PROPERTIES"]["COST"]["VALUE"]?></b> <?=GetMessage("RUB")?>/<?=$arElement["DISPLAY_PROPERTIES"]["COST"]["DESCRIPTION"]?>
        </div>
        <div class="formBody">
        <div style="padding-top:15px;">
        <input type="text" value="" style="width:30px;" maxlength="3" name="<?=$arSection['CODE']?>_<?=$i?>_quantity" id="<?=$arSection['CODE']?>_<?=$i?>_quantity" /></div>
        </div>
        <div class="formDescription"></div>
        <div class="formSeparator" style="width:100%"></div>
        </li>
        <? else: ?>
        <input type="hidden" value="1" name="<?=$arSection['CODE']?>_<?=$i?>_quantity" id="<?=$arSection['CODE']?>_<?=$i?>_quantity" />
        <? endif; ?>

        <?
        //Get functions for print property
        for($f=1; $f<6; $f++)
        { print_koef($arElement["DISPLAY_PROPERTIES"]["UP_COST_NAME_".$f]["VALUE"], $arElement["DISPLAY_PROPERTIES"]["UP_COST_VALUE_".$f], $arSection['CODE']."_".$i."_k".$f); }
        ?>

<?
//echo "<pre>"; print_r($arElement["DISPLAY_PROPERTIES"]); echo "</pre>";
?>

                </ol>
        </fieldset>
    </div>
   </div>

<? endforeach; ?>

        <div class="service_summ" style="margin-top:5px;">
            <div class="summ_text"><?=GetMessage("SUMM")?> &nbsp; <span id="<?=$arSection['CODE']?>_summ">0</span> <?=GetMessage("RUB")?></div>
        </div>

</div>

<?endforeach?>

            <div class="service_summ" style="margin-top:15px; padding-top:15px;">
            <div style='float:left; padding-left:10px;'>
            <a href="javascript:calculate();"><img src="/bitrix/components/bitrix/focus.calculator/templates/.default/img/recost.png" border=0></a>
            </div>
            <div style='float:right;' class="summ_text"><?=GetMessage("SUMM_IN_MONTH")?> &nbsp; <span id="total_summ">0</span> <?=GetMessage("RUB")?></div>
            </div>

        <br clear="both">

</form>
</div>


<script type="text/javascript">
//Functions for calculator
s_group = { <?=substr(trim($s_group), 0, -1)?> };
s_list = { <?=substr(trim($s_list), 0, -1)?> };
</script>
<script type="text/javascript" src="/bitrix/components/bitrix/focus.calculator/templates/.default/js/template.js"></script>


<?
function print_koef(&$name, &$value, $s_id)
{
//function for coefficient print

    if( $name != "" && count($value)>0 )
    {
        //Check input type
        $type = "r";
        if ( preg_match("/^([^\/]+)\/*([^\/]*)$/", $name, $t) )
        { $name = $t[1]; $type = $t[2]; }

        ?>

        <li style="width:100%" style="border:1px solid #FF0000;">
        <div class="formCaption"><? echo $name;?></div>
        <div class="formBody">

        <?
        if( $type == "l" )
        {
            //this is a listbox
            ?>
            <div class="form_cont">
                <select name="<?=$s_id.'_0'?>" class="jamp">
            <?
            for($i=0; $i<count($value["VALUE"]); $i++)
            {
                $selected = "";
                if( $i== 0 )
                { $selected = "selected"; }
            ?>
                    <option <?=$selected?> value="<?=$value['VALUE'][$i]?>"><?=$value["DESCRIPTION"][$i]?></option>
            <? } ?>
                </select>
            </div>
            <?
        }
        elseif( $type == "ml" )
        {
            //this is a multylistbox
            ?>
            <div class="form_cont">
                <select name="<?=$s_id.'_0'?>" multiple="multiple" size="5" class="jamp" style="width:430px;">
            <?
            for($i=0; $i<count($value["VALUE"]); $i++)
            {
                $selected = "";
                if( $i== 0 )
                { $selected = "selected"; }
            ?>
                    <option <?=$selected?> value="<?=$value['VALUE'][$i]?>"><?=$value["DESCRIPTION"][$i]?></option>
            <? } ?>
                </select>
            </div>
            <?
        }
        elseif( $type == "c" )
        {
            //this is a checkbox
            for($i=0; $i<count($value["VALUE"]); $i++)
            {
                $checked = "";
                if( $i== 0 )
                { $checked = "checked"; }
                ?>
                <div class="form_cont">
                    <div><input name="<?=$s_id.'_'.$i?>" safari=1 type="checkbox" <?=$checked?> value="<?=$value['VALUE'][$i]?>" id="<?=$s_id.'_'.$i?>"  /></div>
                    <div><label for="<?=$s_id.'_'.$i?>"><?=$value["DESCRIPTION"][$i]?></label></div>
                </div>
                <?
            }
        }
        else
        {
            //this is a radiobuttons
            for($i=0; $i<count($value["VALUE"]); $i++)
            {
                $checked = "";
                if( $i== 0 )
                { $checked = "checked"; }
                ?>
                <div class="form_cont">
                    <div><input name="<?=$s_id.'_0'?>" type="radio" <?=$checked?> value="<?=$value['VALUE'][$i]?>" id="<?=$s_id.'_0'?>"  /></div>
                    <div><label for="<?=$s_id.'_0'?>"><?=$value["DESCRIPTION"][$i]?></label></div>
                </div>
                <?
            }
        }
        ?>

        </div>
        <div class="formDescription"></div>
        <div class="formSeparator"></div>
        </li>

        <?
    }
}
?>