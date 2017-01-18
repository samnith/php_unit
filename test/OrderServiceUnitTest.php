<?php
class OrderServiceUnitTest extends PHPUnit_Framework_TestCase {

	private $mockOrderRepository;
	private $mockEmailSender;
	private $orderService;

	function setUp() {
		$this->mockOrderRepository = $this->getMock('OrderRepository');
		$this->mockEmailSender = $this->getMock('EmailSender');
	}

	function testOrderingProductSuccessWithoutSendEmailToConfirm() {
		$input = array(
			'product_id' => 123,
			'user_id'    => 1,
			'order_date' => time()
			);

		$order = new Order($input['product_id'], $input['user_id'], $input['order_date']);

		$this->orderService = new OrderService();
		$this->orderService->setOrderRepository($this->mockOrderRepository);
		$this->mockOrderRepository->expects($this->once())->method('persist')->with($order);
		$this->orderService->setEmailSender($this->mockEmailSender);
		
		$this->orderService->save($input);
	}

	function testOrderingProductSuccessWithSendEmailToConfirm() {
		$input = array(
			'product_id' => 123,
			'user_id'    => 1,
			'order_date' => time()
			);

		$order = new Order($input['product_id'], $input['user_id'], $input['order_date']);
		$email = new Email('somkiat.p@gmail.com');

		$this->orderService = new OrderService();
		$this->orderService->setOrderRepository($this->mockOrderRepository);
		$this->mockOrderRepository->expects($this->once())->method('persist')->with($order);

		$this->orderService->setEmailSender($this->mockEmailSender);
		$this->mockEmailSender->expects($this->once())->method('send')->with($email);
		
		$this->orderService->save($input);
	}

}
?>