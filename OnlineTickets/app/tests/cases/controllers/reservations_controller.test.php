<?php 
/* SVN FILE: $Id$ */
/* ReservationsController Test cases generated on: 2012-11-09 15:41:14 : 1352475674*/
App::import('Controller', 'Reservations');

class TestReservations extends ReservationsController {
	var $autoRender = false;
}

class ReservationsControllerTest extends CakeTestCase {
	var $Reservations = null;

	function startTest() {
		$this->Reservations = new TestReservations();
		$this->Reservations->constructClasses();
	}

	function testReservationsControllerInstance() {
		$this->assertTrue(is_a($this->Reservations, 'ReservationsController'));
	}

	function endTest() {
		unset($this->Reservations);
	}
}
?>