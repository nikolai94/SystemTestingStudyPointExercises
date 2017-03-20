<?php
Class Customer{
	private $newCustomer;
	private $loyaltyCard; 
	private $coupon;

	function __construct($newCustomer, $loyaltyCard, $coupon){
       $this->newCustomer = $newCustomer;
       $this->loyaltyCard = $loyaltyCard;
       $this->coupon = $coupon;
   }

   public function getDiscount(){
   		$discount = 0;

   		if($this->newCustomer == true){
   			$discount = 15;

   			if($this->coupon == true)
   				$discount = 20;
   			
   			
   			if($this->loyaltyCard == true){
   				$discount = 0;		
   			}
   		}
   		else{
   			if($this->coupon == true)
   				$discount = 20;
   			if($this->loyaltyCard == true)
   				$discount += 10;	
   		}

   		return $discount;
   }

}

?>