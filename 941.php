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

<div><H1><center>941 Form </center></h1></div></br>
<table>
	<tr>
		<td colspan="4">
		<td><label for="941EIN">Employer identification number (EIN)</label>
		<td><td><input type="text" class="form-control" id="941EIN" name="941EIN" >
			</div>
		</td>
			
 </br></br></br>
      </div>
		<td colspan="125">
		<td><div>(Check one)</div></td>
	</tr>
	<tr>
		<td colspan="4">
		<td>
			<label for="941Name">Name</label>
			<td><td><input type="text" class="form-control" id="941Name" name="941Name" >
			</div></td>
		<td colspan="125">
		<td><div><td><input type="radio" id="1.January,Feb,March" name="1.January,Feb,March" value= "1.January,Feb,March">
			<label for="1.January,Feb,March">1. January,Feb,March</label></td>
		</tr>	
		<tr>
		<td colspan="4">
		<td>
			<label for="941Address">Address</label>
			<td><td><input type="text" class="form-control" id="941Address" name="941Address" >
			</div></td>
		<td colspan="125">
		<td>
			<td><div><input type="radio" id="2.April, May, June" name="2.April, May, June" value= "2.April, May, June">
			<label for="2. April, May, June">2. April, May, June</label></td>
		</tr>	
			
		<tr>
		<td colspan="4">
		<td>
			<label for="941Number">Number</label>
			<TD><td><input type="text" class="form-control" id="941Number" name="941Number" >
			</div></td>
		<td colspan="125">
			<td><div><td><input type="radio" id="3.July,August,September" name="3.July,August,September" value= "3.July,August,September">
			<label for="3. July,August,September">3. July,August,September</label></td>
		</tr>	
		<tr>
		<td colspan="4">
		<td>
			<label for="941Street">Street</label>
			<TD><td><input type="text" class="form-control" id="941Street" name="941Street" >
			</div></td>
		<td colspan="125">
			<td><div><td><input type="radio" id="4.October, November, December" name="4.October, November, December" value= "4.October, November, December">
			<label for="4.October, November, December">4. October, November, December</label></td>
		</tr>
		<tr>
		<td colspan="4">
		<td>
			<label for="941Suite">Suite</label>
			<td><td><input type="text" class="form-control" id="941Suite" name="941Suite" >
			</div></td>
		</tr>
		<td colspan="4">
		<td>
			<label for="941City">City</label>
			<td><td><input type="text" class="form-control" id="941City" name="941City" >
			</div></td>
		</tr>
		<tr>
		<td colspan="4">
		<td>
			<label for="941State">State</label>
			<td><td><input type="text" class="form-control" id="941State" name="941State" >
			</div></td>
		</tr>
		<tr>
		<td colspan="4">
		<td>
			<label for="941Zip">Zip Code</label>
			<td><td><input type="text" class="form-control" id="941Zip" name="941Zip" >
			</div></td>
		</tr>
	</table>
</br>
</br>


<table>
<tr>
		<td colspan="4">
		<td>
			<label for="941NumEmp">1. Number of employees who received wages, tips, or other compensation for the pay period including:
			Mar. 12 (Quarter 1), June 12 (Quarter 2), Sept. 12 (Quarter 3), or Dec. 12 (Quarter 4)</label>
			<td><td> <input type="text" class="form-control" id="941NumEmp" name="941NumEmp" >
			</div></td>
		</tr>
		
		<tr>
		<td colspan="4">
		<td>
			<label for="941Comp">2. Wages, tips, and other compensation </label>
			<td><td><input type="text" class="form-control" id="941Comp" name="941Comp" >
			</div></td>
		</tr>


<tr>
		<td colspan="4">
		<td>
			<label for="941FedTax">3. Federal income tax withheld from wages, tips, and other compensation </label>
			<td><td><input type="text" class="form-control" id="941FedTax" name="941FedTax" >
			</div></td>
		</tr>
		
		
		
<tr>
		<td colspan="4">
		<td>
			<label for="941NoComp">4. If no wages, tips, and other compensation are subject to social security or Medicare tax </label>
			<td><td><input type="text" class="form-control" id="941NoComp" name="941NoComp" >
			</div></td>
		</tr>
		
</table>

<table>
		<tr>
		<td colspan="4">
		<td>
			<label for="941SSWage">5a. Taxable social security wages</label>
			<td><td><input type="text" class="form-control" id="941SSWage" name="941SSWage" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="wages2">x 0.124 = </label>
			<td><td><input type="text" class="form-control" id="wages2" name="wages2" >
			</div></td>
</tr>	

<tr>
		<td colspan="4">
		<td>
			<label for="941SSTip">5b. Taxable social security tips</label>
			<td><td><input type="text" class="form-control" id="941SSTip" name="941SSTip" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="wages2">x 0.124 = </label>
			<td><td><input type="text" class="form-control" id="wages2" name="wages2" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941MDCWage">5c. Taxable Medicare wages & tips</label>
			<td><td><input type="text" class="form-control" id="941MDCWage" name="941MDCWage" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="wages2">x 0.029 = </label>
			<td><td><input type="text" class="form-control" id="wages2" name="wages2" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="941MDCTip">5d. Taxable wages & tips subject to Additional Medicare Tax withholding</label>
			<td><td><input type="text" class="form-control" id="941MDCTip" name="941MDCTip" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="wages2">x 0.009 = </label>
			<td><td><input type="text" class="form-control" id="wages2" name="wages2" >
			</div></td>
