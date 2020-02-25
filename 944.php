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
	
<body>
<?php include("navbar.php") ?>

<div><H1><center>944 Form </center></h1></div></br>
<table>
	<tr>
		<td colspan="4">
		<td><label for="944EIN">Employer identification number (EIN)</label>
		<td><td><input type="text" class="form-control" id="944EIN" name="944EIN" >
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="4">
		<td>
			<label for="944Name">Name</label>
			<td><td><input type="text" class="form-control" id="944Name" name="944Name" >
			</div></td>
		</tr>	
		<tr>
		<td colspan="4">
		<td>
			<label for="944Address">Address</label>
			<td><td><input type="text" class="form-control" id="944Address" name="944Address" >
			</div></td>
		</tr>	
			
		<tr>
		<td colspan="4">
		<td>
			<label for="944Number">Number</label>
			<TD><td><input type="text" class="form-control" id="944Number" name="944Number" >
			</div></td>
		</tr>	
		<tr>
		<td colspan="4">
		<td>
			<label for="944Street">Street</label>
			<TD><td><input type="text" class="form-control" id="944Street" name="944Street" >
			</div></td>
		</tr>
		<tr>
		<td colspan="4">
		<td>
			<label for="944Suite">Suite</label>
			<td><td><input type="text" class="form-control" id="944Suite" name="944Suite" >
			</div></td>
		</tr>
		<td colspan="4">
		<td>
			<label for="944City">City</label>
			<td><td><input type="text" class="form-control" id="944City" name="944City" >
			</div></td>
		</tr>
		<tr>
		<td colspan="4">
		<td>
			<label for="944State">State</label>
			<td><td><input type="text" class="form-control" id="944State" name="944State" >
			</div></td>
		</tr>
		<tr>
		<td colspan="4">
		<td>
			<label for="944Zip">Zip Code</label>
			<td><td><input type="text" class="form-control" id="944Zip" name="944Zip" >
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
			<td><td><input type="text" class="form-control" id="944Comp" name="944Comp" >
			</div></td>
		</tr>


<tr>
		<td colspan="4">
		<td>
			<label for="944FedTax">2. Federal income tax withheld from wages, tips, and other compensation </label>
			<td><td><input type="text" class="form-control" id="944FedTax" name="944FedTax" >
			</div></td>
		</tr>
		
		
		
<tr>
		<td colspan="4">
		<td>
			<label for="944NoComp">3. If no wages, tips, and other compensation are subject to social security or Medicare tax </label>
			<td><td><input type="text" class="form-control" id="944NoComp" name="944NoComp" >
			</div></td>
		</tr>
		
</table>

<table>
		<tr>
		<td colspan="4">
		<td>
			<label for="944SSWage">4a. Taxable social security wages</label>
			<td><td><input type="text" class="form-control" id="944SSWage" name="944SSWage" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="wagesb">x 0.124 = </label>
			<td><td><input type="text" class="form-control" id="wagesb" name="wages2" >
			</div></td>
</tr>	

<tr>
		<td colspan="4">
		<td>
			<label for="944SSTip">4b. Taxable social security tips</label>
			<td><td><input type="text" class="form-control" id="944SSTip" name="944SSTip" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="wagesc">x 0.124 = </label>
			<td><td><input type="text" class="form-control" id="wagesc" name="wagesc" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="944MDCWage">4c. Taxable Medicare wages & tips</label>
			<td><td><input type="text" class="form-control" id="944MDCWage" name="944MDCWage" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="wages2">x 0.029 = </label>
			<td><td><input type="text" class="form-control" id="wagesd" name="wagesd" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="944MDCTip">4d. Taxable wages & tips subject to Additional Medicare Tax withholding</label>
			<td><td><input type="text" class="form-control" id="944MDCTip" name="944MDCTip" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="wagese">x 0.009 = </label>
			<td><td><input type="text" class="form-control" id="wagese" name="wagese" >
			</div></td>
</tr>
</Table>
<table>
<tr>
		<td colspan="4">
		<td>
			<label for="944Add4abcd">4e. Add Column 2 from lines 4a, 4b, 4c, and 4d  </label>
			<td><td><input type="text" class="form-control" id="944Add4abcd" name="944Add4abcd" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="944TotTax">5. Total taxes before adjustments. Add lines 2, 4e </label>
			<td><td><input type="text" class="form-control" id="944TotTax" name="944TotTax" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="944CYAdj">6. Current years’s adjustment</label>
			<td><td><input type="text" class="form-control" id="944CYAdj" name="944CYAdj" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="944TotTaxAdj">7. Total taxes after adjustments. Add lines 5 and 6 </label>
			<td><td><input type="text" class="form-control" id="944TotTaxAdj" name="944TotTaxAdj" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="944SmlBus">8. Qualified small business payroll tax credit for increasing research activities.</label>
			<td><td><input type="text" class="form-control" id="944SmlBus" name="944SmlBus" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="944ToTaxAdjb">9. Total taxes after adjustments and credits. Subtract line 8 from line 7   </label>
			<td><td><input type="text" class="form-control" id="944ToTaxAdjb" name="944ToTaxAdjb" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="944epY">10. Total deposits for this year, including overpayment applied from a prior year</label>
			<td><td><input type="text" class="form-control" id="944epY" name="944epY" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="944Bal">11. Balance due. If line 9 is more than line 10, enter the difference</label>
			<td><td><input type="text" class="form-control" id="944Bal" name="944Bal" >
			</div></td>
