<?php


class TaxForm{
	public $socialSecurity;
	public $EIN;
	public $employerName;
	public $employerAddress;
	public $employerZIP;
	public $controlNumber;
	public $employeeName;
	public $employeeAddress;
	public $employeeZIP;
	public $marriedStatus;
	
	function set_SocialSecurity($socialSecurity){
		$this->socialSecurity = $socialSecurity;
	}
	
	function get_SocialSecurity(){
		return $socialSecurity;
	}
	
	function set_EIN($EIN){
		$this->EIN = $EIN;
	}
	
	function get_EIN(){
		return $EIN;
	}
	
	function set_employerName($employerName){
		$this->employerName = $employerName;
	}
	
	function get_EmployerName(){
		return $employerName;
	}
	
	function set_employerAddress($employerAddress){
		$this->employerAddress = $employerAddress;
	}
	
	function get_EmployerAddress(){
		return $employerAddress;
	}
	
	function set_employerZIP($employerZIP){
		$this->employerZIP = $employerZIP;
	}
	
	function get_EmployerZIP(){
		return $employerZIP;
	}
	
	function set_controlNumber($controlNumber){
		$this->controlNumber = $controlNumber;
	}
	
	function get_ControlNumber(){
		return $controlNumber;
	}
	
	function set_employeeName($employeeName){
		$this->employeeName = $employeeName;
	}
	
	function get_EmployeeName(){
		return $employeeName;
	}
	
	function set_employeeAddress($employeeAddress){
		$this->employeeAddress = $employeeAddress;
	}
	
	function get_EmployeeAddress(){
		return $employeeAddress;
	}
	
	function set_employeeZIP($employeeZIP){
		$this->employeeZIP = $employeeZIP;
	}
	
	function get_EmployeeZIP(){
		return $employeeZIP;
	}
	
	function set_marriedStatus($marriedStatus){
		$this->marriedStatus = $marriedStatus;
	}
	
	function get_marriedStatus(){
		return $marriedStatus;
	}
	
}
	

?>