</tr>
</Table>
<table>
<tr>
		<td colspan="4">
		<td>
			<label for="941Add5abcd">5e. Add Column 2 from lines 5a, 5b, 5c, and 5d  </label>
			<td><td><input type="text" class="form-control" id="941Add5abcd" name="941Add5abcd" >
			</div></td>
</tr>
		
<tr>
		<td colspan="4">
		<td>
			<label for="941DemTax">5f. Section 3121(q) Notice and Demand—Tax due on unreported tips (see instructions)  </label>
			<td><td><input type="text" class="form-control" id="941DemTax" name="941DemTax" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941TotTax">6. Total taxes before adjustments. Add lines 3, 5e, and 5f </label>
			<td><td><input type="text" class="form-control" id="941TotTax" name="941TotTax" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941QAdj">7. Current quarter’s adjustment for fractions of cents </label>
			<td><td><input type="text" class="form-control" id="941QAdj" name="941QAdj" >
			</div></td>
</tr>


<tr>
		<td colspan="4">
		<td>
			<label for="941QSick">8. Current quarter’s adjustment for sick pay  </label>
			<td><td><input type="text" class="form-control" id="941QSick" name="941QSick" >
			</div></td>
</tr>


<tr>
		<td colspan="4">
		<td>
			<label for="941QIns">9. Current quarter’s adjustments for tips and group-term life insurance   </label>
			<td><td><input type="text" class="form-control" id="941QIns" name="941QIns" >
			</div></td>
</tr>


<tr>
		<td colspan="4">
		<td>
			<label for="941ToTaxAdja">10. Total taxes after adjustments. Combine lines 6 through 9   </label>
			<td><td><input type="text" class="form-control" id="941ToTaxAdja" name="941ToTaxAdja" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941SmlBus">11. Qualified small business payroll tax credit for increasing research activities. Attach Form 8974   </label>
			<td><td><input type="text" class="form-control" id="941SmlBus" name="941SmlBus" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941ToTaxAdjb">12. Total taxes after adjustments and credits. Subtract line 11 from line 10   </label>
			<td><td><input type="text" class="form-control" id="941ToTaxAdjb" name="941ToTaxAdjb" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941DepQ">13 Total deposits for this quarter, including overpayment applied from a prior quarter and overpayments applied from Form 941-X, 941-X (PR), 944-X, or 944-X (SP) filed in the current qtr   </label>
			<td><td><input type="text" class="form-control" id="941DepQ" name="941DepQ" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941Bal">14. Balance due. If line 12 is more than line 13, enter the difference and see instructions   </label>
			<td><td><input type="text" class="form-control" id="941Bal" name="941Bal" >
			</div></td>
</tr>
</table>
<table>
<tr>
		<td colspan="4">
		<td>
			<label for="941OvrPay">15. Overpayment. If line 13 is more than line 12</label>
			<td><td><input type="text" class="form-control" id="941OvrPay" name="941OvrPay" >
			</div></td>
		</br></br></br>
		</div>
		<td colspan="10">
		<td><div>(Check one)</div></td>
		</tr>
			<td colspan="25">
		<td><div><td><input type="radio" id="Apply to next return" name="Apply to next return" value= "Apply to next return">
			<label for="Apply to next return">Apply to next return</label></td>
			
			<td colspan="25">
		<td><div><td><input type="radio" id="Send to refund" name="Send to refund" value= "Send to refund">
			<label for="Send to refund">Send to refund</label></td>
		</tr>	
</tr>
</table>


<tr>
		<td colspan="4">
		Check one:
		<td>
		<table>
	    <div class="form-group col-md-3">
		<td colspan="150"><div><input type="radio" id="941opt1" name="941opt1" value= "941opt1">
			<label for="941opt1">Line 12 on this return is less than $2,500 or line 12 on the return for the prior quarter was less than $2,500, and you didn’t
			incur a $100,000 next-day deposit obligation during the current quarter. If line 12 for the prior quarter was less than $2,500 but
			line 12 on this return is $100,000 or more, you must provide a record of your federal tax liability. If you are a monthly schedule
			depositor, complete the deposit schedule below; if you are a semiweekly schedule depositor, attach Schedule B (Form 941). Go to
			Part 3</label></td>
</table>
<table>
		<td colspan="4">
		<td colspan="150">
		<td>
			<td><div><input type="radio" id="941opt2" name="941opt2" value= "941opt2">
			<label for="941opt2">You were a monthly schedule depositor for the entire quarter. Enter your tax liability for each month and total
			liability for the quarter, then go to Part 3.</label></td>