</tr>
</table>
<table>
<tr>
		<td colspan="4">
		<td>
			<label for="944OvrPay">12. Overpayment. If line 10 is more than line 9</label>
			<td><td><input type="text" class="form-control" id="944OvrPay" name="944OvrPay" >
			</div></td>
		</br></br></br>
		</div>
		<td colspan="10">
		<td><div>(Check one)</div></td>
		</tr>
			<td colspan="25">
		<td><div><td><input type="radio" id="944Apply to next return" name="Apply to next return" value= "944Apply to next return">
			<label for="944Apply to next return">Apply to next return</label></td>
			
			<td colspan="25">
		<td><div><td><input type="radio" id="944Send to refund" name="944Send to refund" value= "944Send to refund">
			<label for="944Send to refund">Send to refund</label></td>
		</tr>	
</tr>
</table>


<tr>
		<td colspan="4">
		Check one:
		<td>
		<table>
	    <div class="form-group col-md-3">
		<td colspan="150"><div><input type="radio" id="944opt1" name="944opt1" value= "944opt1">
			<label for="944opt1">Line 9 is less than $2500.Go to Part 3</label></td>
</table>
<br>
<table>
		<td colspan="4">
		<td>
			<td><div><input type="radio" id="944opt2" name="944opt2" value= "944opt2">
			<label for="944opt2">Line 9 is $2,500 or more. Enter your tax liability for each month.
			If you’re a semiweekly depositor or you became one <br> because you accumulated $100,000 or more of liability
			on any day during a deposit period, you must complete Form 945-A instead of the boxes below</label></td>
</tr>
</table>
<br><br>
<table>
	<tr>
		<td colspan="4">
		<td>
			<label for="944Jan">13a. Jan.</label>
			<td><td><input type="text" class="form-control" id="944Jan" name="944Jan" >
			</div></td>
		<td colspan="4">
		<td>
			<label for="944Apr">13d. Apr.</label>
			<td><td><input type="text" class="form-control" id="944Apr" name="944Apr" >
			</div></td>
		<td colspan="4">
		<td>
			<label for="944July">13g. July.</label>
			<td><td><input type="text" class="form-control" id="944July" name="944July" >
			</div></td>
			<td colspan="4">
		<td>
			<label for="944Oct">13j. Oct.</label>
			<td><td><input type="text" class="form-control" id="944Oct" name="944Oct" >
			</div></td>
	</tr>
		
</table>
<table>
	<tr>
		<td colspan="4">
		<td>
			<label for="944Feb">13b. Feb.</label>
			<td><td><input type="text" class="form-control" id="944Feb" name="944Feb" >
			</div></td>
		<td colspan="4">
		<td>
			<label for="944May">13e. May.</label>
			<td><td><input type="text" class="form-control" id="944May" name="944May" >
			</div></td>
		<td colspan="4">
		<td>
			<label for="944Aug">13h. Aug.</label>
			<td><td><input type="text" class="form-control" id="944Aug" name="944Aug" >
			</div></td>
			<td colspan="4">
		<td>
			<label for="944Nov">13k. Nov.</label>
			<td><td><input type="text" class="form-control" id="944Nov" name="944Nov" >
			</div></td>
	</tr>
		
</table>
<table>
	<tr>
		<td colspan="4">
		<td>
			<label for="944Mar">13c. Mar.</label>
			<td><td><input type="text" class="form-control" id="944Mar" name="944Mar" >
			</div></td>
		<td colspan="4">
		<td>
			<label for="944June">13f. June.</label>
			<td><td><input type="text" class="form-control" id="944June" name="944June" >
			</div></td>
		<td colspan="4">
		<td>
			<label for="944Sept">13i. Sep.</label>
			<td><td><input type="text" class="form-control" id="944Sept" name="944Sept" >
			</div></td>
			<td colspan="4">
		<td>
			<label for="944Dec">13l. Dec.</label>
			<td><td><input type="text" class="form-control" id="944Dec" name="944Dec" >
			</div></td>
	</tr>
		
