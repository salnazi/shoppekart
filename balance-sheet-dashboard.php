<?php
	//$connection = db_connect();

	$snInvestment = "SELECT SUM(amt) FROM $snInvestment";
	$sInvestment = mysqli_query($connection,$snInvestment);
	while($rInv = mysqli_fetch_object($sInvestment))
	{
		$investment = $rInv;
	}

	$snPurchase = "SELECT SUM(totPrice) FROM $snPurchase";
	$sPurchase = mysqli_query($connection,$snPurchase);
	while($rPur = mysqli_fetch_object($sPurchase))
	{
		$purchase = $rPur;
	}
	

	$snSales = "SELECT SUM(GsalesAmt) FROM $snSales";
	$sSales = mysqli_query($connection,$snSales);
	while($rSal = mysqli_fetch_object($sSales))
	{
		$sales = $rSal;
	}
	
	$snSalesProfit = "SELECT SUM(stProfit) FROM $snGrandSales";
	$sSalesProfit = mysqli_query($connection,$snSalesProfit);
	while($rSalProfit = mysqli_fetch_object($sSalesProfit))
	{
		$rSalPro = $rSalProfit;
	}

	$snStock = "SELECT SUM(rtotPrice) FROM purchase";
	$sStock = mysqli_query($connection,$snStock);
	while($rStock = mysqli_fetch_object($sStock))
	{
		$stock = $rStock;
	}

	$snExpenses = "SELECT SUM(amt) FROM $snExpenses";
	$sExpenses = mysqli_query($connection,$snExpenses);
	while($rExpenses = mysqli_fetch_object($sExpenses))
	{
		$expenses = $rExpenses;
	}

	$snProfit = "SELECT SUM(amt) FROM $snProfit";
	$sProfit = mysqli_query($connection,$snProfit);
	while($rProfit = mysqli_fetch_object($sProfit))
	{
		$profit = $rProfit;
	}


	foreach($investment as $bsInvestmet)
	{
		echo "<tr><td style ='width:200px;font-weight:bold;'></td><td style='color:#B40431;font-weight:bold;'></td></tr>";
	}
	foreach($purchase as $bsPurchase)
	{
		echo "<tr><td style ='width:200px;font-weight:bold;'></td><td style='color:#B40431;font-weight:bold;'></td></tr>";
	}

	foreach($sales as $bsSales)
	{
		echo "<tr><td style ='width:200px;font-weight:bold;'></td><td style='color:#B40431;font-weight:bold;'></td></tr>";
	}
	
	foreach($stock as $bsStock)
	{
		echo "<tr><td style ='width:200px;font-weight:bold;'></td><td style='color:#B40431;font-weight:bold;'></td></tr>";
	}
	$bsSoldValue = $bsPurchase - $bsStock;
		
	$SalesProfit = $bsSales - $bsSoldValue;
	foreach($expenses as $bsExpenses)
	{
		echo "<tr><td style ='width:200px;font-weight:bold;'></td><td style='color:#B40431;font-weight:bold;'></td></tr>";
	}
	foreach($profit as $bsProfit)
	{
		echo "<tr><td style ='width:200px;font-weight:bold;'></td><td style='color:#B40431;font-weight:bold;'></td></tr>";
	}
	
	$totSales =  abs($bsSales - $bsSoldValue);
	$totSalesProfit = abs($totSales);

	echo "<tr><td style ='width:200px;font-weight:bold;'></td><td style='color:#B40431;font-weight:bold;'></td></tr>";

	/*foreach($rSalPro as $SalesProfit)
	{
		echo "<tr><td style ='width:200px;font-weight:bold;'>Total Sales Profit</td><td style='color:#B40431;font-weight:bold;'>".number_format(abs($SalesProfit),2)."</td></tr>";
	}

	$netPro = $SalesProfit - $bsExpenses ;
	$netProfit = number_format(abs($netPro),2);
	echo "<tr><td style ='width:200px;font-weight:bold;'>Total Net Profit</td><td style='color:#B40431;font-weight:bold;'>".$netProfit."</td></tr>";
	*/
	if($totSalesProfit != "0") 
	$netPro = $totSalesProfit - $bsExpenses;
	$netProfit = number_format(abs($netPro),2);
	echo "<tr><td style ='width:200px;font-weight:bold;'></td><td style='color:#B40431;font-weight:bold;'></td></tr>";
	

	$cash = $bsInvestmet - $bsPurchase - $bsExpenses - $bsProfit  ;
	$newCash = $cash + $bsSales;
	$CashInHand = number_format(abs($newCash),2);
	echo "<tr><td style ='width:200px;font-weight:bold;'></td><td style='color:#B40431;font-weight:bold;'></td></tr>";
?>

