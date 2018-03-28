<?php
/***************************************************************/
//*
//*
//* SOLUTION BY Isograd
//*
//*
//******************************************************************/

do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;
    }
}while($f!==false);

$price = $input[0];
unset($input[0]);
unset($input[1]);

$ca = 0;

foreach($input as $nb_person){
    $ca_table = $nb_person*$price;
   
    if($nb_person >=10){
        $ca_table = $ca_table*0.7;
    }
    else if($nb_person >=6){
        $ca_table = $ca_table*0.8;
    }
    else if($nb_person >=4){
        $ca_table = $ca_table*0.9;
    }
    
    $ca += $ca_table;
}

echo ceil($ca);
?>
