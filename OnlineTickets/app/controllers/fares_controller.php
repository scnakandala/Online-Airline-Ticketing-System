<?php
class FaresController extends AppController {

	var $name = 'Fares';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Fare->recursive = 0;
		$this->set('fares', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Fare', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fare', $this->Fare->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Fare->create();
			if ($this->Fare->save($this->data)) {
				$this->Session->setFlash(__('The Fare has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Fare could not be saved. Please, try again.', true));
			}
		}
		$flights = $this->Fare->Flight->find('list');
		$this->set(compact('flights'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Fare', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Fare->save($this->data)) {
				$this->Session->setFlash(__('The Fare has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Fare could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Fare->read(null, $id);
		}
		$flights = $this->Fare->Flight->find('list');
		$this->set(compact('flights'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Fare', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Fare->del($id)) {
			$this->Session->setFlash(__('Fare deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Fare could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>