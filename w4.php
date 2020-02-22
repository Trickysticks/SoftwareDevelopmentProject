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
    <h1 style="text-align:center"> W4 Form </h1>
    <form>
	<h4 style="text-align:left"> Step 1: Enter Personal Information </h4>
      <div class="form-row">
	   <div class="form-group col-md-3">
		 <label for="w4EmployeeFirstName">a. Employee's first name</label>
          <input type="text" class="form-control" id="w4EmployeeFirstName" name="w4EmployeeFirstName" >
        </div>
		
		<div class="form-group col-md-3">
		 <label for="w4EmployeeInitial">a. Employee's initial</label>
          <input type="text" class="form-control" id="w4EmployeeInitial" name="w4EmployeeInitial" >
          </div>
		  
		   <div class="form-group col-md-3">
		 <label for="w4EmployeeLastName">a. Employee's last name</label>
          <input type="text" class="form-control" id="w4EmployeeLastName" name="w4EmployeeLastName" >
          </div>
		  
		    <div class="form-group col-md-3">
		  <label for="w4EmployeeAddress">a. Employee's address</label>
          <input type="text" class="form-control" id="w4EmployeeAddress" name="w4EmployeeAddress" >
          </div>
		  
		   <div class="form-group col-md-3">
		   <label for="w4EmployeeZipCode">a. Employee's zip code</label>
          <input type="text" class="form-control" id="w4EmployeeZipCode" name="w4EmployeeZipCode" >
          </div>
		  
          <div class="form-group col-md-3">
          <label for="w4SS">b. Employee social security number</label>
          <input type="text" class="form-control" id="w4SS" name="w4SS">
        </div>
      </div>
     
     
        <div class="form-group col-md-4">
         
          <label for="w4Options">c.</label>&nbsp;
                <div class="btn-group btn-group-toggle" data-toggle="buttons" id="w4Options">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="options" id="w4singleOrSeparate" name="w4singleOrSeparate" autocomplete="off" checked> Single or Married filing separately
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="w4married" name="w4married"  autocomplete="off">Married filed jointly
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="w4headofhouse" name="w4headofhouse"  autocomplete="off"> Head of household
                        </label>
                      </div>
               
        </div>
    
  </form>
  
    <form>
	<h4 style="text-align:left"> Step 2: Multiple jobs or Spouse Works </h4>
        <div class="form-group col-md-4">
		  <p> Complete this step is you (1) hold more than one job at a time or (2) are married filing jointly and your spouse also works.</p>
		  <p> The correct amount of withholding depends on income earned from all of these jobs.</p>
		  <p>Do only one of the following </p>
		  <p>(a) Use the estimator at www.irs.org/W4App for the most accurate wthoring for this step (and Steps 3-4b) OR </p>
		  <p>(b) Use the Multiple Jobs Worksheet on page 3 and enter the result in Step 4(c) below for roughly accurate witholding OR</p>
		  <p>(c) If thre are only two jobs total, you make check this box. Do the same on form W-4 for the other job. This option is accurate for jobs with similar pay; otherwise, more tax than neccessary may be withheld </p>
          <input type="checkbox" id="twoJobs" name="twoJobs" value="twoJobs">
        </div>
  </form>
  
   <form>
	<h4 style="text-align:left"> Step 3: Claim Dependents </h4>
        <div class="form-group col-md-4">
		  <p> If your income will be $200,000 or less ($400,000 or less if married filing jointly):</p>
		  <label for="qualifyingChildren" style="margin-left: 40px">Mulitply the number of qualifiying children under age 17 by $2000</label>
          <input type="text" class="form-control" id="qualifyingChildren" name="qualifyingChildren" style="margin-left: 40px">
		  
		  <label for="otherDependents" style="margin-left: 40px">Mulitply the number of other dependents by $500</label>
          <input type="text" class="form-control" id="otherDependents" name="otherDependents" style="margin-left: 40px">
		  <br></br>
		  <label for="totalDependents">Add the amounts above and enter the total here</label>
          <input type="text" class="form-control" id="totalDependents" name="totalDependents">
        </div>
		 

  </form>
  
    <form>
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
		 

  </form>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>