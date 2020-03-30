<?php 
//Author: Christine Wasserman
include("navbar.php");
include("config.php");

$currentId = $_SESSION["id"];

$deptId = $middleInitial = $streetName = $aptNum = $city = $state = $zip = $streetNum =$firstName= $lastName = $SSN = $salary=  "";
//puling all info from employee table
$employeeInfo = $link->query("SELECT * FROM employee WHERE empid=$currentId");
while ($row=$employeeInfo->fetch_assoc()){
  if (isset($row['FirstName']))
    $firstName = $row['FirstName'];
  if (isset($row['LastName']))
    $lastName = filter_var($row['LastName']);
  if (isset($row['Title']))
    $Title = $row['Title'];
if (isset($row['Empid']))
    $Empid = $row['Empid'];
  if (isset($row['PTIN']))
    $PTIN = $row['PTIN'];
}
//combining employee name ; first and last
$employeeName = $firstName . " " . $lastName;

//pulling all info from employer table
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
  $emplrState = $row['EmplrState'];
if (isset($row['EmplrZip']))
  $emplrZip = $row['EmplrZip'];
if (isset($row['CloseDate']))
  $CloseDate = $row['CloseDate'];

//combining employer address into 2 rows
$employerAddress1 = $emplrStNum . " " . $emplrStAdd . " " . $emplrSuiteNum;
$employerAddress2 =$emplrCity . ", " . $emplrState . " " . $emplrZip;

//getting total compensation of all W2s
$CompensationQuery = $link->query("Select Sum(Compensation+SSWages+MDCWages+SSTips) as TotalCompensation from w2");
$row=$CompensationQuery->fetch_assoc();
$Compensation = $row['TotalCompensation'];

//getting total federal witholdings of all W2s
$FedWitholdQuery = $link->query("Select Sum(FedWithold) as TotalFedWithhold from w2");
$row=$FedWitholdQuery->fetch_assoc();
$FedWithold = $row['TotalFedWithhold'];

// 3. If no wages, tips, and other compensation are subject to social security or Medicare tax 
$NoComp = 0; //place holder not sure what this is

//getting total Social Security Wages of all W2s
$SSWagesQuery = $link->query("Select Sum(SSWages) as TotalSSWages from w2");
$row=$SSWagesQuery->fetch_assoc();
$SSWages = $row['TotalSSWages'];

//Calculating the total Social Security Tax from the Total Social Security Wages for all W2s
$SSWagesTax = number_format($SSWages * .124,2);

//getting total Social Security Tips of all W2s
$SSTipsQuery = $link->query("Select Sum(SSTips) as TotalSSTips from w2");
$row=$SSTipsQuery->fetch_assoc();
$SSTips = $row['TotalSSTips'];

//Calculating the total Social Security Tips from the Total Social Security Wages for all W2s
$SSTipsTax = number_format($SSTips * .0124,2);

//getting total Medicare Wages of all W2s
$MDCWagesQuery = $link->query("Select Sum(MDCWages) as TotalMDCWages from w2");
$row=$MDCWagesQuery->fetch_assoc();
$MDCWages = $row['TotalMDCWages'];

//Calculating the total Medicare Wages from the Total Social Security Wages for all W2s
$MDCWagesTax = number_format($MDCWages * .029,2);

//Getting total additiona Medicare wages of all W2s
//$AddMDCWagesQuery = $link->query("Select Sum(MDCWages) as TotalMDCWages from w2");
//$row=$AddMDCWagesQuery->fetch_assoc();
//$AddMDCWages = $row['AddMDCWages'];
$AddMDCWages = 0; //placeholder not on tax rate sheet.


//Calculating the additional Medicare Wages from the Total additional Medicare Wages for all W2s
$AddMDCTax= $AddMDCWages * 0.009;

// 4e. Add Column 2 from lines 4a, 4b, 4c, and 4d   
$TotalTax= $SSWagesTax+ $SSTipsTax+ $MDCWagesTax;


