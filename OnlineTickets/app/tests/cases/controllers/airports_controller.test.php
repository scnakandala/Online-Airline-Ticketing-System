<?php 
/* SVN FILE: $Id$ */
/* AirportsController Test cases generated on: 2012-11-09 15:30:09 : 1352475009*/
App::import('Controller', 'Airports');

class TestAirports extends AirportsController {
	var $autoRender = false;
}

class AirportsControllerTest extends CakeTestCase {
	var $Airports = null;

	function startTest() {
		$this->Airports = new TestAirports();
		$this->Airports->constructClasses();
	}

	function testAirportsControllerInstance() {
		$this->assertTrue(is_a($this->Airports, 'AirportsController'));
	}

	function endTest() {
		unset($this->Airports);
	}
}
?>