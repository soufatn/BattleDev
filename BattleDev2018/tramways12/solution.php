<?php
/***************************************************************
#*
#*
#* Solution by Isograd
#*
#*
#******************************************************************/
function solve($input) {
    $n = intval($input[0]);
    $t = [];
    $f = [];
    for ($i = 0; $i < $n; $i++) {
        $t[] = array_map("intval", explode(" ", $input[$i+1]));
        $f[] = array_fill(0, $n, 0);
    }
    // the tricky part in this dynamic programming loop
    // is to avoid off-by-one errors and out of bound indices
    for ($i = 1; $i < $n; $i++) {
        for ($j = 0; $j < $i; $j++) {
            $m = $f[$j][$i-1];
            for ($k = $j; $k < $i; $k++) {
                $x = $t[$k][$i];
                if ($j < $k-1) {
                    $x += $f[$j][$k-1];
                }
                if ($k+1 < $i-1) {
                    $x += $f[$k+1][$i-1];
                }
                $m = max($m, $x);
            }
            $f[$j][$i] = $m;
        }
    }
    return $f[0][$n-1];
}

$input = [];
while ($f = stream_get_line(STDIN, 10000, PHP_EOL))
	$input[] = $f;
echo solve($input)."\n";
?>