// 5. Total taxes before adjustments. Add lines 2, 4e  e
$TotalTaxBeforeAdj= $FedWithold +$TotalTax;


// 6. Current years’s adjustment 
$CYAdj = 0; //0 is a place holder for $CYAdj (current year adjustment); nothing on tax table about this..?


 //7. Total taxes after adjustments. Add lines 5 and 6   
$TotTaxAdj= $TotalTaxBeforeAdj + 0; //0 is a place holder for $CYAdj 


// 8. Qualified small business payroll tax credit for increasing research activities. .
$SmlBusCred = 0; //0 is a place holder for $SmlBusCred


// 9. Total taxes after adjustments and credits. Subtract line 8 from line 7   
$ToTaxAdjb = $TotTaxAdj- $SmlBusCred;


//10. Total deposits for this year, including overpayment applied from a prior year ; not sure what the deposits are?
 $YrlyDep = 0; //0 is a place holder for $YrlyDep
 
 
// 11. Balance due. If line 9 is more than line 10, enter the difference 
//$BalDueQuery = $link->query("CASE when $YrlyDep > $ToTaxAdjb then (select $ToTaxAdjb - $YrlyDep from 944 ) else  '0' end as BalDue)  ");
//$row=$BalDueQuery->fetch_assoc();
//$BalDue = $row['BalDue'];
$BalDue = $ToTaxAdjb - $YrlyDep ;


 // 12. Overpayment. If line 10 is more than line 9 
//$OvrPayQuery = $link->query" CASE when YrlyDep > ToTaxAdjb then (select YrlyDep - ToTaxAdjb from 944 ) else  '0' end as OvrPay)  ");
//$row=$OvrPayQuery->fetch_assoc();
//$OvrPay = $row['OvrPay'];
$OvrPay = 0;

//To populate monthly deposit schedule and tax liability secontion 13.a-l
//$DepositSchedule =  mysqli_query("Select sum(MDCTax+SSTax+FEDTax+STATETax) as dep_Sched from payroll group by payrollMonth");
//$row = mysqli_fetch_array($DepositSchedule);
//$sum = $row[dep_Sched]; 
//below is a test to see how it populates.
$jan = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'jan'");
$feb = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'feb'");
$march = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'march'");
$april = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'april'");
$may = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'may'");
$june = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'june'");
$july = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'july'");
$aug = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'aug'");
$sept = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'sept'");
$oct = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'oct'");
$nov = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'nov'");
$dec = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'dec'");


//Total liability for year. Add lines 13a through 13l. Total must equal line 9 
$TotLiabYQuery = $link->query("Select sum(MDCTax+SSTax+FEDTax+STATETax) as sumTotLiabY from payroll group by empid ");
$row=$TotLiabYQuery->fetch_assoc();
$TotLiabY = $row['TotLiabY'];


?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Highland Capital Tax System</title>
  </head>
  <body>
<div><H1><center>944 Form </center></h1></div></br>
  <form method="POST" <?php echo  "action='944controller.php?TotalCompensation=$Compensation&TotalFedWithhold=$FedWithold'" ?>>
