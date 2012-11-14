<?php 
/* SVN FILE: $Id$ */
/* SpecificflightsController Test cases generated on: 2012-11-09 15:41:00 : 1352475660*/
App::import('Controller', 'Specificflights');

class TestSpecificflights extends SpecificflightsController {
	var $autoRender = false;
}

class SpecificflightsControllerTest extends CakeTestCase {
	var $Specificflights = null;

	function startTest() {
		$this->Specificflights = new TestSpecificflights();
		$this->Specificflights->constructClasses();
	}

	function testSpecificflightsControllerInstance() {
		$this->assertTrue(is_a($this->Specificflights, 'SpecificflightsController'));
	}

	function endTest() {
		unset($this->Specificflights);
	}
}
?>