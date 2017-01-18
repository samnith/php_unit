<?php

class FizzBuzz {
	
	public function say( $numberTo ) {
		$sayWord = $numberTo;
		if($this->divideByThree($numberTo)){
			$sayWord = "Fizz";
		}
		if($numberTo == 5){
			$sayWord = "Buzz";
		}
		return $sayWord;
	}

	public function divideByThree ($numberTo){
		return $numberTo % 3 == 0;
	}
}	

?>