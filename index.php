<?php
require_once('controller/Controller.php');

//SETUP API
header("Content-type: application/json; charset=utf-8");

$controller = new Controller();

//if get alle 3 Parameters - then get discount
if(isset($_GET['newCustomer']) && isset($_GET['loyaltyCard']) && isset($_GET['coupon'])){
	try {
		$result = $controller->getDiscountCus($_GET['newCustomer'], $_GET['loyaltyCard'], $_GET['coupon']);
		echo json_encode(array("interest" => $result));
		die();
	}catch(Exception $e) {
		error($e->getMessage());
		die();
	}
}
else if(isset($_GET['balance'])) {
	try {
		$result = $controller->getInterestAcc($_GET['balance']);
		echo json_encode(array("balance" => $result));
		die();
	}catch (Exception $e) {
		error($e->getMessage());
		die();
	}
}
else{
	error("Not a GET request, or not a GET request in the API.");
	die();
}


//Functions
function error($msg){
	http_response_code(400);
	echo json_encode(array("Error" => $msg));
}

?>