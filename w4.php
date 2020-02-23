<?php
// Author:Vittorio Russo

include("navbar.php");
include("config.php");
$currentId = $_SESSION["id"];
$streetName = $aptNum = $city = $state = $zip = $streetNum =$firstName= $lastName = $SSN = $salary=  "";
$employeeInfo = $link->query("SELECT * FROM employee WHERE empid=$currentId");
while ($row=$employeeInfo->fetch_assoc()){
  if (isset($row['FirstName']))
    $firstName = $row['FirstName'];
  if (isset($row['LastName']))
    $lastName = filter_var($row['LastName']);
  if (isset($row['SSN']))
    $SSN = $row['SSN'];
  if (isset($row['Salary']))
    $salary = $row['Salary'];
  if (isset($row['MI']))
    $middleInitial = $row['MI'];
  if (isset($row['DeptID']))
    $deptId = $row['DeptID'];
}

$dept = $link->query("SELECT * FROM department WHERE deptid=$deptId");
$row = $dept->fetch_assoc();
$EIN = $row['EIN'];

$employerInfo = $link->query("SELECT * FROM employer WHERE EIN=$EIN");
$row = $employerInfo->fetch_assoc();
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

$employerAddress = $emplrStNum . " " . $emplrStAdd . " " . $emplrSuiteNum . " " . $emplrCity . " " . $emplrState;


