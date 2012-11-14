<?php
class CreditcardsController extends AppController {

	var $name = 'Creditcards';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Creditcard->recursive = 0;
		$this->set('creditcards', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Creditcard', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('creditcard', $this->Creditcard->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Creditcard->create();
			if ($this->Creditcard->save($this->data)) {
				$this->Session->setFlash(__('The Creditcard has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Creditcard could not be saved. Please, try again.', true));
			}
		}
		$reservations = $this->Creditcard->Reservation->find('list');
		$this->set(compact('reservations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Creditcard', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Creditcard->save($this->data)) {
				$this->Session->setFlash(__('The Creditcard has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Creditcard could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Creditcard->read(null, $id);
		}
		$reservations = $this->Creditcard->Reservation->find('list');
		$this->set(compact('reservations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Creditcard', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Creditcard->del($id)) {
			$this->Session->setFlash(__('Creditcard deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Creditcard could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>