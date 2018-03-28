<?php
/*******
 * Read input from STDIN
 * Use echo or print to output your result, use the PHP_EOL constant at the end of each result line.
 * Use:
 *      local_echo( $variable ); 
 * to display simple variables in a dedicated area.
 * 
 * Use:
 *      local_print_r( $array ); 
 * to display arrays in a dedicated area.
 * ***/

do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;
    }
}while($f!==false);

function Retourne(array $pile, int $hauteur){
    $new_pile = [];
    if($hauteur==0){
        return $pile;
    }
    for($iter=$hauteur;$iter>=0;$iter--){
        $new_pile[] = $pile[$iter];
    }
    for($iter=$hauteur+1;$iter<count($pile);$iter++){
        $new_pile[] = $pile[$iter];
    }
    return $new_pile;
}


function AllPermutations($piles, $level){
    if($level==6){
        $result = [];
        foreach($piles as $pile){
            for($iter=1;$iter<=5;$iter++){
                $pile[6] = $iter;
                $result[] = $pile;
            }
        }
        return $result;
    }else{
        $result = [];
        foreach($piles as $pile){
            for($iter=1;$iter<=5;$iter++){
                $pile[$level] = $iter;
                $result = array_merge($result, AllPermutations([$pile],$level+1));
            }
        }
        return $result;
    }
}

$initial = $input;
$sorted = $initial;
sort($sorted);
$min_permut = 8;

foreach(AllPermutations([[1,1,1,1,1,1,1]], 0) as $permutation){
    $candidat = $initial;
    $nb_permut = 0;
    foreach($permutation as $swap){
        $nb_permut+= ($swap==0) ? 0 : 1;
        $candidat = Retourne( $candidat, $swap);
        if($candidat == $sorted){
            $min_permut = min($min_permut,$nb_permut);
           // var_dump($permutation);
           // die("Trouvé");
        }
    }
}
echo $min_permut;
/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */

/***************************************************************
#*
#*
#* Solution by Isograd
#*
#*
#*****************************************************************/
function flip($k, $p) {
    $q = $p; // array copy
    for ($i = 0; $i < $k+1; $i++) {
        $q[$i] = $p[$k-$i];
    }
    return $q;
}

// a Lehmer code would be more efficient, but who cares...
// (inefficiency: using a table of size 46k instead of 720)
function perm_id($p) {
    return $p[0]+6*($p[1]+6*($p[2]+6*($p[3]+6*($p[4]+6*$p[5]))));
}

function solve($input) {
    $t = [];
    for ($i = 0; $i < 6; $i++) {
        $t[] = intval($input[$i]);
    }
    $perm = [0,1,2,3,4,5];
    array_multisort($t, $perm);

    // fast implementation with BFS
    // there is a simpler solution which however is slower
    $visited = array_fill(0, 6*6*6*6*6*6, false);
    $queue = new SplQueue();
    $queue->enqueue([$perm, 0]);

    while (true) {
        [$p, $n] = $queue->dequeue();
        if ($p == [0,1,2,3,4,5]) {
            return $n;
        }
        for ($k = 0; $k < 6; $k++) {
            $q = flip($k, $p);
            $x = perm_id($q);
            if (!$visited[$x]) {
                $visited[$x] = true;
                $queue->push([$q, $n+1]);
            }
        }
    }
}


$input = [];
while ($f = stream_get_line(STDIN, 10000, PHP_EOL))
	$input[] = $f;
echo solve($input)."\n";
