<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$costPerWidget = 20;
$taxRate = .06;
$discountRate = .25;
$discountTotal = 0;

$totalCostPreTax = $_POST['quantity'] * $costPerWidget;

if ($_POST['quantity'] <= 0) {
  echo "Please make sure that you have entered a quantity and then resubmit";
}

if ($totalCostPreTax > 50) {
  $discountTotal = $totalCostPreTax * $discountRate;
  $totalCostPreTax = $discountTotal + $totalCostPreTax;
} 

$totalCost = round(($totalCostPreTax * $taxRate) + $totalCostPreTax, 2);

$monthlyInstallment = round($totalCost / 12, 2);

echo "<body style='background-color:$_POST[bgColor]'>";
echo "\t<h1 style='color:$_POST[fgColor]'>Total Cost - Welcome $_POST[fName] $_POST[lName]</h1>";
echo "\t<p style='color:$_POST[fgColor]'>You requested $_POST[quantity] widget(s) at $20 each.</p>\n";
echo "\t<p style='color:$_POST[fgColor]'>Your total with tax, minus your $$discountTotal discount, comes to $$totalCost</p>\n";
echo "\t<p style='color:$_POST[fgColor]'>You may purchase the widget(s) in 12 monthly installments of $$monthlyInstallment each.</p>";
echo "</body>";