<table>
	<tr>
		<td colspan="4">
		<td><label for="944EIN">Employer identification number (EIN)</label>
		<td><td><input type="text" class="form-control" id="944EIN" name="944EIN" readonly required <?php echo "value=".$EIN ?> >
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="4">
		<td>
			<label for="944Name">Name</label>
			<td><td><input type="text" class="form-control" id="944Name" name="944Name" disabled <?php echo 'value="' . $emplrName . '" '?> >
			</div></td>
		</tr>	
		
		<tr>
		<td colspan="4">
		<td>
			<label for="944Number">Number</label>
			<TD><td><input type="text" class="form-control" id="944Number" name="944Number" readonly required <?php echo "value=".$emplrStNum ?>>
			</div></td>
		</tr>	
		<tr>
		<td colspan="4">
		<td>
			<label for="944Street">Street</label>
			<TD><td><input type="text" class="form-control" id="944Street" name="944Street" readonly required <?php echo "value=".$emplrStAdd ?>>
			</div></td>
		</tr>
		<tr>
		<td colspan="4">
		<td>
			<label for="944Suite">Suite</label>
			<td><td><input type="text" class="form-control" id="944Suite" name="944Suite" readonly required <?php echo "value=".$emplrSuiteNum ?>>
			</div></td>
		</tr>
		<td colspan="4">
		<td>
			<label for="944City">City</label>
			<td><td><input type="text" class="form-control" id="944City" name="944City" readonly required  <?php echo 'value="' . $emplrCity . '" '?> >
			</div></td>
		</tr>
		<tr>
		<td colspan="4">
		<td>
			<label for="944State">State</label>
			<td><td><input type="text" class="form-control" id="944State" name="944State" readonly required <?php echo "value=".$emplrState ?>>
			</div></td>
		</tr>
		<tr>
		<td colspan="4">
		<td>
			<label for="944Zip">Zip Code</label>
			<td><td><input type="text" class="form-control" id="944Zip" name="944Zip" readonly required <?php echo "value=".$emplrZip ?>>
			</div></td>
		</tr>
	</table>
</br>
</br>


<table>
<tr>
		<td colspan="4">
		<td>
			<label for="944Comp">1. Wages, tips, and other compensation </label>
			<td><td><input type="text" class="form-control" id="944Comp" name="944Comp" readonly required <?php echo "value=".$Compensation ?>>
			</div></td>
		</tr>


<tr>
		<td colspan="4">
		<td>
			<label for="944FedTax">2. Federal income tax withheld from wages, tips, and other compensation </label>
			<td><td><input type="text" class="form-control" id="944FedTax" name="944FedTax" readonly required <?php echo "value=".$FedWithold ?>>
			</div></td>
		</tr>
		
		
		
<tr>
		<td colspan="4">
		<td>
			<label for="944NoComp">3. If no wages, tips, and other compensation are subject to social security or Medicare tax </label>
			<td><td><input type="text" class="form-control" id="944NoComp" name="944NoComp" readonly required <?php echo "value=".$NoComp ?>>
			</div></td>
		</tr>
		
</table>

<table>
		<tr>
		<td colspan="4">
		<td>
			<label for="SSWages">4a. Taxable social security wages</label>
			<td><td><input type="text" class="form-control" id="SSWages" name="SSWages" readonly required <?php echo "value=".$SSWages ?>>
			</div></td>
			<td colspan="5">
			<td>
			<label for="SSWagesTax">x 0.124 = </label>
			<td><td><input type="text" class="form-control" id="SSWagesTax" name="SSWagesTax" readonly required <?php echo "value=".$SSWagesTax  ?>>
			</div></td>
</tr>	

<tr>
		<td colspan="4">
		<td>
			<label for="SSTip">4b. Taxable social security tips</label>
			<td><td><input type="text" class="form-control" id="SSTip" name="SSTip" readonly required <?php echo "value=".$SSTips ?>>
			</div></td>
			<td colspan="5">
			<td>
			<label for="SSTipsTax">x 0.124 = </label>
			<td><td><input type="text" class="form-control" id="SSTipsTax" name="SSTipsTax" readonly required <?php echo "value=".$SSTipsTax ?>>
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="MDCWages">4c. Taxable Medicare wages & tips</label>
			<td><td><input type="text" class="form-control" id="MDCWages" name="MDCWages" readonly required <?php echo "value=".$MDCWages ?>>
			</div></td>
			<td colspan="5">
			<td>
			<label for="MDCWagesTax">x 0.029 = </label>
			<td><td><input type="text" class="form-control" id="MDCWagesTax" name="MDCWagesTax" readonly required <?php echo "value=".$MDCWagesTax ?>>
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="MDCTip">4d. Taxable wages & tips subject to Additional Medicare Tax withholding</label>
			<td><td><input type="text" class="form-control" id="MDCTip" name="MDCTip" readonly required <?php echo "value=".$AddMDCWages ?>>
			</div></td>
			<td colspan="5">
			<td>
			<label for="MDCTipTax">x 0.009 = </label>
			<td><td><input type="text" class="form-control" id="MDCTipTax" name="MDCTipTax" readonly required <?php echo "value=".$AddMDCTax ?>>
			</div></td>
