<?php

$file = fopen("archivo.txt","w");
fwrite($file,"Escribo en el archivo".PHP_EOL);
fwrite($file,"Escribo en el archivo otra vez".PHP_EOL);
fclose($file);

$array = array();

$file =fopen("archivo.txt", "r");
while(!feof($file))
{
    //$array[] = fgets($file);
    array_push($array,fgets($file));
}
fclose($file);

foreach ($array as $value) {
    echo $value.'<br>';
}

$array[1] = "Escribo en el archivo modificando".PHP_EOL;

$file = fopen("archivo.txt","w");
foreach ($array as $value) {
    fwrite($file,$value);
}
fclose($file);

$file =fopen("archivo.txt", "r");
while(!feof($file))
{
    echo fgets($file)."<br>";
}
fclose($file); 