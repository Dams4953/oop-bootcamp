<?php 

echo 'without class <br><br>';

$quantity_bananas = 6;

$price_bananas= 1;

$quantity_apples = 3;

$price_apple = 1.5;

$quantity_wine = 2;

$price_wine = 10;


//htva calcul

$htva_wine = $price_wine/1.21;

$htva_apple = $price_apple/1.06;

$htva_bananas = $price_bananas/1.06;

// prices articles htva

$total_without_tva = $htva_apple + $htva_bananas + $htva_wine;

$total_apples= $quantity_apples * $htva_apple;

$total_wine = $quantity_wine * $htva_wine;

$total_bananas = $quantity_bananas * $htva_bananas;

$total = $total_apples + $total_bananas + $total_wine;

echo 'total price without tva is: '.round($total,2).'$<br>';

$difference = 30.5 - $total;

echo ' difference tva and htva is '.round($difference,2).'$<br>';
?>