<?php 
Class Account{
	private $balance;

	function __construct($balance){
		$this->balance = $balance;
	}

	public function getInterest(){
		if($this->balance >= 0 && $this->balance <= 100)
			return ($this->balance * 1.03);
		if($this->balance > 100 && $this->balance < 1000)
			return ($this->balance * 1.05);
		if($this->balance >= 1000)
			return ($this->balance * 1.07);
	}
}

?>