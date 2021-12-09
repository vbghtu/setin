function check_s_group(obj)
{
    //Раскрытие - скрытие группы услуг
    if( $('#'+obj.name+'_cont').css("display") == "none" )
    { $('#'+obj.name+'_cont').css("display", ""); s_group[obj.name] = true; }
    else
    { $('#'+obj.name+'_cont').css("display", "none"); s_group[obj.name] = false; }
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
    $("#total_summ").html( total_summ.toFixed(2) );
}

function calculate_group_services(gkey)
{
//Подсчет внутри группы услуг
var total_summ = 0;

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

    //Выставляем суммы по группам
    $("#"+gkey+"_summ").html( total_summ.toFixed(2) );

    //alert('Group: '+key+"="+total_summ);
    return total_summ;
}

function calculate_one_service(key)
{
//Подсчет внутри одной услуги
//alert('Service: '+key);

    var sum = 0;
    var theForm = document.forms.Calculator;

    var quantity = 1;
    //alert( eval('theForm.'+key+'_quantity.value') );
    eval('quantity = theForm.'+key+'_quantity.value');
    if( quantity.replace(/[^0-9]/gi,"") != "" )
    {
        //Получаем численное значение тарифа
        eval ("var tarif = theForm."+key+"_cost.value");
        sum = quantity * tarif;

        //Учитываем поправочные коэффициенты 1-5
        for(k=1; k<6; k++)
        { sum = calculate_coef(key+"_k"+k+"_0", sum); }

        var period = 1;
        //Если выбран расчет за период - делим на количество месяцев периода
        var select_period = ""
        eval('select_period = theForm.'+key+'_range');
        if( select_period[1].checked )
        {
            if( theForm.period.value.replace(/[^0-9]/gi,"") != "" )
            { period = theForm.period.value; }
        }

        sum = sum/period;
    }

    return sum;
}

function calculate_coef(key, sum)
{
//Учитываем поправочные коэффициенты

    //Определяем, что это за поле
    var theForm = document.forms.Calculator;

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
            sum = correct_sum(field[field.selectedIndex].value, sum);
        }
        else if( field.type == "select-multiple" )
        {
            //Это список с множественным выбором
            //alert('select_multyple');
            for(j=0; j<field.options.length; j++)
            {
                if( field.options[j].selected )
                { sum = correct_sum(field.options[j].value, sum); }
            }
        }
        else if( field.type == "checkbox" )
        {
            //Это чекбокс
            if( field.checked )
            { sum = correct_sum(field.value, sum); }
            //Проверяем а нет ли списка чекбоксов
            var c_key = key.substring(0, key.length-1);
            var ci = 1;
            //Проходимся по всему списку и выполняем операцию корректировки суммы на выделенных чекбоксах
            while( eval('theForm.'+c_key+ci) )
            {
                eval('var c_field = theForm.'+c_key+ci);
                if( c_field.checked )
                { sum = correct_sum(c_field.value, sum); }
                ci++;
            }
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
                    { sum = correct_sum(field[j].value, sum); break; }
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
        { alert("Обнаружено деление на 0. \n\nОдна из операций - пропущена. \nПроверьте модификаторы и значения коэффициентов!\n") }
        else
        { sum = sum / parseFloat(value.substr(1, value.length-1)); }
    }
    else
    { sum = sum + parseFloat(value); }
    //alert("!"+value+"!"+sum);

    return sum;
}
