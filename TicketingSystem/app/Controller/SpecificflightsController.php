<?php
App::uses('AppController', 'Controller');
/**
 * Specificflights Controller
 *
 * @property Specificflight $Specificflight
 */
class SpecificflightsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Specificflight->recursive = 0;
		$this->set('specificflights', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Specificflight->id = $id;
		if (!$this->Specificflight->exists()) {
			throw new NotFoundException(__('Invalid specificflight'));
		}
		$this->set('specificflight', $this->Specificflight->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Specificflight->create();
			if ($this->Specificflight->save($this->request->data)) {
				$this->Session->setFlash(__('The specificflight has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The specificflight could not be saved. Please, try again.'));
			}
		}
		$flights = $this->Specificflight->Flight->find('list');
		$this->set(compact('flights'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Specificflight->id = $id;
		if (!$this->Specificflight->exists()) {
			throw new NotFoundException(__('Invalid specificflight'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Specificflight->save($this->request->data)) {
				$this->Session->setFlash(__('The specificflight has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The specificflight could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Specificflight->read(null, $id);
		}
		$flights = $this->Specificflight->Flight->find('list');
		$this->set(compact('flights'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Specificflight->id = $id;
		if (!$this->Specificflight->exists()) {
			throw new NotFoundException(__('Invalid specificflight'));
		}
		if ($this->Specificflight->delete()) {
			$this->Session->setFlash(__('Specificflight deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Specificflight was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
