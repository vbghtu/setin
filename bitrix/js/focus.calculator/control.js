function studio2of3_SimpleCheckOnExist(checkStop, checkStr)
{

//������� �������� ������� ���������� ��������
//���� � �������� value ���� fm ����������� ���� ���� ������,
//�������� ��� � ������ checkStop - �������� �� �.�. true

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