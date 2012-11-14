<?php
/* SVN FILE: $Id$ */
/**
 * Display group view.
 *
 * Display group view for Bancer Control Panel Plugin.
 *
 * PHP version 5
 * 
 * (C) Copyright 2009, Valerij Bancer (http://bancer.sourceforge.net)
 *
 * Licensed under GNU Lesser GPL License
 * 
 * This file is part of PoundCake Control Panel.
 * 
 * PoundCake Control Panel is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * PoundCake Control Panel is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public License
 * along with Bancer Control Panel. If not, see <http://www.gnu.org/licenses/>.
 *
 * @filesource
 * @copyright		Copyright 2009, Valerij Bancer (http://bancer.sourceforge.net)
 * @link			http://bancer.sourceforge.net PoundCake Control Panel
 * @package			
 * @subpackage		
 * @since			PoundCake Control Panel v 0.9
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://www.gnu.org/licenses/lgpl.txt GNU Lesser General Public License
 * 
 * 05.02.2010 - fixed __makeLink($item). Removed unneccessary strtolower operation.
 * 06.02.2010 - fixed __makeLink($item). Added functionality to change 'Pages' to 'pages' in case if the link is to Home page 
 * 				because the link to 'Pages' is not valid.
 * 08.02.2010 - fixed __makeLink($item).  Removed the fix done on 06.02.2010 and replaced it 
 * 				with making the first letter of the controller to strtolower.
 * 11.02.2010 - added a verification if image file exist in the app images directory in __makeLink() function
 */

class DatabaseMenusHelper extends Helper{

	public $helpers = array('Html', 'Session');
	private $__type = null;
	private $__id = null;
	private $__name = null;

	/**
	 * 
	 * @param array $array - Array with menus data
	 * @param string $type - Menu type (css class) for styling purposes only
	 * @param int $id - Id of the item for which action menu should be created, f.ex. Model/view/38
	 * @param string $name - Row name to be displayed in the prompt window after delete button was clicked
	 */
	public function makeMenu($array, $type = 'down', $id = null, $name = null){
		$this->__type = $type;
		$this->__id = $id;
		$this->__name = $name;
		if($type == 'down' OR $type == 'right' OR $type == 'left' OR $type == 'up'){
			$class = 'css_menu cm_'.$type;
		}elseif($type == 'actions' OR $type == 'extra'){
			$class = 'bcp_'.$type;
		}else{
			$class = $type;
		}
		$html = $this->__renderMenu($array, $class);
		// Use the helper's output function to hand formatted data back to the view:
		return $this->output($html);
	}

	private function __renderMenu($data = array(), $class){
		$out = '';
		if($data == array()){
			return;
		}
		if(is_array($data)){
			$out .= "<ul class=\"$class\">\n";
			foreach($data as $item){
				if(!empty($item['Children'])){
					$out .= '<li class="parent">';
					$out .= $this->__makeLink($item);
					$out .= $this->__renderMenu($item['Children'], 'menu_children');
					$out .= "</li>\n";
				}else{
					$out .= '<li>'.$this->__makeLink($item).'</li>';
				}
			}
			$out .= "</ul>\n";
		}
		return $out;
	}

	private function __makeLink($item){
		$title = $item['Menu']['name'];
		// Strtolower the first letter of the controller name
		$item['Menu']['controller'] = strtolower(substr($item['Menu']['controller'],0,1)).substr($item['Menu']['controller'],1);
		$url = array(
			'plugin' => strtolower($item['Menu']['plugin']),
			'controller' => $item['Menu']['controller'],
			'action' => $item['Menu']['method'],
			$this->__id
		);
		$htmlAttributes = array();
		$confirmMessage = false;
		$escapeTitle = true;
		//$img = $this->webroot.'bcp/img/'.$item['Menu']['method'];
		if(file_exists(WWW_ROOT.'img/'.$item['Menu']['method'].'.png')){
			$img = $this->webroot.'img/'.$item['Menu']['method'];
		}else{
			/* Form image path:
			 * 1) delete ending slash from $this->webroot,
			 * 2) get image path depending if .htaccess files are used,
			 * 3) what kind of image is it (view, edit, delete etc.)? */
			$img = substr($this->webroot, 0, -1).$this->image_path().$item['Menu']['method'];
		}
		if($this->__type == 'actions'){
			$htmlAttributes = array(
				'style' => 'background:url('.$img.'.png) no-repeat scroll center;',
				'title' => $title,
			);
			$title = '';
		}elseif($this->__type == 'extra'){
			$htmlAttributes = array(
				'style' => 'background:url('.$img.'32.png) no-repeat scroll center;',
				'title' => $title
			);
			$title = '';
		}
		// If method is 'delete' create a confirmation message
		if($item['Menu']['method'] == 'delete'){
			$this->__name = preg_replace("/&#?[a-z0-9]{2,8};/i", "", $this->__name);
			$confirmMessage = sprintf(__('Are you sure you want to delete %s?', true), $this->__name);
		}
		// If method in empty create link to the index page.
		elseif($item['Menu']['method'] == ''){
			$url['action'] = 'index';
			// Create class for current controller in the main menu
			if(strtolower($item['Menu']['controller']) == $this->params['controller']){
				$htmlAttributes = array('class' => 'current');
			}
		}
		return $this->Html->link($title, $url, $htmlAttributes, $confirmMessage, $escapeTitle);
	}

	public function auth_links(){
		$out = '';
		// If is logged in and not anonymous
		if($this->Session->read('Auth.User.username') != 'anonymous'){
			$out .= $this->change_password_link();
			$out .= $this->logout_link();
		}else{
			$out .= $this->login_link();
		}
		return $out;
	}

	public function login_link(){
		return $this->Html->image($this->image_path()."login.png", array(
			"alt" => __("Login", true),
			"title" => __("Login", true),
			'style' => 'position:absolute; top:15px; right:15px;',
			'url' => array(
				'plugin' => 'bcp',
				'controller' => 'users',
				'action' => 'login',
				'?' => array('requestedByUser' => 1)
			)
		));
	}

	public function logout_link(){
		return $this->Html->image($this->image_path()."logoff.png", array(
			"alt" => __("Logout", true),
			"title" => __("Logout", true),
			'style' => 'position:absolute; top:15px; right:15px;',
			'url' => array('plugin' => 'bcp', 'controller' => 'users', 'action' => 'logout')
		));
	}

	public function change_password_link(){
		return $this->Html->image($this->image_path()."lock.png", array(
			"alt" => __("Change password", true),
			"title" => __("Change password", true),
			'style' => 'position:absolute; top:15px; right:60px;',
			'url' => array('plugin' => 'bcp', 'controller' => 'users', 'action' => 'changePassword')
		));
	}

	public function image_path(){
		if(is_file(APP.'.htaccess')){
			return '/bcp/img/';
		}else{
			return '../../plugins/bcp/vendors/img/';
		}
	}
}
?>