</tr>
</table>
<table>
<tr>
		<td colspan="4">
		<td>
			<label for="TotalTax">4e. Add Column 2 from lines 4a, 4b, 4c, and 4d  </label>
			<td><td><input type="text" class="form-control" id="TotalTax" name="TotalTax" readonly required <?php echo "value=".$TotalTax ?>>
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="TotalTaxBeforeAdj">5. Total taxes before adjustments. Add lines 2, 4e </label>
			<td><td><input type="text" class="form-control" id="TotalTaxBeforeAdj" name="TotalTaxBeforeAdj" readonly required <?php echo "value=".$TotalTaxBeforeAdj ?>>
			</div></td>
</tr>  
<tr>
		<td colspan="4">
		<td>
			<label for="CYAdj">6. Current years’s adjustment</label>
			<td><td><input type="text" class="form-control" id="CYAdj" name="CYAdj" readonly required <?php echo "value=".$CYAdj ?>>
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="TotTaxAdj">7. Total taxes after adjustments. Add lines 5 and 6 </label>
			<td><td><input type="text" class="form-control" id="TotTaxAdj" name="TotTaxAdj" readonly required <?php echo "value=".$TotTaxAdj ?>>
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="SmlBusCred">8. Qualified small business payroll tax credit for increasing research activities.</label>
			<td><td><input type="text" class="form-control" id="SmlBusCred" name="SmlBusCred" readonly required <?php echo "value=".$SmlBusCred ?>>
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="ToTaxAdjb">9. Total taxes after adjustments and credits. Subtract line 8 from line 7   </label>
			<td><td><input type="text" class="form-control" id="ToTaxAdjb" name="ToTaxAdjb" readonly required <?php echo "value=".$ToTaxAdjb ?>>
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="YrlyDep">10. Total deposits for this year, including overpayment applied from a prior year</label>
			<td><td><input type="text" class="form-control" id="YrlyDep" name="YrlyDep" readonly required <?php echo "value=".$YrlyDep ?>>
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="BalDue">11. Balance due. If line 9 is more than line 10, enter the difference</label>
			<td><td><input type="text" class="form-control" id="BalDue" name="BalDue" readonly required <?php echo "value=".$BalDue ?>>
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="OvrPay">12. Overpayment. If line 10 is more than line 9</label>
			<td><td><input type="text" class="form-control" id="OvrPay" name="OvrPay" readonly required <?php echo "value=".$OvrPay ?>>
			</div></td>
		</br></br></br>
		</div>
</table>
<br><br>

		<table>
<label for="944opt">Choose one</label>&nbsp;
                <div class="btn-group btn-group-toggle" data-toggle="buttons" id="944opt">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="options" id="944opt1" name="944opt1" autocomplete="off" checked> Apply to next return
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="944opt2" name="944opt2"  autocomplete="off"> Send to refund
                      </div>
                </div>
</table>
<br><br><br>


<tr>		
		<table>
<label for="944opt">Choose One</label>&nbsp;
                <div class="btn-group btn-group-toggle" data-toggle="buttons" id="944opt">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="options" id="944opt1" name="944opt1" autocomplete="off" checked> Line 9 is less than $2500.Go to Part 3
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="944opt2" name="944opt2"  autocomplete="off"> 
			Line 9 is $2,500 or more. Enter your tax liability for each month. 
			<br>If you’re a semiweekly depositor or you became one because you 
			<br>accumulated $100,000 or more of liability on any day during a deposit period,
			<br>you must complete Form 945-A instead of the boxes below
                        </label>
                      </div>
                </div>
