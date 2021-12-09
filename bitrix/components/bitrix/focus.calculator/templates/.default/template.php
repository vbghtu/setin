<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?
//echo "<pre>"; print_r($arParams); echo "</pre>";
$rsSites = CSite::GetByID(SITE_ID);
$arSite = $rsSites->Fetch();
?>

<? if( $arParams["SET_JQUERY"] == "Y" ): ?>
<script type="text/javascript" src="/bitrix/js/focus.calculator/jquery-1.5.1.min.js"></script>
<? endif; ?>
<link rel="stylesheet" href="/bitrix/js/focus.calculator/checkbox/jquery.a-ya-checkbox.css" />
<script type="text/javascript" src="/bitrix/js/focus.calculator/checkbox/jquery.checkbox.min.js"></script>
<script type="text/javascript" src="/bitrix/js/focus.calculator/lang/<?echo $arSite['LANGUAGE_ID']?>/js_script_mess.js"></script>

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
$coef_count = 5; //Количество поправочных коэффициентов
?>

<div id="Calculator_cont">
<form id="Calculator" name="Calculator" action="<? echo $arParams['ACTION']; ?>" method="get">


<?
	//Публикуем список групп услуг только если количество групп больше 1, иначе зачем показывать один чекбокс?
	$group_count = 0;
	foreach($arResult["SECTIONS"] as $arSection)
	{
		if( $arSection['IBLOCK_SECTION_ID'] == "" )
		{ $group_count++; }
	}

	$show_s_group = "";
	if( $group_count < 2 )
	{ $show_s_group = " display:none; "; }

?>


    <br clear="both">
    <div style="<? echo $show_s_group; ?>">
    <div id="radio_line">

<?foreach($arResult["SECTIONS"] as $arSection):?>

    <?
    //echo "<pre>"; print_r($arSection); echo "</pre>";
    $s_group .= $arSection['CODE'].": \"false\", ";
    ?>

    <div class="checkbox_box cb_<?=$arSection['CODE']?>">
    <div><input type="checkbox" safari=1 id="<?=$arSection['CODE']?>_checkbox" name="<?=$arSection['CODE']?>" value="Y" onClick="check_s_group(this)"></div><div class="checkbox_name"><?=$arSection['NAME']?></div>
    </div>

<?endforeach;?>

	</div>
	<br clear="both">
	<br>
    </div>



<?foreach($arResult["SECTIONS"] as $arSection):?>
<div id="<?=$arSection['CODE']?>_cont" style="display:none;">

<? $i=0; ?>
<? foreach($arSection["ITEMS"] as $arElement): ?>
<? $i++; ?>
<? $s_list .= $arSection['CODE']."_".$i.": \"false\", "; ?>

