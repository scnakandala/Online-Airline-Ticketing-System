<?php
/* SVN FILE: $Id$ */
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 */
class TicketingsController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Ticketings';
/**
 * Default helper
 *
 * @var array
 * @access public
 */
	var $helpers = array('Html');
/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
	var $uses = array('Airport','Flight');
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @access public
 */
 	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'plane';
		$this->Auth->allow('index','search_result'); // Allow index to everybody
	}
 
	function index() {
		if($this->data==null){
			$this->set('airports',$this->Airport->find('list',array('fields' => array('Airport.id', 'Airport.name'))));
			$this->set('airlines',$this->Flight->find('list',array('fields' => array('Flight.airline'))));
		}else{
			$this->redirect(array('action'=>'search_result',"?" => array(
              "param1" => "val1",
              "param2" => "val2"
          )));
		}
	}
	
	function search_result(){
		print_r($this->params['url']['param1']);
	}
}

?>