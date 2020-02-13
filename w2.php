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
    <?php include("navbar.php") ?>
    <h1 style="text-align:center"> W2 Form </h1>
    </br></br></br>
    <form>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="w2EIN">Employer Identifier Number (EIN)</label>
          <input type="text" class="form-control" id="w2EIN" name="w2EIN">
        </div>
        <div class="form-group col-md-4">
          <label for="w2Wages">Wages,tips, other compensation</label>
          <input type="text" class="form-control" id="w2Wages" name="w2Wages" >
        </div>
        <div class="form-group col-md-4">
            <label for="w2FederalIncomeTaxWithheld">Federal Income Tax Withheld</label>
            <input type="text" class="form-control" id="w2FederalIncomeTaxWithheld" name="w2FederalIncomeTaxWithheld" >
          </div>
      </div>
      <hr>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="w2EmployerName">Employer's Name</label>
          <input type="text" class="form-control" id="w2EmployerName" name="w2EmployerName" >

          <label for="w2EmployerAddress">Employer Address</label>
          <input type="text" class="form-control" id="w2EmployerAddress" name="w2EmployerAddress" >
        
          <label for="w2EmployerZipCode">Employer's Zip Code'</label>
          <input type="text" class="form-control" id="w2EmployerZipCode" name="w2EmployerZipCode" >  
        </div>
        <div class="form-group col-md-4">
          <label for="w2SocialSecurityWages">Social security wages</label>
          <input type="text" class="form-control" id="w2SocialSecurityWages" name="w2SocialSecurityWages" >
          <label for="w2MedicareWages">Medicare wages and tips</label>
          <input type="text" class="form-control" id="w2MedicareWages" name="w2MedicareWages">
          <label for="w2SocialSecurityTips">Social security tips</label>
          <input type="text" class="form-control" id="w2SocialSecurityTips" name="w2SocialSecurityTips" >
        </div>
        <div class="form-group col-md-4">
            <label for="w2SSTaxWithheld">Social security tax withheld</label>
            <input type="text" class="form-control" id="w2SSTaxWithheld" name="w2SSTaxWithheld" >

            <label for="w2MedicareTaxWithheld">Medicare tax withheld</label>
            <input type="text" class="form-control" id="w2MedicareTaxWithheld" name="w2MedicareTaxWithheld" >
        
            <label for="w2AllocatedTips">Allocated tips</label>
            <input type="text" class="form-control" id="w2AllocatedTips" name="w2AllocatedTips" >  
        </div>
      </div>
    </br><hr>
    <div class="form-row">
            <div class="form-group col-md-4">
                <label for="w2ControlNumber">Control number</label>
                <input type="text" class="form-control" id="w2ControlNumber" name="w2ControlNumber" >   
            </div>
            <div class="form-group col-md-4">
                <label for="w2Verificationcode">Verification code</label>
                <input type="text" class="form-control" id="w2Verificationcode" name="w2Verificationcode" >   
            </div>
            <div class="form-group col-md-4">
                <label for="w2DependentCareBenefits">Dependent care benefits</label>
                <input type="text" class="form-control" id="w2DependentCareBenefits" name="w2DependentCareBenefits" >   
            </div>
        </div>
    </br> <hr>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="w2EmployeeFirstName">Employee's first name</label>
          <input type="text" class="form-control" id="w2EmployeeFirstName" name="w2EmployeeFirstName" >
          <label for="w2EmployeeInitial">Employee's initial</label>
          <input type="text" class="form-control" id="w2EmployeeInitial" name="w2EmployeeInitial" >
          <label for="w2EmployeeLastName">Employee's last name</label>
          <input type="text" class="form-control" id="w2EmployeeLastName" name="w2EmployeeLastName" >
          <label for="w2EmployeeAddress">Employee's address</label>
          <input type="text" class="form-control" id="w2EmployeeAddress" name="w2EmployeeAddress" >
          <label for="w2EmployeeZipCode">Employee's zip code</label>
          <input type="text" class="form-control" id="w2EmployeeZipCode" name="w2EmployeeZipCode" >
      
        </div>
        <div class="form-group col-md-4">
          <label for="w2NonqualifiedPlans">Nonqualified plans</label>
          <input type="text" class="form-control" id="w2NonqualifiedPlans" name="w2NonqualifiedPlans" >
        </br></br>
          <div class="form-row">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
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
          <label for="w2Other">Other</label>
          <input type="text" class="form-control" id="w2Other" name="w2Other" >
      
        </div>
        <div class="form-group col-md-4">
            <label for="w2-12a">12a</label>
            <input type="text" class="form-control" id="w2-12a" name="w2-12a" >

            <label for="w2-12b">12b</label>
            <input type="text" class="form-control" id="w2-12b" name="w2-12b" >
        
            <label for="w2-12c">12c</label>
            <input type="text" class="form-control" id="w2-12c" name="w2-12c" >
        
            <label for="w2-12d">12d</label>
            <input type="text" class="form-control" id="w2-12d" name="w2-12d" >
        
          </div>
        </div>
    </br><hr>
    <div class="form row">
        <div class="form-group col-md">
            <label for="w2State">State</label>
            <input type="text" class="form-control" id="w2State" name="w2State" >
        </div>
        <div class="form-group col-md">
            <label for="w2EmployeeStateID">Employee's state ID number</label>
            <input type="text" class="form-control" id="w2EmployeeStateID" name="w2EmployeeStateID" >

        </div>
        <div class="form-group col-md">
            <label for="w2StateWages">State wages, tips, etc</label>
            <input type="text" class="form-control" id="w2StateWages" name="w2StateWages" >

        </div>
        <div class="form-group col-md">
            <label for="w2StateIncomeTax">State income tax</label>
            <input type="text" class="form-control" id="w2StateIncomeTax" name="w2StateIncomeTax" >

        </div>
        <div class="form-group col-md">
            <label for="w2LocalWages">Local wages, tips, etc</label>
            <input type="text" class="form-control" id="w2LocalWages" name="w2LocalWages" >

        </div>
        <div class="form-group col-md">
            <label for="w2LocalIncomeTip">Local income tip</label>
            <input type="text" class="form-control" id="w2LocalIncomeTip" name="w2LocalIncomeTip" >

        </div>
        <div class="form-group col-md">
            <label for="w2Locality">Locality</label>
            <input type="text" class="form-control" id="w2Locality" name="w2Locality" >    
        </div>
    </div>
  </form>
  <br> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>