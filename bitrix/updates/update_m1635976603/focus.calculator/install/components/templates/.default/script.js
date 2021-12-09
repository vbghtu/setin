function check_s_group(obj)
{
    //Раскрытие - скрытие группы услуг
    eval ( "var cb = theForm."+obj.name+";" );
	//Определяем версию jQuery
	jv = $.fn.jquery;
	jv = jv.substr(0, 3);

	if( list_type == 'onelist' )
	{
		//Сначала закрываем все открытые группы, кроме отмеченой
		for(key in s_group)
		{
			//Если $.fn.jquery > 1.9 - true совпадает с выделением т.е. obj.checked = true, иначе запаздывает и obj.checked = false
			if( (jv < '1.9' && key != obj.name && obj.checked == false) || ( jv >= '1.9' && key != obj.name && obj.checked == true ) )
			{
				$('#'+key+'_cont').hide();
				s_group[key] = false;
				eval ( "cb = theForm."+key+";" );
				cb.checked=false;
			}
		}
	}

	if( (cb.checked == false && obj.checked && jv >= '1.9') || ( cb.checked == false && jv < '1.9' ) )
	{ $('#'+obj.name+'_cont').show(); s_group[obj.name] = true; }
	else if( ( cb.checked == false && obj.name == cb.name && jv >= '1.9' ) || ( cb.checked && jv < '1.9' ) )
	{ $('#'+obj.name+'_cont').hide(); s_group[obj.name] = false; }


	//При любом раскрытии-скрытии обнуляем сумму и скрываем форму отправки
    $("#clear_summ").html("0");
    $("#total_summ").html("0");
    closeMailForm();
}

function check_s_one(obj)
{
    //Раскрытие - скрытие услуги
    if( $('#'+obj.name+'_cont').css("display") == "none" )
    { $('#'+obj.name+'_cont').css("display", ""); s_list[obj.name] = true; }
    else
    { $('#'+obj.name+'_cont').css("display", "none"); s_list[obj.name] = false; }
}


function calculate()
{
//Собственно - расчет
var total_summ = 0;
	clear_summ = 0;

	//очищаем лог
	for(key in s_log)
	{ s_log[key] = ""; }

    //Обходим все выделенные группы услуг
    for(key in s_group)
    {
        var key_summ = 0;
        //Обходим каждую выделенную группу услуг
        //alert(key+" "+s_group[key]);
        if( s_group[key] == true )
        { key_summ = calculate_group_services(key); }
        total_summ += key_summ;
    }

    //Выставляем общую сумму
    $("#clear_summ").html( clear_summ.toFixed(2) );
    //Выставляем суммы по группам
    if( theForm.period.value.replace(/[^0-9]/g,"") != "" )
    {
    	period = theForm.period.value;
    	if( period == 0 )
    	{ alert(jsScriptMess['err_null_division']); }
    	else
    	{ total_summ = clear_summ/period; }
    }
    $("#total_summ").html( total_summ.toFixed(2) );


    //Записываем данные лога
    $("div#log_result").text("");

    var temp = "";
    for(key in s_log)
    { temp += "'"+key+"', "; }
    eval("var temp_key = ["+temp.substr(0,temp.length-2)+"]");
    temp_key.sort();
    var b = temp_key.concat([]);
    temp_key = temp_key.reverse();

    //for(key in s_log)
    for(key in temp_key)
    {
		if( s_log[temp_key[key]] != undefined )
    	{ $("div#log_result").text( "\n"+$("div#log_result").text()+s_log[temp_key[key]] ); }
    }
	$("div#log_result").text( $("div#log_result").text()+"\n________________________________________________________________________________\n"+jsScriptMess['itog']+": "+clear_summ.toFixed(2));
    var period = theForm.period.value;
    if( period != "" )
    {
    	$("div#log_result").text( $("div#log_result").text()+"\n"+$.trim($("div#period").text())+" "+period );
    	$("div#log_result").text( $("div#log_result").text()+"\n"+$.trim($("span#clear_summ_text").text()) );
    }
}

