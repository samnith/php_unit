<?php
class LoginServiceTest extends PHPUnit_Framework_TestCase {
	public $loginService;

	function setUp(){
		$this->loginService = new LoginService();
	} 

	function testLoginPass() {
		$username = "demo";
		$password = "ok";
		$actualResult = $this->loginService->checkUser($username, $password);
		$this->assertTrue($actualResult);
	}
}
?>