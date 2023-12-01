<?php
$n = 4;
$board = array_fill(0, $n, array_fill(0, $n, 0));
solveNQueen($board, $n, 0);

function solveNQueen(&$board, $n, $col): void {
	if($col >= $n) {
		printResult($board, $n);
		echo "\n";
		return;
	}
	
	for($index = 0; $index < $n; $index++) 
		if(isPromising($board, $n, $index, $col)) {
			$board[$index][$col] = 1;
			solveNQueen($board, $n, $col + 1);
			$board[$index][$col] = 0;
		}
}

function isPromising($board, $n, $row, $col): bool {
	
	// - 
	for($i = 0; $i < $col; $i++) 
		if($board[$row][$i])
			return false;
	
	// \
	for($i = $row, $j = $col; $i >= 0 && $j >= 0; $i--, $j--) 
		if($board[$i][$j]) 
			return false;
	
	// /
	for($i = $row, $j = $col; $i < $n && $j >= 0; $i++, $j--) 
		if($board[$i][$j])
			return false;

	return true;
}

function printResult($board, $n): void {
	for($i = 0; $i < $n; $i++) {
		for($j = 0; $j < $n; $j++) 
			echo $board[$i][$j];
		echo "\n";
	}
}

?>