function calculate_group_services(gkey)
{
//Подсчет внутри группы услуг
var total_summ = 0;
clear_total_summ = 0;

    //Обходим все выделенные услуги
    for(key in s_list)
    {
        var key_summ = 0;
        //Обходим каждую выделенную услугу в группе услуг
        //alert(key+" "+s_list[key]+" "+key.indexOf(gkey));
        if( s_list[key] == true && key.indexOf(gkey)>=0 )
        { key_summ = calculate_one_service(key); }
        total_summ += key_summ;
    }

    $("#"+gkey+"_summ").html( clear_total_summ.toFixed(2) );
    s_log[gkey] = "\n________________________________________________________________________________\n"+jsScriptMess['itog']+": "+clear_total_summ.toFixed(2)+"\n \n \n \n";

    //alert('Group: '+key+"="+total_summ);
    return total_summ;
}

function calculate_one_service(key)
{
//Подсчет внутри одной услуги
//alert('Service: '+key);

    var sum = 0;
    var theForm = document.forms.Calculator;
    s_log[key] = "\n \n################################################################################\n"+$("div#"+key+"_service_head_text").text()+"\n################################################################################\n \n";

    var quantity = 1;
    //alert( eval('theForm.'+key+'_quantity.value') );
    eval('quantity = theForm.'+key+'_quantity.value');
    quantity = quantity.replace(/[^0-9]/g,"")
    if( quantity != "" )
    {
        //Получаем численное значение тарифа
        eval ("var tarif = theForm."+key+"_cost.value");
        sum = quantity * tarif;


		eval ("var formula = theForm."+key+"_formula.value");
		formula = formula.replace(/\s+/g,"");
		if( formula == "" )
        {
	        //Учитываем поправочные коэффициенты 1-5
	        temp = $("div#"+key+"_tarif span.cost_text").text()+" ";
	        temp += $("div#"+key+"_tarif span.cost_value").text()+" ";
	        temp += $("div#"+key+"_tarif span.cost_descr").text();
	        temp = temp.replace(/\s+/g," ");
	        temp += "\n"+$("div#"+key+"_tarif span.number_text").text();
	       	s_log[key] += $.trim(temp)+": "+quantity+"\n";
	        for(k=1; k<=coef_count; k++)
	        { sum = calculate_coef(key+"_k"+k+"_0", sum); }
        }
        else
        {        	s_log[key] += $.trim($("div#"+key+"_tarif").text().replace(/\s+/g," "))+": "+quantity+"\n";        	//если расчет по формуле - рассчитываем
			//получаем все прочие слагаемые, множители и делители формулы, которые не функции
			var result = "";
			var regexp = /([^\s\+\-\*\/\(\)]+)/g;
			var scalar_key = formula.match(regexp);

			if(scalar_key != null)
			{
				if( result == "" )
				{ result = formula; }
				var scalar_value = new Array();
	        	for (var i = 0; i < scalar_key.length; i++)
				{
					val = parseInt(scalar_key[i]);
					if ( isNaN(val) )
					{
						scalar_value[i] = calculate_coef(key+"_"+scalar_key[i]+"_0", 0);
						//подставляем значение скаляра
						result = result.replace(scalar_key[i], scalar_value[i]);
					}
				}
			}

	        //выполняем формулу
			eval("sum = "+quantity+result);        }

        var period = 1;
        //Если выбран расчет за период - делим на количество единиц периода
        var select_period = ""
        eval('select_period = theForm.'+key+'_range');
        if( theForm.period.value.replace(/[^0-9]/g,"") != "" )
        { period = theForm.period.value; }
        if( select_period[1].checked )
        { clear_summ += sum; clear_total_summ += sum; }
        else
        { clear_summ += sum*period; clear_total_summ += sum*period; }
    }
    else
    { alert(jsScriptMess['err_number']); }

    return sum;
}

