<h2><?=GetMessage("FORM_TITLE");?></h2>

<div id="order_cont">
<a name="order_cont"></a>
<div class="field_name" id="order_name"><b><?=GetMessage("FORM_SOSTAV");?></b></div>

<div id="order_preview"></div>
<textarea id="ORDER_SOSTAV" name="ORDER_SOSTAV" rows="20"></textarea>

<div id="order_control">
<div id="order_view" style="display:none;"></div>
<span style="display:none;"><b><?=GetMessage("FORM_TOTAL_COST");?> <span id="order_total_summ">0</span> <?=GetMessage("FORM_VALUTA");?>.</b></span>
</div>

<br clear="all" />

<div id="fio" class="text_field">
	<div class="field_name" id="fio_name"><?=GetMessage("FORM_FIO");?><sup>*</sup></div>
	<input type="text" name="FIO" />
	<div class="formDescription"></div>
</div>

<div id="email" class="text_field">
	<div class="field_name" id="email_name">e-mail<sup>*</sup></div>
	<input type="text" name="EMAIL" />
	<div class="formDescription"></div>
</div>

<div id="phone" class="text_field">
	<div class="field_name" id="phone_name"><?=GetMessage("FORM_PHONE");?> <sup>*</sup></div>
	<input type="text" name="PHONE" />
	<div class="formDescription"></div>
</div>

<div id="company" class="text_field">
	<div class="field_name" id="company_name"><?=GetMessage("FORM_COMPANY");?></div>
	<input type="text" name="COMPANY" />
	<div class="formDescription"></div>
</div>

<br clear="all" />
<br/>

<div id="mess">
  <div class="field_name" id="mess_name"><?=GetMessage("FORM_MESS");?></div>
  <textarea name="MESS" rows="7"></textarea>
</div>

<? if( COption::GetOptionString("focus.calculator", "captcha") == "Y" ): ?>
<? $code=$APPLICATION->CaptchaGetCode(); ?>
<div id="captcha_cont">
<input type="hidden" name="captcha_sid" value="<?=$code;?>" />
	<div id="captcha_name">
		<?=GetMessage("FORM_FIELD_CAPTCHA_NAME");?>
	</div>
	<div class="captcha_div">
	<div id="captcha_img">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$code;?>" alt="CAPTCHA" />
	</div>
	</div>
	<div class="captcha_div">
	<div id="captcha_form_name">
        <?=GetMessage("FORM_FIELD_CAPTCHA");?>
	</div>
	<div id="captcha_form">
		<input type="text" value="" id="captcha_word" name="captcha_word" maxlength="5" />
	</div>
	</div>
</div>
<? endif; ?>

<a name="send_order"></a>
<div id="order_submit">
<input id="submit_button" type="submit" name="Submit" value="<?=GetMessage("FORM_TO_MANAGER");?>" />
</div>

<div id="send_process"><?=GetMessage("FORM_SEND_DATA");?><div id="loading"></div></div>
<div id="send_result"></div>

</div>

<script type="text/javascript" src="/bitrix/js/focus.calculator/control.js"></script>
<script type="text/javascript" src="/bitrix/js/focus.calculator/jquery.validate.js"></script>

<script>
function focus_SendOrder()
{

//Функция проверки и отправки заказа

	$.post(
		theForm.action,
		{
			FIO: theForm.FIO.value,
			EMAIL: theForm.EMAIL.value,
			PHONE: theForm.PHONE.value,
			MESS: theForm.MESS.value,
			ORDER_SOSTAV: theForm.ORDER_SOSTAV.value,
			<? if( COption::GetOptionString("focus.calculator", "captcha") == "Y" ): ?>
			captcha_sid: theForm.captcha_sid.value,
			captcha_word: theForm.captcha_word.value,
			<? endif; ?>
			task: "send"
		},
		function(data) {
	        $('#send_result').html(data);
   });


}
</script>

<script>
    var theForm = document.Calculator;
    var arFieldMonitor = [ 'FIO', 'EMAIL', 'PHONE' ];
</script>

<script>

	$(document).ready(function() {

	//Проверка полей заказа
    jQuery.validator.messages.required = "<?=GetMessage("FORM_FIELD_REQUIRE");?>";
    jQuery.validator.messages.email = "<?=GetMessage("FORM_FIELD_ERR_EMAIL");?>";
    jQuery.validator.messages.minlength = "<?=GetMessage("FORM_FIELD_ERR_QUANTITY");?>";
    jQuery.validator.messages.maxlength = "<?=GetMessage("FORM_FIELD_ERR_QUANTITY_SYMBOLS");?>";
    jQuery.validator.messages.phone = "<?=GetMessage("FORM_FIELD_ERR_PHONE");?>";
    jQuery.validator.messages.symbols = "<?=GetMessage("FORM_FIELD_ERR_SYMBOLS");?>";


    //
    jQuery.validator.addMethod("phone", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || !studio2of3_SimpleCheckOnExist(' +()-0123456789', phone_number);
    }, "<?=GetMessage("FORM_FIELD_ERR_PHONE");?>.");

    //    HTML
    jQuery.validator.addMethod("symbols", function(text, element) {
    text = text.replace(/\s+/g, "");
    return this.optional(element) || !text.match(/(\<|\>)/);
    }, jQuery.validator.messages.symbols+" <?=GetMessage("FORM_FIELD_ERR_HTML");?>");


    $("#Calculator").validate({


        submitHandler: function(form) {
            $('#send_result').html($('#send_process').html());
            $('#send_result').show();
            focus_SendOrder();
        },


        rules: {

            "FIO": {
                required: true,
                minlength: 3,
                maxlength: 100,
                symbols: true
            },


            "EMAIL": {
                required: true,
                minlength: 3,
                maxlength: 50,
                email: true
            },


            "PHONE": {
                required: true,
                minlength: 7,
                maxlength: 36,
                phone: true
            }

        },

        messages: {

            "FIO": {
                    minlength: "<?=GetMessage("FORM_FIELD_MIN");?> <?=GetMessage("FORM_FIELD_LENGTH");?> - 3 <?=GetMessage("FORM_FIELD_SIMBOL1");?>",
                    maxlength: "<?=GetMessage("FORM_FIELD_MAX");?> <?=GetMessage("FORM_FIELD_LENGTH");?> - 100 <?=GetMessage("FORM_FIELD_SIMBOL2");?>"
                },

            "PHONE": {
                    minlength: jQuery.validator.messages.phone,
                    maxlength: jQuery.validator.messages.phone
                },


            "EMAIL": {
                    minlength: "<?=GetMessage("FORM_FIELD_MIN");?> <?=GetMessage("FORM_FIELD_LENGTH");?> - 3 <?=GetMessage("FORM_FIELD_SIMBOL1");?>",
                    maxlength: "<?=GetMessage("FORM_FIELD_MAX");?> <?=GetMessage("FORM_FIELD_LENGTH");?> - 100 <?=GetMessage("FORM_FIELD_SIMBOL2");?>"
                }

            },

            debug:true

            });


});

</script>