</table>
</tr>
<br><br>
<table>
	<tr>
		<td colspan="4">
		<td>
			<label for="Jan">13a. Jan.</label>
			<td><td><input type="text" class="form-control" id="Jan" name="Jan" readonly required <?php echo "value=".$jan ?>>
			</div></td>
		<td colspan="4">
		<td>
			<label for="Apr">13d. Apr.</label>
			<td><td><input type="text" class="form-control" id="Apr" name="Apr" readonly required <?php echo "value=".$april ?>>
			</div></td>
		<td colspan="4">
		<td>
			<label for="July">13g. July.</label>
			<td><td><input type="text" class="form-control" id="July" name="July" readonly required <?php echo "value=".$july ?>>
			</div></td>
			<td colspan="4">
		<td>
			<label for="Oct">13j. Oct.</label>
			<td><td><input type="text" class="form-control" id="Oct" name="Oct" readonly required <?php echo "value=".$oct ?>>
			</div></td>
	</tr>
		
</table>
<table>
	<tr>
		<td colspan="4">
		<td>
			<label for="Feb">13b. Feb.</label>
			<td><td><input type="text" class="form-control" id="Feb" name="Feb" readonly required <?php echo "value=".$feb ?>>
			</div></td>
		<td colspan="4">
		<td>
			<label for="May">13e. May.</label>
			<td><td><input type="text" class="form-control" id="May" name="May" readonly required <?php echo "value=".$may ?>>
			</div></td>
		<td colspan="4">
		<td>
			<label for="Aug">13h. Aug.</label>
			<td><td><input type="text" class="form-control" id="Aug" name="Aug" readonly required <?php echo "value=".$aug ?>>
			</div></td>
			<td colspan="4">
		<td>
			<label for="Nov">13k. Nov.</label>
			<td><td><input type="text" class="form-control" id="Nov" name="Nov" readonly required <?php echo "value=".$nov ?>>
			</div></td>
	</tr>
		
</table>
<table>
	<tr>
		<td colspan="4">
		<td>
			<label for="Mar">13c. Mar.</label>
			<td><td><input type="text" class="form-control" id="Mar" name="Mar" readonly required <?php echo "value=".$march ?>>
			</div></td>
		<td colspan="4">
		<td>
			<label for="June">13f. June.</label>
			<td><td><input type="text" class="form-control" id="June" name="June" readonly required <?php echo "value=".$june ?> >
			</div></td>
		<td colspan="4">
		<td>
			<label for="Sept">13i. Sep.</label>
			<td><td><input type="text" class="form-control" id="Sept" name="Sept" readonly required <?php echo "value=".$sept ?>>
			</div></td>
			<td colspan="4">
		<td>
			<label for="Dec">13l. Dec.</label>
			<td><td><input type="text" class="form-control" id="Dec" name="Dec" readonly required <?php echo "value=".$dec ?>>
			</div></td>
	</tr>
		
</table>
<br>
<tr>
		<td colspan="4">
		<td>
			<label for="TotLiabY">Total liability for year. Add lines 13a through 13l. Total must equal line 9</label>
			<td><td><input type="text" class="form-control" id="TotLiabY" name="TotLiabY" readonly required <?php echo "value=".$TotLiabY ?>>
			</div></td>
</tr>
<br><br>


<table>
<label for="944BusClosed">14. Has your company Closed within the year</label>&nbsp;
                <div class="btn-group btn-group-toggle" data-toggle="buttons" id="944BusClosed">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="options" id="944Yes" name="944Yes" autocomplete="off" checked> Yes
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="944No" name="944No"  autocomplete="off"> No
                        </label>
                      </div>
                </div>
