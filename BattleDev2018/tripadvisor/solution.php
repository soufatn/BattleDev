<?php
/***************************************************************
//*
//*
//* SOLUTION BY Isograd
//*
//*
//******************************************************************
/*******/
<?php
$max =0;
$f = stream_get_line(STDIN, 10000, PHP_EOL);//to skip the first row of the input
do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $max = max($max,array_sum(explode(" ",$f))/3);
    }
}while($f!==false);
echo ceil($max);
?>