</table>
<br>
<tr>
		<td colspan="4">
		<td>
			<label for="944TotLiabY">Total liability for year. Add lines 13a through 13l. Total must equal line 9</label>
			<td><td><input type="text" class="form-control" id="944TotLiabY" name="944TotLiabY" >
			</div></td>
</tr>
<br><br>




<table>
		<td colspan="4">
		<td>
			<td><div><input type="radio" id="944close" name="944close" value= "944close">
			<label for="944close">14. If your business has closed or you stopped paying wages </label></td>
			<td colspan="14">
		<td>
			<label for="944DateWage">Enter the final date you paid wages </label>
			<td><td><input type="text" class="form-control" id="944DateWage" name="944DateWage" >
			</div></td>
</table>
<br><br>
<table>
		<td colspan="4">
		<td>
			<td><div><input type="radio" id="944Designee" name="944Designee" value= "944Designee">
			<label for="944Designee">Yes. Designee’s name and phone number </label></td>
			<td colspan="75">
		<td>
			<label for="944PIN">5 digit PIN</label>
			<td><td><input type="text" class="form-control" id="944PIN" name="944PIN" >
			</div></td>
</table>
<table>
		<td colspan="4">
		<td>
			<td><div><input type="radio" id="944No" name="944No" value= "944No">
			<label for="941No">No. </label></td>
		
</table>
<br><br>
<table>

<tr>
		<td colspan="4">
		<td>
			<label for="944name">Name</label>
			<td><td><input type="text" class="form-control" id="944name" name="944name" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="944title">Title</label>
			<td><td><input type="text" class="form-control" id="944title" name="944title" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="944phone">Phone</label>
			<td><td><input type="text" class="form-control" id="944phone" name="944phone" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="944signature">Electonic signature</label>
			<td><td><input type="text" class="form-control" id="944signature" name="944signature" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="944date">Date</label>
			<td><td><input type="text" class="form-control" id="944date" name="944date" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="944PTIN">PTIN</label>
			<td><td><input type="text" class="form-control" id="944PTIN" name="944PTIN" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="944EIN">EIN</label>
			<td><td><input type="text" class="form-control" id="944EIN" name="944EIN" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="944Address">Address</label>
			<td><td><input type="text" class="form-control" id="944Address" name="944Address" >
</tr>	
			
<tr>
		<td colspan="4">
		<td>
			<label for="944Number">Number</label>
			<TD><td><input type="text" class="form-control" id="944Number" name="944Number" >

<tr>
		<td colspan="4">
		<td>
			<label for="944Street">Street</label>
			<TD><td><input type="text" class="form-control" id="944Street" name="944Street" >

</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="944Suite">Suite</label>
			<td><td><input type="text" class="form-control" id="944Suite" name="944Suite" >
			</div></td>
</tr>
		<td colspan="4">
		<td>
			<label for="944City">City</label>
			<td><td><input type="text" class="form-control" id="944City" name="944City" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="944State">State</label>
			<td><td><input type="text" class="form-control" id="944State" name="944State" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="944Zip">Zip Code</label>
			<td><td><input type="text" class="form-control" id="944Zip" name="944Zip" >
			</div></td>
</tr>

</table>



<br><br><br>	

<br><br>
<table>
<td colspan="150">
<div><H5><left>944-V <br></left></h5></div>
<H6><left>Department of the Treasury</left></h6>
<H6><left>Internal Revenue Service</left></h6>
<td colspan="150">
<H3><center>Payment Voucher <br></center></h3></div>
<td colspan="150">
<H5><right>OMB No. 1545-0029 <br></right></h5></div>
<H3><right>2020</right></h3>

</table>

<table>
<tr>
		<td colspan="4">
		<td>
			<label for="944EIN">Employee Identification Number (EIN)</label>
			<td><td><input type="text" class="form-control" id="944EIN" name="944EIN" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="944Payment">Payment </label>
			<td><td><input type="text" class="form-control" id="944Payment" name="944Payment" >
			</div></td><br>
			<tr>
		<td colspan="4">
		<td>
			<label for="944Period">Tax Period</label>
			<td><td><input type="text" class="form-control" id="944Period" name="944Period" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="944Business">Business Name </label>
			<td><td><input type="text" class="form-control" id="944Business" name="944Business" >
			</div></td>
<table>
<table>	
	
		<td colspan="219">
		<td>
			<label for="944BusinessAdd1">Business Addr1 </label>
			<td><td><input type="text" class="form-control" id="944BusinessAdd1" name="944BusinessAdd1" >
			</div></td>
</table>
<table>		
		<td colspan="219">
		<td>
			<label for="944Business2">Business Addr2 </label>
			<td><td><input type="text" class="form-control" id="944Business2" name="944Business2" >
			</div></td>
</table>