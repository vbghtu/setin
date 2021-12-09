function studio2of3_SimpleCheckOnExist(checkStop, checkStr)
{

//Функция проверки наличия допустимых символов
//Если в значении value поля fm встречается хоть один символ,
//которого нет в строке checkStop - отвечаем да т.е. true

    var check = false;
    var i = 0;
    var j = 0;

    for (i = 0;  i < checkStr.length;  i++)
    {
        simbol = checkStr.charAt(i);
        for (j = 0;  j < checkStop.length;  j++)
        {
            if (simbol == checkStop.charAt(j))
            { check = true; break; }
        }

        if (check == false)
        { return(true); break; }

        check = false;
    }
}