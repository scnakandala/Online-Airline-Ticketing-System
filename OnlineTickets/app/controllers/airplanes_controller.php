<?php
class AirplanesController extends AppController {

	var $name = 'Airplanes';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Airplane->recursive = 0;
		$this->set('airplanes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Airplane', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('airplane', $this->Airplane->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Airplane->create();
			if ($this->Airplane->save($this->data)) {
				$this->Session->setFlash(__('The Airplane has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Airplane could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Airplane', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Airplane->save($this->data)) {
				$this->Session->setFlash(__('The Airplane has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Airplane could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Airplane->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Airplane', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Airplane->del($id)) {
			$this->Session->setFlash(__('Airplane deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Airplane could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>