</table>
<table>
		<td colspan="4">
			<label for="DateEnd">If your business has closed or you stopped paying wages. Enter the final date you paid wages (YYYY/MM/DD) </label>
			<td><td><input type="text" class="form-control" id="DateEnd" name="DateEnd" >
			</div></td>
</table>
<br><br>
<table>

<tr>
		<td colspan="4">
		<td>
			<label for="944name">Name</label>
			<td><td><input type="text" class="form-control" id="944name" name="944name" disabled <?php echo 'value="'.$employeeName. '" '?> >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="944title">Title</label>
			<td><td><input type="text" class="form-control" id="944title" name="944title" readonly required <?php echo "value=".$Title ?>> 
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="944date">Date</label>
			<td><td><input type="text" class="form-control" id="944date" name="944date" readonly required <?php echo "value=".date("Y/m/d"); ?> >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="944PTIN">PTIN</label>
			<td><td><input type="text" class="form-control" id="944PTIN" name="944PTIN" readonly required <?php echo "value=".$PTIN ?> >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="944EIN">EIN</label>
			<td><td><input type="text" class="form-control" id="944EIN" name="944EIN" readonly required <?php echo "value=".$EIN ?>>
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="944Address">Address</label>
			<td><td><input type="text" class="form-control" id="944Address" name="944Address" disabled <?php echo 'value="' . $employerAddress1 . '" '?> >
</tr>	
			
<tr>
		<td colspan="4">
		<td>
			<label for="944Address">Address</label>
			<TD><td><input type="text" class="form-control" id="944Address" name="944Address" disabled <?php echo 'value="' . $employerAddress2 . '" '?> >


</table>



<br><br><br>	

<br><br>
<table>
	<td colspan="150">
	<div><H5><left>944-V <br></left></h5></div>
		<H6><left>Department of the Treasury</left></h6>
		<H6><left>Internal Revenue Service</left></h6></td>
	<td colspan="150">
		<div><H3><center>Payment Voucher <br></center></h3></div></td>
	<td colspan="150">
		<div><H5><right>OMB No. 1545-0029 <br></right></h5></div>
		<H3><right>2020</right></h3></td>

</table>

<table>
<tr>
		<td colspan="4">
		<td>
			<label for="944EIN">(EIN)</label>
			<td><td><input type="text" class="form-control" id="944EIN" name="944EIN" readonly required <?php echo "value=".$EIN ?>>
			</div></td>
			<td colspan="5">
			<td>
			<label for="944Payment">Payment </label>
			<td><td><input type="text" class="form-control" id="944Payment" name="944Payment" >
			</div></td><br>
</tr>
		<td colspan="4">
		<td>
			<label for="944Period">Tax Period</label>
			<td><td><input type="text" class="form-control" id="944Period" name="944Period"  readonly required <?php echo "value=".date("Y"); ?> >
			</div></td>
</table>
<table>	
	
		<td colspan="5">
			<td>
			<label for="944Business">Bus Name </label>
			<td><td><input type="text" class="form-control" id="944Business" name="944Business" disabled <?php echo 'value="' . $emplrName . '" '?>  >
			</div></td>
</table>
<table>	
	
		<td colspan="219">
		<td>
			<label for="944BusinessAdd1">Bus Addr1 </label>
			<td><td><input type="text" class="form-control" id="944BusinessAdd1" name="944BusinessAdd1" disabled <?php echo 'value="' . $employerAddress1 . '" '?> >
			</div></td>
</table>
<table>		
		<td colspan="219">
		<td>
			<label for="944Business2">Bus Addr2 </label>
			<td><td><input type="text" class="form-control" id="944Business2" name="944Business2" disabled <?php echo 'value="' . $employerAddress2 . '" '?> >
			</div></td>
</table>
<br><br> 
<button style = "margin: 0 auto; display: block;" type="submit" class="btn btn-dark">Submit</button>
  </form>
  <br> 
  </body>
</html>