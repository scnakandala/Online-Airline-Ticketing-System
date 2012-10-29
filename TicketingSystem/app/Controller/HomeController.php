<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController {

	/**
	 * beforeFilter method
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('index');
		$this->set('title_for_layout', 'Ticketing System');
        $this->layout = 'home';
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
	}

}