<div id="<?=$arSection['CODE']?>_<?=$i?>" class="<?=$arSection['CODE']?>_service s_line">
    <div class="free_head <?=$arSection['CODE']?>_service_head">
		<div class="free_head_checkbox"><div><input type="checkbox" safari=1 id="<?=$arSection['CODE']?>_<?=$i?>" name="<?=$arSection['CODE']?>_<?=$i?>" value="Y" onClick="check_s_one(this)"></div></div>
        <div class="free_head_text <?=$arSection['CODE']?>_service_head_text">
        <div id="<?=$arSection['CODE'].'_'.$i.'_service_head_text'?>"><?=$arElement['NAME']?></div>
        </div>
    </div>

    <div class="clear"></div>
    <input type="hidden" name="<?=$arSection['CODE']?>_<?=$i?>_cost" value="<? echo $arElement['DISPLAY_PROPERTIES']['COST']['VALUE']; ?>">

    <div id="<?=$arSection['CODE']?>_<?=$i?>_cont" class="f_cont" style="display:none;">
        <fieldset class="formFieldset">
        <ol class="formContainer">

        <li style="display:none;" class="input_range">
        <div class="formCaption"><?=GetMessage("SERVICE_DATE")?></div>
        <div class="formBody">
        <div class="form_cont period_cont">
        <input name="<?=$arSection['CODE']?>_<?=$i?>_range" type="radio" checked value="month" id="<?=$arSection['CODE']?>_<?=$i?>_month"  />
        <label for="<?=$arSection['CODE']?>_<?=$i?>_range"><?=GetMessage("IN_MONTH")?></label>
        </div>
        <div class="form_cont period_cont">
        <input name="<?=$arSection['CODE']?>_<?=$i?>_range" type="radio" value="period" id="<?=$arSection['CODE']?>_<?=$i?>_period"  />
        <label for="<?=$arSection['CODE']?>_<?=$i?>_period"><?=GetMessage("FROM_COUNT_PERIOD")?></label>
        </div>
        </div>
        <div class="formDescription"></div>
        <div class="formSeparator"></div>
        </li>


		<li>
		<?
  		//Печатаем раскрывающуюся справку (если есть)
  		if( trim( $arElement["PREVIEW_TEXT"]) != "" )
  		{
  			?>
  			<div class="preview_info_cont">
   			<div class="preview_info_button" onclick="open_info('<? echo $arSection['CODE'].'_'.$i.'_info_'.$temp[1]; ?>')">
   				<?=GetMessage("INFO")?>
   			</div>
				<div id="<? echo $arSection['CODE'].'_'.$i.'_info_'.$temp[1]; ?>" class="preview_info_body">
  			    <? echo $arElement["PREVIEW_TEXT"]; ?>
   			</div>
  			</div>
  			<?
  		}
  		?>

  		<?
  		/*
  		echo "<pre>"; print_r($arElement["DISPLAY_PROPERTIES"]["QUANTITY_ACCESS"]); echo "</pre>";
  		$property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>13, "CODE"=>"QUANTITY_ACCESS"));
		while($enum_fields = $property_enums->GetNext())
		{ echo "<pre>"; print_r($enum_fields); echo "</pre>"; }
		*/
  		?>

        <? if( $arElement["DISPLAY_PROPERTIES"]["QUANTITY_ACCESS"]["VALUE"] == "да" || $arElement["DISPLAY_PROPERTIES"]["QUANTITY_ACCESS"]["VALUE_XML_ID"] == "1" ): ?>

        <div id="<? echo $arSection['CODE'].'_'.$i.'_tarif'; ?>" class="formCaption">
        <span class='cost_text'><?=GetMessage("COST");?></span> <?=GetMessage("COUNT_SERVICES_FROM_PERIOD")?> <span class="cost_value"><?=$arElement["DISPLAY_PROPERTIES"]["COST"]["VALUE"]?></span> <span class="cost_descr"><?=GetMessage("RUB")?>/<?=$arElement["DISPLAY_PROPERTIES"]["COST"]["DESCRIPTION"]?></span> <span class='number_text'><?=GetMessage("NUMBER");?></span>
        </div>
        <div class="formBody">
        <input type="text" value="1" class="quantity" maxlength="6" name="<?=$arSection['CODE']?>_<?=$i?>_quantity" id="<?=$arSection['CODE']?>_<?=$i?>_quantity" /></div>
		<input type="hidden" name="<?=$arSection['CODE']?>_<?=$i?>_formula" value="">
        <div class="formDescription"></div>
        <div class="formSeparator"></div>

		<? elseif( $arElement["DISPLAY_PROPERTIES"]["QUANTITY_ACCESS"]["VALUE_XML_ID"] == "2" ): ?>

        <div id="<? echo $arSection['CODE'].'_'.$i.'_tarif'; ?>" class="formCaption">
        <span class='number_text'><?=GetMessage("NUMBER");?></span>
        </div>
        <div class="formBody">
        <input type="text" value="1" class="quantity" maxlength="6" name="<?=$arSection['CODE']?>_<?=$i?>_quantity" id="<?=$arSection['CODE']?>_<?=$i?>_quantity" /></div>
        <input type="hidden" name="<?=$arSection['CODE']?>_<?=$i?>_formula" value="<?=$arElement["DISPLAY_PROPERTIES"]["COST"]["DESCRIPTION"]?>">
        <div class="formDescription"></div>
        <div class="formSeparator"></div>

		<? elseif( $arElement["DISPLAY_PROPERTIES"]["QUANTITY_ACCESS"]["VALUE_XML_ID"] == "4" ): ?>

        <div id="<? echo $arSection['CODE'].'_'.$i.'_tarif'; ?>" class="formCaption">
        </div>
        <input type="hidden" value="1" name="<?=$arSection['CODE']?>_<?=$i?>_quantity" id="<?=$arSection['CODE']?>_<?=$i?>_quantity" />
        <input type="hidden" name="<?=$arSection['CODE']?>_<?=$i?>_formula" value="">

        <? else: ?>

        <div id="<? echo $arSection['CODE'].'_'.$i.'_tarif'; ?>" class="formCaption">
        <span class='cost_text'><?=GetMessage("COST");?></span> <?=GetMessage("COUNT_SERVICES_FROM_PERIOD")?> <span class="cost_value"><?=$arElement["DISPLAY_PROPERTIES"]["COST"]["VALUE"]?></span> <span class="cost_descr"><?=GetMessage("RUB")?>/<?=$arElement["DISPLAY_PROPERTIES"]["COST"]["DESCRIPTION"]?></span>
        </div>
        <div class="formSeparator"></div>
        <input type="hidden" value="1" name="<?=$arSection['CODE']?>_<?=$i?>_quantity" id="<?=$arSection['CODE']?>_<?=$i?>_quantity" />
        <input type="hidden" name="<?=$arSection['CODE']?>_<?=$i?>_formula" value="">

        <? endif; ?>
        </li>

        <?
        //Печатаем корректирующие коэффициенты
        $coef_i = 0;
        foreach($arParams["PROPERTY_CODE"] as $p)
        {
        	if( preg_match("/UP_COST_NAME_([0-9])/", $p, $temp) )
        	{
        		$coef_i++;
        		print_koef($arElement["DISPLAY_PROPERTIES"]["UP_COST_NAME_".$temp[1]]["VALUE"], $arElement["DISPLAY_PROPERTIES"]["UP_COST_VALUE_".$temp[1]], $arSection['CODE']."_".$i."_k".$temp[1]);
        		//Печатаем постоянную справку (если есть)
        	}
        }
        if( $coef_i > $coef_count )
        { $coef_count = $coef_i; }
        ?>

		<?
  		//Печатаем постоянную справку (если есть)
  		if( trim( $arElement["DETAIL_TEXT"]) != "" )
  		{
  			?>
  			<li>
  			<div class="detail_info_cont">
				<div class="detail_info_body">
  			    <? echo $arElement["DETAIL_TEXT"]; ?>
   				</div>
  			</div>
  			</li>
  			<?
  		}
  		?>