</tr>
</table>
<br><br><br>
<table>
<tr>
		<td colspan="4">
		Tax Liability
			</div></td>
			<td colspan="5">
			<td>
			<label for="Mth1">Month 1 </label>
			<td><td><input type="text" class="form-control" id="Mth1" name="Mth1" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="Mth2">Month 2 </label>
			<td><td><input type="text" class="form-control" id="Mth2" name="Mth2" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="Mth3">Month 3 </label>
			<td><td><input type="text" class="form-control" id="Mth3" name="Mth3" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="TotalLiab">Total Liability for quater </label>
			<td><td><input type="text" class="form-control" id="TotalLiab" name="TotalLiab" >
			</div></td>
</tr>

</table>

<br>
<table>
		<td colspan="4">
		<td colspan="124">
		<td>
			<td><div><input type="radio" id="opt3" name="2.opt3" value= "2.opt3">
			<label for="opt3">You were a semiweekly schedule depositor for any part of this quarter. Complete Schedule B (Form 941),
			Report of Tax Liability for Semiweekly Schedule Depositors, and attach it to Form 941.</label></td>
</tr>
</table>

<table>
		<td colspan="4">
		<td>
			<td><div><input type="radio" id="opt17" name="2.opt17" value= "2.opt17">
			<label for="opt17">17. If your business has closed or you stopped paying wages </label></td>
			<td colspan="14">
		<td>
			<label for="DateWage">Enter the final date you paid wages </label>
			<td><td><input type="text" class="form-control" id="DateWage" name="DateWage" >
			</div></td>
</table>
<table>
		<td colspan="4">
		<td>
			<td><div><input type="radio" id="opt18" name="2.opt18" value= "2.opt18">
			<label for="opt18">18. If you are a seasonal employer and you don’t have to file a return for every quarter of the year  </label></td>
</tr>
</table>

<table>
		<td colspan="4">
		<td>
			<td><div><input type="radio" id="941Designee" name="941Designee" value= "941Designee">
			<label for="941Designee">Yes. Designee’s name and phone number </label></td>
			<td colspan="75">
		<td>
			<label for="941PIN">5 digit PIN</label>
			<td><td><input type="text" class="form-control" id="941PIN" name="941PIN" >
			</div></td>
</table>
<table>
		<td colspan="4">
		<td>
			<td><div><input type="radio" id="941No" name="941No" value= "941No">
			<label for="941No">No. </label></td>
		
</table>

<table>

<tr>
		<td colspan="4">
		<td>
			<label for="name">Name</label>
			<td><td><input type="text" class="form-control" id="name" name="name" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="title">Title</label>
			<td><td><input type="text" class="form-control" id="title" name="title" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="phone">Phone</label>
			<td><td><input type="text" class="form-control" id="phone" name="phone" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="signature">Electonic signature</label>
			<td><td><input type="text" class="form-control" id="signature" name="signature" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="date">Date</label>
			<td><td><input type="text" class="form-control" id="date" name="date" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="PTIN">PTIN</label>
			<td><td><input type="text" class="form-control" id="PTIN" name="PTIN" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="EIN">EIN</label>
			<td><td><input type="text" class="form-control" id="EIN" name="EIN" >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="Address">Address</label>
			<td><td><input type="text" class="form-control" id="Address" name="Address" >
</tr>	
			
<tr>
		<td colspan="4">
		<td>
			<label for="Number">Number</label>
			<TD><td><input type="text" class="form-control" id="Number" name="Number" >

<tr>
		<td colspan="4">
		<td>
			<label for="Street">Street</label>
			<TD><td><input type="text" class="form-control" id="Street" name="Street" >

</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="Suite">Suite</label>
			<td><td><input type="text" class="form-control" id="Suite" name="Suite" >
			</div></td>
</tr>
		<td colspan="4">
		<td>
			<label for="City">City</label>
			<td><td><input type="text" class="form-control" id="City" name="City" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="State">State</label>
			<td><td><input type="text" class="form-control" id="State" name="State" >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="941Zip">Zip Code</label>
			<td><td><input type="text" class="form-control" id="941Zip" name="941Zip" >
			</div></td>
</tr>

</table>



<br><br><br>	

<br><br>
<table>
<td colspan="150">
<div><H5><left>941-V <br></left></h5></div>
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
			<label for="EIN">Employee Identification Number (EIN)</label>
			<td><td><input type="text" class="form-control" id="EIN" name="EIN" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="wages2">Payment </label>
			<td><td><input type="text" class="form-control" id="wages2" name="wages2" >
			</div></td><br>
			<tr>
		<td colspan="4">
		<td>
			<label for="Period">Tax Period</label>
			<td><td><input type="text" class="form-control" id="Period" name="Period" >
			</div></td>
			<td colspan="5">
			<td>
			<label for="Business">Business Name </label>
			<td><td><input type="text" class="form-control" id="Business" name="Business" >
			</div></td>
<table>
<table>	
	
		<td colspan="219">
		<td>
			<label for="BusinessAdd1">Business Addr1 </label>
			<td><td><input type="text" class="form-control" id="BusinessAdd1" name="BusinessAdd1" >
			</div></td>
</table>
<table>		
		<td colspan="219">
		<td>
			<label for="Business2">Business Addr2 </label>
			<td><td><input type="text" class="form-control" id="Business2" name="Business2" >
			</div></td>
</table>