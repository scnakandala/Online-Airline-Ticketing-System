<?php
class NotificationsController extends AppController {

	var $name = 'Notifications';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Notification->recursive = 0;
		$this->set('notifications', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Notification', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('notification', $this->Notification->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Notification->create();
			if ($this->Notification->save($this->data)) {
				$this->Session->setFlash(__('The Notification has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Notification could not be saved. Please, try again.', true));
			}
		}
		$customers = $this->Notification->Customer->find('list');
		$this->set(compact('customers'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Notification', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Notification->save($this->data)) {
				$this->Session->setFlash(__('The Notification has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Notification could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Notification->read(null, $id);
		}
		$customers = $this->Notification->Customer->find('list');
		$this->set(compact('customers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Notification', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Notification->del($id)) {
			$this->Session->setFlash(__('Notification deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Notification could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>