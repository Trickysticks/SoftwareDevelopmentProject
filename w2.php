<?php
// Author: Anthony Calise

include("navbar.php");
include("config.php");
$currentId = $_SESSION["id"];
$deptId = $middleInitial = $streetName = $aptNum = $city = $state = $zip = $streetNum =$firstName= $lastName = $SSN = $salary=  "";
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

$emplrName = $emplrStAdd = $emplrCity = $emplrState = $emplrZip = $emplrSuiteNum = $emplrStNum = "";

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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Highland Capital Tax System</title>
  </head>
  <body>
    <h1 style="text-align:center"> W2 Form </h1>
    </br></br></br>
    <form method="POST" action="w2controller.php">
      <div class="form-row">
      <div class="form-group col-md-3">
          <label for="w2SS">a. Employee social security number <span style="color: #e32;">*</span></label>
          <input type="text" class="form-control" id="w2SS" name="w2SS" <?php echo "value=".$SSN ?> required readonly>
        </div>
        <div class="form-group col-md-3">
          <label for="w2EIN">b. Employer Identifier Number (EIN)<span style="color: #e32;">*</span></label>
          <input type="text" class="form-control" id="w2EIN" name="w2EIN" readonly required <?php echo "value=".$EIN ?>>
        </div>
        <div class="form-group col-md-3">
          <label for="w2Wages">1. Wages,tips, other compensation<span style="color: #e32;">*</span></label>
          <input type="text" class="form-control" id="w2Wages" name="w2Wages"onkeypress="return isNumberKey(event,this)"   required <?php echo "value=".$salary ?> >
        </div>
        <div class="form-group col-md-3">
            <label for="w2FederalIncomeTaxWithheld">2. Federal Income Tax Withheld<span style="color: #e32;">*</span></label>
            <input type="text" class="form-control" id="w2FederalIncomeTaxWithheld" onkeypress="return isNumberKey(event,this)"  name="w2FederalIncomeTaxWithheld" required >
          </div>
      </div>
      <hr>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="w2EmployerName">c. Employer's Name</label>
          <input type="text" class="form-control" id="w2EmployerName" name="w2EmployerName" disabled <?php echo 'value="' . $emplrName . '" '?> >

          <label for="w2EmployerAddress">c. Employer Address</label>
          <input type="text" class="form-control" id="w2EmployerAddress" name="w2EmployerAddress" <?php echo 'value="' . $employerAddress . '" '?> disabled>
        
          <label for="w2EmployerZipCode">c. Employer's Zip Code</label>
          <input type="text" class="form-control" id="w2EmployerZipCode" name="w2EmployerZipCode" <?php echo 'value="' . $emplrZip . '" '?> disabled>  
        </div>
        <div class="form-group col-md-4">
          <label for="w2SocialSecurityWages">3. Social security wages<span style="color: #e32;">*</span></label>
          <input type="text" class="form-control" id="w2SocialSecurityWages" name="w2SocialSecurityWages" required>
          <label for="w2MedicareWages">5. Medicare wages and tips<span style="color: #e32;">*</span></label>
          <input type="text" class="form-control" id="w2MedicareWages" name="w2MedicareWages" required>
          <label for="w2SocialSecurityTips">7. Social security tips<span style="color: #e32;">*</span></label>
          <input type="text" class="form-control" id="w2SocialSecurityTips" name="w2SocialSecurityTips" required>
        </div>
        <div class="form-group col-md-4">
            <label for="w2SSTaxWithheld">4. Social security tax withheld<span style="color: #e32;">*</span></label>
            <input type="text" class="form-control" id="w2SSTaxWithheld" name="w2SSTaxWithheld" disabled value="Calculated by system">

            <label for="w2MedicareTaxWithheld">6. Medicare tax withheld<span style="color: #e32;">*</span></label>
            <input type="text" class="form-control" id="w2MedicareTaxWithheld" name="w2MedicareTaxWithheld" required disabled value="Calculated by system">
        
            <label for="w2AllocatedTips">8. Allocated tips<span style="color: #e32;">*</span></label>
            <input type="text" class="form-control" id="w2AllocatedTips" name="w2AllocatedTips" required>  
        </div>
      </div>
    </br><hr>
    <div class="form-row">
            <div class="form-group col-md-4">
                <label for="w2ControlNumber">d. Control number</label>
                <input type="text" class="form-control" id="w2ControlNumber" name="w2ControlNumber" disabled value="Handled By Payroll">   
            </div>
            <div class="form-group col-md-4">
                <label for="w2Verificationcode">9. Verification code</label>
                <input type="text" class="form-control" id="w2Verificationcode" name="w2Verificationcode" disabled value="Handled By Payroll">   
            </div>
            <div class="form-group col-md-4">
                <label for="w2DependentCareBenefits">10. Dependent care benefits<span style="color: #e32;">*</span></label>
                <input type="text" class="form-control" id="w2DependentCareBenefits" name="w2DependentCareBenefits" required >   
            </div>
        </div>
    </br> <hr>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="w2EmployeeFirstName">e. Employee's first name</label>
          <input type="text" class="form-control" id="w2EmployeeFirstName" name="w2EmployeeFirstName" <?php echo "value=".trim($firstName) ?> disabled >
          <label for="w2EmployeeInitial">e. Employee's initial</label>
          <input type="text" class="form-control" id="w2EmployeeInitial" name="w2EmployeeInitial" <?php echo "value=".$middleInitial ?> readonly>
          <label for="w2EmployeeLastName">e. Employee's last name</label>
          <input type="text" class="form-control" id="w2EmployeeLastName" name="w2EmployeeLastName" <?php echo 'value="' . trim($lastName) . '" '?> disabled>
          <label for="w2EmployeeAddress">e. Employee's address</label>
          <input type="text" class="form-control" id="w2EmployeeAddress" name="w2EmployeeAddress" required readonly <?php echo 'value="' . $address . '" '?> >
          <label for="w2EmployeeZipCode">e. Employee's zip code</label>
          <input type="text" class="form-control" id="w2EmployeeZipCode" name="w2EmployeeZipCode"required readonly <?php echo "value=".$zip ?>>
      
        </div>
        <div class="form-group col-md-4">
          <label for="w2NonqualifiedPlans">11. Nonqualified plans</label>
          <input type="text" class="form-control" id="w2NonqualifiedPlans" name="w2NonqualifiedPlans" disabled value="Handled By Payroll">
        </br></br>
          <div class="form-row">
          <label for="w2Options">13.</label>&nbsp;
                <div class="btn-group btn-group-toggle" data-toggle="buttons" id="w2Options">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="options" id="w2StatutoryEmployee" name="w2StatutoryEmployee" autocomplete="off" checked> Statutory Employee
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="w2RetirementPlan" name="w2RetirementPlan"  autocomplete="off"> Retirement Plan
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="w2ThirdPartySickPay" name="w2ThirdPartySickPay"  autocomplete="off"> Third-party sick pay
                        </label>
                      </div>
                </div>
            </br></br>
          <label for="w2Other">14. Other</label>
          <input type="text" class="form-control" id="w2Other" name="w2Other" disabled value="Handled By Payroll" >
      
        </div>
        <div class="form-group col-md-4">
            <label for="w2-12a">12a</label>
            <input type="text" class="form-control" id="w2-12a" name="w2-12a" disabled value="Handled By Payroll" >

            <label for="w2-12b">12b</label>
            <input type="text" class="form-control" id="w2-12b" name="w2-12b"disabled value="Handled By Payroll"  >
        
            <label for="w2-12c">12c</label>
            <input type="text" class="form-control" id="w2-12c" name="w2-12c"disabled value="Handled By Payroll"  >
        
            <label for="w2-12d">12d</label>
            <input type="text" class="form-control" id="w2-12d" name="w2-12d" disabled value="Handled By Payroll" >
        
          </div>
        </div>
    </br><hr>
    <div class="form row">
        <div class="form-group col-md">
            <label for="w2State">15. State</label>
            <input type="text" class="form-control" id="w2State" name="w2State" disabled <?php echo "value=".$state ?> >
        </div>
        <div class="form-group col-md">
            <label for="w2EmployeeStateID">15. Employee's state ID number</label>
            <input type="text" class="form-control" id="w2EmployeeStateID" name="w2EmployeeStateID" disabled value="Handled By Payroll"  >

        </div>
        <div class="form-group col-md">
            <label for="w2StateWages">16. State wages, tips, etc</label>
            <input type="text" class="form-control" id="w2StateWages" name="w2StateWages" disabled value="Handled By Payroll" >

        </div>
        <div class="form-group col-md">
            <label for="w2StateIncomeTax">17. State income tax</label>
            <input type="text" class="form-control" id="w2StateIncomeTax" name="w2StateIncomeTax" disabled value="Handled By Payroll" >

        </div>
        <div class="form-group col-md">
            <label for="w2LocalWages">18. Local wages, tips, etc</label>
            <input type="text" class="form-control" id="w2LocalWages" name="w2LocalWages" disabled value="Handled By Payroll" >

        </div>
        <div class="form-group col-md">
            <label for="w2LocalIncomeTip">19. Local income tip</label>
            <input type="text" class="form-control" id="w2LocalIncomeTip" name="w2LocalIncomeTip" disabled value="Handled By Payroll" >

        </div>
        <div class="form-group col-md">
            <label for="w2Locality">20. Locality</label>
            <input type="text" class="form-control" id="w2Locality" name="w2Locality" disabled value="Handled By Payroll" >    
        </div>
    </div>
    <button style = "margin: 0 auto; display: block;" type="submit" class="btn btn-dark">Submit</button>
  </form>
  <br> 
  
    <script src="js/scripts.js">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>