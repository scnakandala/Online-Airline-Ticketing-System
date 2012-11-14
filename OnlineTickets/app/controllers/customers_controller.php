<?php
class CustomersController extends AppController {

	var $name = 'Customers';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Customer->recursive = 0;
		$this->set('customers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Customer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('customer', $this->Customer->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Customer->create();
			if ($this->Customer->save($this->data)) {
				$this->Session->setFlash(__('The Customer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Customer could not be saved. Please, try again.', true));
			}
		}
		$reservations = $this->Customer->Reservation->find('list');
		$this->set(compact('reservations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Customer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Customer->save($this->data)) {
				$this->Session->setFlash(__('The Customer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Customer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Customer->read(null, $id);
		}
		$reservations = $this->Customer->Reservation->find('list');
		$this->set(compact('reservations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Customer', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Customer->del($id)) {
			$this->Session->setFlash(__('Customer deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Customer could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>