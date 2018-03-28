<?php
function walkable($c){
	return $c==='.' || $c==='p' || $c==='c';
}

function dfs(&$map, &$cell_to_node, $n, $fy, $fx, $m){
	$dds = array(array(1, 0), array(-1, 0), array(0, 1), array(0, -1));
	$acc = array();

	$stack = new SplStack();
	$stack->push(array($fy, $fx));
	$cell_to_node[$fy][$fx] = $m;

	while(!$stack->isEmpty()){
		list($y, $x) = $stack->pop();

		foreach($dds as $d){
			$ny = $y+$d[0];
			$nx = $x+$d[1];
			if($nx>=0 && $ny>=0 && $nx<$n && $ny<$n && $map[$ny][$nx]!=='#')
				if(walkable($map[$ny][$nx]) && $cell_to_node[$ny][$nx]===-1){
					$cell_to_node[$ny][$nx] = $m;
					$stack->push(array($ny, $nx));
				} else if($map[$ny][$nx]==='?')
					$acc[] = array($ny, $nx);
		}
	}

	return $acc;
}

function build_graph($map){
	$n = count($map);
	$cell_to_node = array_fill(0, $n, array_fill(0, $n, -1));
	$dds = array(array(1, 0), array(-1, 0), array(0, 1), array(0, -1));

	$c = 0;
	$graph = array();
	$type = array();

	$sources = array();
	$targets = array();
	for($y=0; $y<$n; $y++)
		for($x=0; $x<$n; $x++)
			if($map[$y][$x]==='p')
				$targets[] = array($y, $x);
			elseif($map[$y][$x]==='c')
				$sources[] = array($y, $x);

	$graph[] = $sources;
	$type[] = '.';
	$c++;

	for($y=0; $y<$n; $y++)
		for($x=0; $x<$n; $x++)
			if(walkable($map[$y][$x]) && $cell_to_node[$y][$x]===-1){
				$graph[] = dfs($map, $cell_to_node, $n, $y, $x, $c);
				$type[] = '.';
				$c++;
			} else if($map[$y][$x]==='?'){
				$graph[] = array();
				$type[] = '?';
				$cell_to_node[$y][$x] = $c;
				foreach($dds as $d){
					$ny = $y+$d[0];
					$nx = $x+$d[1];
					if($nx>=0 && $ny>=0 && $nx<$n && $ny<$n && $map[$ny][$nx]!=='#')
						$graph[$c][] = array($ny, $nx);
				}
				$c++;
			}

	$pc = 0;
	$twin = array();
	for($i=0; $i<$c; $i++)
		if($type[$i] === '?'){
			$twin[] = $c+$pc;
			$graph[] = array();
			$pc++;
		} else
			$twin[] = -1;

	for($i=0; $i<$c; $i++){
		$target = ($type[$i] === '?')?$twin[$i]:$i;
		$graph[$target] = array_map(function($v)use(&$cell_to_node){ return $cell_to_node[$v[0]][$v[1]]; }, $graph[$i]);
		$graph[$target] = array_values(array_unique($graph[$target], SORT_NUMERIC));
		$graph[$target] = array_map(function($v)use($n){ return array($v, $n*$n); }, $graph[$target]);
		if($type[$i] === '?')
			$graph[$i] = array(array($twin[$i], 1));
	}

	$graph[] = array();
	$dest = $c+$pc;

	foreach($targets as $target){
		$node = $cell_to_node[$target[0]][$target[1]];
		if(empty($graph[$node]) || $graph[$node][count($graph[$node])-1]!==$dest)
			$graph[$node][] = array($dest, $n*$n);
	}

	return $graph;
}

function add_flow(&$graph, $from, $to, $diff){
	foreach($graph[$from] as &$e)
		if($e[0] === $to){
			$e[1] += $diff;
			return;
		}
	$graph[$from][]=array($to, $diff);
}

function augment(&$graph){
	$n = count($graph);
	$parent = array_fill(0, $n, -1);
	$parent[0] = 0;

	$queue = new SplQueue();
	$queue->push(0);

	while(!$queue->isEmpty()){
		$c = $queue->pop();
		foreach($graph[$c] as $e){
			if($parent[$e[0]]===-1 && $e[1]>0){
				$parent[$e[0]] = $c;
				$queue->push($e[0]);
			}
		}
	}

	if($parent[$n-1]===-1)
		return False;

	$source = $n-1;
	do{
		$dest = $source;
		$source = $parent[$source];
		add_flow($graph, $source, $dest, -1);
		add_flow($graph, $dest, $source, 1);
	}while($source!=0);

	return True;
}

function solve($map){
	$n = intval(array_shift($map));
	$graph = build_graph($map);

	$max_flow = 0;
	while(augment($graph)){
		$max_flow++;
		if($max_flow>=$n*$n)
			return -1;
	}
	return $max_flow;
}

$input = [];
while ($f = stream_get_line(STDIN, 10000, PHP_EOL))
	$input[] = $f;
echo solve($input)."\n";

?>
