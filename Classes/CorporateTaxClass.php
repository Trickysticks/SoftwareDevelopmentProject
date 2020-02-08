<?php

class CorporateTax{
	
	public $numEmployees;
	public $compensation;
	public $incomeTaxWithheld;
	public $SSWages;
	public $SSTips;
	public $medicareWages;
	public $Wages;
	public $sickPay;
	public $lifeInsurance;
	public $totalDeposits;
	public $balanceDue;
	public $overpayment;
	
	
	function set_numEmployees($numEmployees){
		$this->numEmployees = $numEmployees;
	}
	
	function get_numEmployees(){
		return $numEmployees;
	}
	
	function set_compensation($compensation){
		$this->compensation = $compensation;
	}
	
	function get_compensation(){
		return $compensation;
	}
	
	function set_incomeTaxWithheld($incomeTaxWithheld){
		$this->incomeTaxWithheld = $incomeTaxWithheld;
	}
	
	function get_incomeTaxWithheld(){
		return $incomeTaxWithheld;
	}
	
	function set_SSWages($SSWages){
		$this->SSWages = $SSWages;
	}
	
	function get_SSWages(){
		return $SSWages;
	}
	
	function set_SSTips($SSTips){
		$this->SSTips = $SSTips;
	}
	
	function get_SSTips(){
		return $SSTips;
	}
	
	function set_medicareWages($medicareWages){
		$this->medicareWages = $medicareWages;
	}
	
	function get_medicareWages(){
		return $medicareWages;
	}
	
	function set_Wages($wages){
		$this->wages = $wages;
	}
	
	function get_Wages(){
		return $wages;
	}
	
	function set_sickPay($sickPay){
		$this->sickPay = $sickPay;
	}
	
	function get_sickPay(){
		return $sickPay;
	}
	
	function set_lifeInsurance($lifeInsurance){
		$this->lifeInsurance = $lifeInsurance;
	}
	
	function get_lifeInsurance(){
		return $lifeInsurance;
	}
	
	function set_totalDeposits($totalDeposits){
		$this->totalDeposits = $totalDeposits;
	}
	
	function get_totalDeposits(){
		return $totalDeposits;
	}
	
	function set_balanceDue($balanceDue){
		$this->balanceDue = $balanceDue;
	}
	
	function get_balanceDue(){
		return $balanceDue;
	}
	
	function set_overPayment($overpayment){
		$this->overpayment = $overpayment;
	}
	
	function get_overPayment(){
		return $overpayment;
	}
	
}

?>

