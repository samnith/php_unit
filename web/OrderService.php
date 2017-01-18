<?php
class OrderService {
	private $orderRepository;
	private $emailSender;

	function setOrderRepository($orderRepository) {
		$this->orderRepository = $orderRepository;
	}

	function setEmailSender($emailSender) {
		$this->emailSender = $emailSender;
	}

	function save($input) {
		$newOrder = new Order($input['product_id'], $input['user_id'], $input['order_date']);
		$this->orderRepository->persist($newOrder);
		$this->emailSender->send(new Email());
	}
	
}
?>