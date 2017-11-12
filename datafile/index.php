<?php 
$tab = "\t";

$fp = fopen('testfile.txt', 'r');

while ( !feof($fp) )
{
    $line = fgets($fp, 2048);

    $data_txt = str_getcsv($line, $tab);

    //Get First Line of Data over here
    print_r($data_txt);
    exit;
}                              

fclose($fp);
?>