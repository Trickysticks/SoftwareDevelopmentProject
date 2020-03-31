<?php
include("config.php");
$employerInfo = $link->query("SELECT * FROM employer");
$row = $employerInfo->fetch_assoc();
if (isset($row['EIN']))
  $EIN = $row['EIN'];
if (isset($row['EmplrName']))
  $emplrName = $row['EmplrName'];
if (isset($row['EmplrStNum']))
  $emplrStNum = $row['EmplrStNum'];
if (isset($row['EmplrStAdd']))
  $emplrStAdd = $row['EmplrStAdd'];
if (isset($row['EmplrSuiteNum']))
  $emplrSuiteNum = $row['EmplrSuiteNum'];
if (isset($row['EmplrCity']))
  $emplrCity = $row['EmplrCity'];
if (isset($row['EmplrState']))
  $emplrState = strtoupper($row['EmplrState']);
if (isset($row['EmplrZip']))
  $emplrZip = $row['EmplrZip'];
$address = $emplrStNum . " " . $emplrStAdd . " " . $emplrSuiteNum . ", ". $emplrCity . ", " . $emplrState ." " . $emplrZip;
  
$form944info = $link->query("SELECT SUM(SSTax) as sumSS, SUM(FedTax) as sumFed, SUM(MedicareTax) as sumMed FROM form944");
$row = $form944info->fetch_assoc();
if (isset($row['sumSS']))
  $sumSS = $row['sumSS'];
if (isset($row['sumFed']))
  $sumFed = $row['sumFed'];
if (isset($row['sumMed']))
  $sumMed = $row['sumMed'];

$file = "IRSVoucher.txt";
$txt = fopen($file, "w") or die("Unable to open file!");
fwrite($txt, "---------------------------------------------------------------------------");
fwrite($txt, "\nForm:944                              Year: ".date("Y") );
fwrite($txt, "\n---------------------------------------------------------------------------");
fwrite($txt, "\nEIN: ".$EIN."                                       SS Tax: $".$sumSS);
fwrite($txt, "\nCompany: ".$emplrName."                            Fed Tax: $".$sumFed);
fwrite($txt, "\nAddress: ".$address."      Medicare Tax: $".$sumMed);

fwrite($txt, "\n\nTotal amount paid by employer: $". ($sumSS+$sumFed+$sumMed)*2);

fwrite($txt, "\n---------------------------------------------------------------------------");

fclose($txt);

header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename='.basename($file));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
header("Content-Type: text/plain");
readfile($file);

 
 ?>

