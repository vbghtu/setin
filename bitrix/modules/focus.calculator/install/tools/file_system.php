<?

// --- ������� ������ � �������� �������� ---


function copyDir($mdir, $outdir)
{
//������� �������� ���������� ����� $mdir � ����� $outdir
//���������� ��������� ����� � ����������

    if(!is_dir($outdir))
        mkdir($outdir, 0777);

    $dir = opendir($mdir);

    while(false !== ($check = readdir($dir)))
    {
        if($check != '.' && $check != '..')
        {
            if(is_dir($mdir .'/'. $check))
            {
                mkdir($outdir .'/'. $check, 0777);
                copyDir($mdir .'/'. $check, $outdir .'/'. $check);
            }
            elseif(is_file($mdir .'/'. $check))
            {
                copy($mdir .'/'. $check, $outdir .'/'. $check);
            }

        }
    }
}

function removeDir($path)
{
//������� ������� ����� � �������

    if(file_exists($path) && is_dir($path))
    {
        $dirHandle = opendir($path);
        while (false !== ($file = readdir($dirHandle)))
        {
            if ($file!='.' && $file!='..')// ��������� ����� � ��������� '.' � '..'
            {
                $tmpPath=$path.'/'.$file;
                chmod($tmpPath, 0777);

                // ���� �����
                if (is_dir($tmpPath))
                { removeDir($tmpPath); }
                else
                {
                    // ������� ����
                    if(file_exists($tmpPath))
                    { unlink($tmpPath); }
                }
            }
        }
        closedir($dirHandle);

        // ������� ������� �����
        if(file_exists($path))
        { rmdir($path); }
    }
    else
    { echo "��������� ����� �� ���������� ��� ��� ����!"; }
}


?>