<?
//echo "<pre>"; print_r($arElement["DISPLAY_PROPERTIES"]); echo "</pre>";
?>

                </ol>
        </fieldset>
    </div>
   </div>

<? endforeach; ?>

        <div class="service_summ service_summ_cont">
            <div class="summ_text"><?=GetMessage("SUMM")?> &nbsp; <span id="<?=$arSection['CODE']?>_summ">0</span> <?=GetMessage("RUB")?></div>
        </div>

</div>

<?endforeach?>

            <div id="total_summ_cont" class="service_summ">
	            <div id="period">
	            <h5><?=GetMessage("COUNT_PERIOD")?><input type="text" name="period" value="" maxlength="3"></h5>
	            </div>

	            <div class="calculate_button">
	            <a href="javascript:calculate();" id="calculate_button"></a>
	            </div>

	            <? if( $arParams["SEND_MAIL"] == "Y" ): ?>
	            <div class="calculate_button">
	            <a href="javascript:openMailForm();" id="send_mail_button"></a>
	            </div>
	            <? endif; ?>

	            <div class="summ_text">
	            <? if( $arParams["HIDE_PERIOD"] == "Y" ): ?>
	            	<span is="clear_summ_text"><?=GetMessage("SUMM")?>&nbsp; <span id="total_summ">0</span> <?=GetMessage("RUB")?></span>
	            	<span id="clear_summ" style="display:none;">0</span>
	            <? else: ?>
	                <span is="clear_summ_text"><?=GetMessage("SUMM_IN_MONTH");?>&nbsp; <span id="total_summ">0</span> <?=GetMessage("RUB");?></span><br/>
	                <?=GetMessage("SUMM");?>&nbsp; <span id="clear_summ">0</span> <?=GetMessage("RUB");?>
	            <? endif; ?>
	            </div>
            </div>

            <div id="log_result"></div>

        <br clear="both">

        <? if( $arParams["SEND_MAIL"] == "Y" ): ?>

		<div id="mail_form">

        <? include_once("mail_form.php"); ?>

        </div>

        <? endif; ?>

</form>
</div>


<script type="text/javascript">

	//Functions for calculator
	s_group = { <?=substr(trim($s_group), 0, -1)?> };
	s_list = { <?=substr(trim($s_list), 0, -1)?> };
	clear_summ = 0;
	clear_total_summ = 0;
	coef_count = <?=$coef_count?>;
	s_log = Array();
	list_type = '<? echo $arParams["LIST_TYPE"]; ?>';


	<? if( $arParams["HIDE_PERIOD"] == "Y" ): ?>
	hide_period = true;
	<? else: ?>
	hide_period = false;
	$("div#period").show();
	$("li.input_range").show();
	<? endif; ?>


	var theForm = document.forms.Calculator;
	<?
	//если у нас только одна группа - открываем список услуг сразу
	if ( $show_s_group != "" &&  trim($arParams["OPEN_DEFAULT"]) == "" ): ?>
    for(key in s_group)
    { eval("theForm."+key+".checked=true;"); $("#"+key+"_checkbox").click(); break; }
	<? endif; ?>


	<?
	//Если переданы коды группы и услуги для открытия по умолчанию - открываем их
	if( trim($arParams["OPEN_DEFAULT"]) != "" ) :
	preg_match("/^([^\,]+)\,(.+)$/", $arParams["OPEN_DEFAULT"], $od)
	?>

		$("#<? echo $od[1]; ?>_checkbox").click();
		eval( "obj = theForm.<? echo $od[2]; ?>;" );
		obj.checked = true;
		check_s_one(obj)

	<? endif; ?>


</script>
<?/*?>
<script type="text/javascript" src="/bitrix/components/bitrix/focus.calculator/templates/.default/js/template.js"></script>
<?*/?>

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

        <li class="li_style">
        <div class="formCaption" id="<?=$s_id;?>_0_name"><? echo $name;?></div>
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
                <select name="<?=$s_id.'_0'?>" multiple="multiple" size="5" class="jamp">
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
                    <div><input name="<?=$s_id.'_0'?>" type="radio" <?=$checked?> value="<?=$value['VALUE'][$i]?>" id="<?=$s_id.'_0_'.$i?>"  /></div>
                    <div><label for="<?=$s_id.'_0_'.$i?>"><?=$value["DESCRIPTION"][$i]?></label></div>
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