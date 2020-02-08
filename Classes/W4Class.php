<?php

class W4 extends TaxForm{
	
	public $lastNameDiffers;
	public $totalAllowances;
	public $paymentWithheld;
	public $claimExemption;
	public $firstDayOfEmployment;
	
	function set_lastNameDiffers($lastNameDiffers){
		$this->lastNameDiffers=$lastNameDiffers;
	}
	
	function get_lastNameDiffers(){
		return $lastNameDiffers;
	}
	
	function set_totalAllowances($totalAllowances){
		$this->totalAllowances=$totalAllowances;
	}
	
	function get_totalAllowances(){
		return $totalAllowances;
	}
	
	function set_paymentWithheld($paymentWithheld){
		$this->paymentWithheld=$paymentWithheld;
	}
	
	function get_paymentWithheld(){
		return $paymentWithheld;
	}
	
	function set_claimExemption($claimExemption){
		$this->claimExemption=$claimExemption;
	}
	
	function get_claimExemption(){
		return $claimExemption;
	}
	
	function set_firstDayOfEmployment($firstDayOfEmployment){
		$this->firstDayOfEmployment=$firstDayOfEmployment;
	}
	
	function get_firstDayOfEmployment(){
		return $firstDayOfEmployment;
	}
	
	
	
	
	
	
}


?>