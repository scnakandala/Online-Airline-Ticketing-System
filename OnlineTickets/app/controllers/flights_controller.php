<?php
class FlightsController extends AppController {

	var $name = 'Flights';
	var $helpers = array('Html', 'Form');
	var $uses = array('Flight','Airport');
	
	function index() {
		$this->Flight->recursive = 0;
		$this->set('flights', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Flight', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('flight', $this->Flight->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Flight->create();
			if ($this->Flight->save($this->data)) {
				$this->Session->setFlash(__('The Flight has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Flight could not be saved. Please, try again.', true));
			}
		}
		$this->set('airports',$this->Airport->find('list'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Flight', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Flight->save($this->data)) {
				$this->Session->setFlash(__('The Flight has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Flight could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Flight->read(null, $id);
			print_r($data);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Flight', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Flight->del($id)) {
			$this->Session->setFlash(__('Flight deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Flight could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>