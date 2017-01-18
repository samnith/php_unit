<?php
class Order {
	private $productId;
	private $userId;
	private $orderTimeStamp;

	function __construct($productId=null, $userId=null, $orderTimeStamp=null) {
		$this->productId = $productId;
		$this->userId = $userId;
		$this->orderTimeStamp = $orderTimeStamp;
	} 	

	function __get($name) {
		return $this->$name;
	}
}
?>