<?php 
require_once('model/Customer.php');
require_once('model/Account.php');

Class Controller{
	private $customer;
	private $account;

	public function getDiscountCus($newCustomer, $loyaltyCard, $coupon){
		if(empty($newCustomer) || empty($loyaltyCard) || empty($coupon))
			throw new Exception("Forgotten a parameter?");

		try {
			$newCustomer = $this->getBool($newCustomer);
			$loyaltyCard = $this->getBool($loyaltyCard);
			$coupon = $this->getBool($coupon);
		}catch(Exception $e) {
			throw new Exception($e->getMessage());
		}

		$this->customer = new Customer($newCustomer, $loyaltyCard, $coupon);

		return $this->customer->getDiscount();
	}

	public function getInterestAcc($balance){
		if(empty($balance))
			throw new Exception("Forgotten parameter?");
		if(!is_numeric($balance))
			throw new Exception("Balance should be numeric.");

		$this->account = new Account($balance);

		return $this->account->getInterest();	
	}


	/*
	Returns: 
	0 if value is a false boolean value
	1 if values is a true boolean value

	Throw Exception:
	if not a boolean
	*/
	private function getBool($string){
		$boolArr["true"] = 1;
		$boolArr["1"] = 1;
		$boolArr["yes"] = 1;
		$boolArr["false"] = 0;
		$boolArr["0"] = 0;
		$boolArr["no"] = 0;
		
	    $string = trim(strtolower($string));

		if (array_key_exists($string, $boolArr)) {
		    return $boolArr[$string];
		}
		
		throw new Exception("Parameters(newCustomer, loyaltyCard and coupon) needs to be boolean type."); 
	}
}

?>