$employeeAddressInfo = $link->query("SELECT * from employeeaddress WHERE EmpId=$currentId ");
while ($row = $employeeAddressInfo->fetch_assoc()){

  if (isset($row['StreetNum']))
  $streetNum = $row['StreetNum'];
  if (isset($row['StreetName']))
    $streetName = $row['StreetName'];
  if (isset($row['APTNum']))
    $aptNum = $row['APTNum'];
  if (isset($row['City']))
    $city = $row['City'];
  if (isset($row['State']))
    $state = $row['State'];
  if (isset($row['Zip']))
    $zip = $row['Zip'];

  $address = $streetNum . " " . $streetName . " " . $aptNum . ", ". $city . ", " . $state ;
  
 
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <title>Highland Capital Tax System</title>
  </head>
  <body>
    
    <h1 style="text-align:center"> W4 Form </h1>
    <form method="POST" action="w4controller.php">
	<h4 style="text-align:left"> Step 1: Enter Personal Information </h4>
      <div class="form-row">
	   <div class="form-group col-md-3">
		 <label for="w4EmployeeFirstName">a. Employee's first name</label>
          <input type="text" class="form-control" id="w4EmployeeFirstName" name="w4EmployeeFirstName" <?php echo "value=".trim($firstName) ?>>
        </div>
		
		<div class="form-group col-md-3">
		 <label for="w4EmployeeInitial">a. Employee's initial</label>
          <input type="text" class="form-control" id="w4EmployeeInitial" name="w4EmployeeInitial" <?php echo "value=".$middleInitial ?>>
          </div>
		  
		  <div class="form-group col-md-3">
		 <label for="w4EmployeeLastName">a. Employee's last name</label>
          <input type="text" class="form-control" id="w4EmployeeLastName" name="w4EmployeeLastName" <?php echo 'value="' . trim($lastName) . '" '?>>
          </div>
		  
		    <div class="form-group col-md-3">
		  <label for="w4EmployeeAddress">a. Employee's address</label>
          <input type="text" class="form-control" id="w4EmployeeAddress" name="w4EmployeeAddress" <?php echo 'value="' . $address . '" '?>>
          </div>
		  
		   <div class="form-group col-md-3">
		   <label for="w4EmployeeZipCode">a. Employee's zip code</label>
          <input type="text" class="form-control" id="w4EmployeeZipCode" name="w4EmployeeZipCode" <?php echo "value=".$zip ?>>
          </div>
		  
          <div class="form-group col-md-3">
          <label for="w4SS">b. Employee social security number</label>
          <input type="text" class="form-control" id="w4SS" name="w4SS" <?php echo "value=".$SSN ?>>
        </div>
      </div>
     
     
        <div class="form-group col-md-4">
         
          <label for="w4Options">c.</label>&nbsp;
                <div class="btn-group btn-group-toggle" data-toggle="buttons" id="w4Options">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="options" id="w4singleOrSeparate" name="w4singleOrSeparate" value="Single" autocomplete="off" checked> Single or Married filing separately
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="w4married" name="w4married" value="Married filed jointly" autocomplete="off">Married filed jointly
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="w4headofhouse" name="w4headofhouse" value="Head of Household"  autocomplete="off"> Head of household
                        </label>
                      </div>
               
        </div>
    
 
  
 
	<h4 style="text-align:left"> Step 2: Multiple jobs or Spouse Works </h4>
        <div class="form-group col-md-4">
		  <p> Complete this step is you (1) hold more than one job at a time or (2) are married filing jointly and your spouse also works.</p>
		  <p> The correct amount of withholding depends on income earned from all of these jobs.</p>
		  <p>Do only one of the following </p>
		  <p>(a) Use the estimator at www.irs.org/W4App for the most accurate withholding for this step (and Steps 3-4b) OR </p>
		  <p>(b) Use the Multiple Jobs Worksheet on page 3 and enter the result in Step 4(c) below for roughly accurate witholding OR</p>
		  <p>(c) If there are only two jobs total, you make check this box. Do the same on form W-4 for the other job. This option is accurate for jobs with similar pay; otherwise, more tax than neccessary may be withheld </p>
          <input type="checkbox" id="twoJobs" name="twoJobs" value="Yes">
        </div>

  
 
	<h4 style="text-align:left"> Step 3: Claim Dependents </h4>
        <div class="form-group col-md-4">
		  <p> If your income will be $200,000 or less ($400,000 or less if married filing jointly):</p>
		  <label for="qualifyingChildren" style="margin-left: 40px">Multiply the number of qualifiying children under age 17 by $2000</label>
          <input type="text" class="form-control" id="qualifyingChildren" name="qualifyingChildren" style="margin-left: 40px">
		  
		  <label for="otherDependents" style="margin-left: 40px">Mulitply the number of other dependents by $500</label>
          <input type="text" class="form-control" id="otherDependents" name="otherDependents" style="margin-left: 40px">
		  <br></br>
		  <label for="totalDependents">Add the amounts above and enter the total here</label>
          <input type="text" class="form-control" id="totalDependents" name="totalDependents">
        </div>
		 


  
	<h4 style="text-align:left"> Step 4(optional): Other Adjustments </h4>
        <div class="form-group col-md-4">
		  <p>(a) Other income (not from jobs). If you want tax withheld from other income you expect this year that won't have withholding, 
		  enter the amount of other income here. This may include interest, other dividends, and retirement income</p>
          <input type="text" class="form-control" id="otherIncome" name="otherIncome">
		  
		   <p>(b) Deductions. If you expect to claim deductions other than the standard deduction and want to reduce your withholding, use the deductions worksheet on page 3 and enter the result here</p>
          <input type="text" class="form-control" id="deductions" name="deductions">
		  
		   <p>(c) Extra withholding. Enter any additional tax you want withheld each pay period</p>
          <input type="text" class="form-control" id="extraWithholding" name="extraWithholding">
        </div>
		 
		 
		 <h4 style="text-align:left"> Step 5: Employers Only </h4>
        
		   <div class="form-group col-md-4">
		 <label for="w4EmployerName">Employer Name</label>
          <input type="text" class="form-control" id="w4EmployerName" name="w4EmployerName" <?php echo 'value="' . $emplrName . '" '?>>

		 <label for="w4EmployerAddress">Employer Address</label>
          <input type="text" class="form-control" id="w4EmployerAddress" name="w4EmployerAddress" <?php echo 'value="' . $employerAddress . '" '?>>
          
		 <label for="w4EmploymentDate">First Date of Employment</label>
          <input type="text" class="form-control" id="w4EmploymentDate" name="w4EmploymentDate" >
		    
		  <label for="w4EIN">Employer Identification Number</label>
          <input type="text" class="form-control" id="w4EIN" name="w4EIN" <?php echo "value=".$EIN ?>>
          
        </div>
		 <button style = "margin: 0 auto; display: block;" type="submit" class="btn btn-dark">Submit</button>
		 
</form>


  
    </body>
</html>