function calculate_coef(key, sum)
{
//Учитываем поправочные коэффициенты

    //Определяем, что это за поле
    var theForm = document.forms.Calculator;
    var temp = "";

    var field;
    //alert(theForm+" "+'field = theForm.'+key)
    //Проверяем существование поля
    if( eval('theForm.'+key) )
    {
        eval('field = theForm.'+key);
        if( field.type == "select-one" )
        {
            //Это список с единичным выбором
            //alert('select_one');
            temp = field[field.selectedIndex].value;
            sum = correct_sum(temp, sum);
            to_log(key, field[field.selectedIndex].text);
        }
        else if( field.type == "select-multiple" )
        {
            //Это список с множественным выбором
            //alert('select_multyple');
            for(j=0; j<field.options.length; j++)
            {
                if( field.options[j].selected )
                {
                	temp = field.options[j].value;
                	sum = correct_sum(temp, sum);
                	to_log(key, field.options[j].text);
                }
            }
        }
        else if( field.type == "checkbox" )
        {
            //Это чекбокс
            if( field.checked )
            {
            	temp =  field.value;
            	sum = correct_sum(temp, sum);
            	to_log(key, $("label[for='"+key+"']").text());
            }
            //Проверяем а нет ли списка чекбоксов
            var c_key = key.substring(0, key.length-1);
            var ci = 1;
            //Проходимся по всему списку и выполняем операцию корректировки суммы на выделенных чекбоксах
            while( eval('theForm.'+c_key+ci) )
            {
                eval('var c_field = theForm.'+c_key+ci);
                if( c_field.checked )
                {                	temp =  c_field.value;
                	sum = correct_sum(temp, sum);
                	to_log(key, $("label[for='"+c_key+ci+"']").text());
                }
                ci++;
            }
        }
        else if( field.type == "radio" )
        {
        	//Это единичная радио-кнопка
        	temp = field.value;
         	sum = correct_sum(temp, sum);
        	to_log(key, $("label[for='"+key+"_0']").text());
        }
        else
        {
            //Определяем это radiobutton или checkbox
            //alert('radio || checkbox')
            //alert(field.type+" "+field.length);
            if( field[0].type == "radio" )
            {
                //Это радиокнопка
                //Получаем значение выбранной радиокнопки и выполняем операцию корректировки суммы
                for(j=0; j<field.length; j++)
                {
                    if( field[j].checked )
                    {
                    	temp = field[j].value;
                    	sum = correct_sum(temp, sum);
                    	to_log(key, $("label[for='"+key+"_"+j+"']").text());
                    	break;
                    }
                }
            }
        }
    }
    return sum;
}

function correct_sum(value, sum)
{
//Функция выполняет операцию корректировки суммы

    //alert("?"+value+"?"+sum);
    //Определяем род операции
    if( value.indexOf("*") == 0 )
    { sum = sum * parseFloat(value.substr(1, value.length-1)); }
    else if( value.indexOf("+") == 0 )
    { sum = sum + parseFloat(value.substr(1, value.length-1)); }
    else if( value.indexOf("-") == 0 )
    { sum = sum - parseFloat(value.substr(1, value.length-1)); }
    else if( value.indexOf('/') == 0 )
    {
        if( parseFloat(value.substr(1, value.length-1)) == 0 )
        { alert(jsScriptMess['err_null_division']) }
        else
        { sum = sum / parseFloat(value.substr(1, value.length-1)); }
    }
    else
    { sum = sum + parseFloat(value); }
    //alert("!"+value+"!"+sum);

    return sum;
}

function open_info(id)
{
//Функция открывает/скрывает выпадающую справку
	if( $("div#"+id).css("display") == "none" )
	{ $("div#"+id).show(); }
	else
	{ $("div#"+id).hide(); }
}

function to_log(key, value)
{	//Добавляем строчку в лог
	//Получаем префикс для лога
	var regexp = /^([^\_]+\_[0-9]+)/;
	var gkey = key.match(regexp);
	gkey = gkey[1];

	s_log[gkey] = s_log[gkey]+$.trim($("div#"+key+"_name").text())+": "+value+"\n";}


function openMailForm()
{	//Открываем поля формы
	temp = $.trim($("span#clear_summ").text());
	if( temp == "" || temp == "0" || temp == "0.00" )
	{ alert(jsScriptMess["err_calculate"]); }
	else
	{
		temp = $("div#log_result").text();
		//temp = temp.replace(/\s+/g," ");
		$("#ORDER_SOSTAV").val(temp);
		temp = temp.replace(/\n+/g,'<br>');
		$("#order_preview").html(temp);
		$("div#mail_form").show();	}}

function closeMailForm()
{
	//Открываем поля формы отправки и очищаем данные
	$("div#log_result").text("");
	$("#ORDER_SOSTAV").val("");
	$("#order_preview").html("");
	$("div#mail_form").hide();
}