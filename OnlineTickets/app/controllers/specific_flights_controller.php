<?php
class SpecificFlightsController extends AppController {

	var $name = 'SpecificFlights';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->SpecificFlight->recursive = 0;
		$this->set('specificFlights', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid SpecificFlight', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('specificFlight', $this->SpecificFlight->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SpecificFlight->create();
			if ($this->SpecificFlight->save($this->data)) {
				$this->Session->setFlash(__('The SpecificFlight has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The SpecificFlight could not be saved. Please, try again.', true));
			}
		}
		$flights = $this->SpecificFlight->Flight->find('list');
		$airplanes = $this->SpecificFlight->Airplane->find('list');
		$this->set(compact('flights', 'airplanes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid SpecificFlight', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SpecificFlight->save($this->data)) {
				$this->Session->setFlash(__('The SpecificFlight has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The SpecificFlight could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SpecificFlight->read(null, $id);
		}
		$flights = $this->SpecificFlight->Flight->find('list');
		$airplanes = $this->SpecificFlight->Airplane->find('list');
		$this->set(compact('flights','airplanes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for SpecificFlight', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->SpecificFlight->del($id)) {
			$this->Session->setFlash(__('SpecificFlight deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The SpecificFlight could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>