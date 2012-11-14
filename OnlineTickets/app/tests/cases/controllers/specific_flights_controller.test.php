<?php 
/* SVN FILE: $Id$ */
/* SpecificFlightsController Test cases generated on: 2012-11-10 14:59:26 : 1352559566*/
App::import('Controller', 'SpecificFlights');

class TestSpecificFlights extends SpecificFlightsController {
	var $autoRender = false;
}

class SpecificFlightsControllerTest extends CakeTestCase {
	var $SpecificFlights = null;

	function startTest() {
		$this->SpecificFlights = new TestSpecificFlights();
		$this->SpecificFlights->constructClasses();
	}

	function testSpecificFlightsControllerInstance() {
		$this->assertTrue(is_a($this->SpecificFlights, 'SpecificFlightsController'));
	}

	function endTest() {
		unset($this->SpecificFlights);
	}
}
?>