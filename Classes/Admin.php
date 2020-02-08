<?php  

class Admin {
	public $name;
	public $employeeID;
	public $SSN;
	public $address;
	public $startDate;
	public $department;
	public $salary;
	
	function set_name($name){
		$this->name=$name;
	}
	
	function get_name(){
		return $name;
	}
	
	function set_employeeID($employeeID){
		$this->employeeID=$employeeID;
	}
	
	function get_employeeID(){
		return $employeeID;
	}
	
	function set_SSN($SSN){
		$this->SSN=$SSN;
	}
	
	function get_SSN(){
		return $SSN;
	}
	
	function set_address($address){
		$this->address=$address;
	}
	
	function get_address(){
		return $address;
	}
	
	function set_startDate($startDate){
		$this->startDate=$startDate;
	}
	
	function get_startDate(){
		return $startDate;
	}
	
	function set_department($department){
		$this->department=$department;
	}
	
	function get_department(){
		return $department;
	}
	
	function set_salary($salary){
		$this->salary=$salary;
	}
	
	function get_salary(){
		return $salary;
	}
	
	function createEmployee(){
		
	}
	
	function createW2(){
		
	}
	
	
	
}


?>