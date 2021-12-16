<?

// --- Функции работы с файловой сичтемой ---


function copyDir($mdir, $outdir)
{
//Функция копирует содержимое папки $mdir в папку $outdir
//Копируются вложенные папки и директории

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
//Функция удаляет папку с файлами

    if(file_exists($path) && is_dir($path))
    {
        $dirHandle = opendir($path);
        while (false !== ($file = readdir($dirHandle)))
        {
            if ($file!='.' && $file!='..')// исключаем папки с назварием '.' и '..'
            {
                $tmpPath=$path.'/'.$file;
                chmod($tmpPath, 0777);

                // если папка
                if (is_dir($tmpPath))
                { removeDir($tmpPath); }
                else
                {
                    // удаляем файл
                    if(file_exists($tmpPath))
                    { unlink($tmpPath); }
                }
            }
        }
        closedir($dirHandle);

        // удаляем текущую папку
        if(file_exists($path))
        { rmdir($path); }
    }
    else
    { echo "Удаляемой папки не существует или это файл!"; }
}


?>