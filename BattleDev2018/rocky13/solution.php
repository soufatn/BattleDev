<?php
/***************************************************************
#*
#*
#* Solution by Isograd
#*
#*
#*****************************************************************/
do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;
    }
}while($f!==false);
function distance(array $note_1, array $note_2) : int{
    $total = 0;
    foreach($note_1 as $key=>$value){
        $total +=abs($value-$note_2[$key]);
    }
    return($total);
}
$mes_notes = explode(" ",$input[0]);
$nb_best = $input[2];
unset($input[0]);
unset($input[1]);
unset($input[2]);
foreach($input as $ses_notes){
    $ses_notes = explode(" ",$ses_notes);
    $distance = distance($mes_notes, $ses_notes);
    $results[$distance] = $ses_notes[5];
}
ksort($results);
echo floor(array_sum(array_slice($results, 0,$nb_best))/$nb_best);
?>
