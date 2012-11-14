<?php
/* SVN FILE: $Id$ */
/**
 * Settings table model class.
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
 */

class Setting extends AppModel {

	public $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'allowEmpty' => true
			)
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255)
			),
			'isUnique' => array(
				'rule' => 'isUnique'
			),
		),
		'description' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true
			)
		),
		'category' => array(
			'maxLength' => array(
				'rule' => array('maxLength', 255)
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric'
			),
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true
			),
		),
		'setting' => array(
			'maxLength' => array(
				'rule' => array('maxLength', 255)
			),
			'isUnique' => array(
				'rule' => 'isUnique'
			),
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
			),
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true
			),
		),
		'value' => array(
			'allowedValue' => array(
				'rule' => '_allowedValue' // Protected function below
			),
		),
	);

	/**
	 * Method used to validate the value of the setting.
	 * 
	 * @return boolean
	 */
	protected function _allowedValue(){
		/* If that is a layout setting only filename values without extention that are available in
		 * the layouts directroies are valid */
		if($this->data['Setting']['setting'] == 'layout'){
			$layouts = $this->availableLayouts();
			// If submitted value has no corresponding layout file
			if(!in_array($this->data['Setting']['value'], $layouts)){
				return false;
			}
		}
		return true;
	}

	/**
	 * Method to find all layouts from respective directories
	 * 
	 * @return array - List of available layouts
	 */
	public function availableLayouts(){
		// Read filenames from app layout directry
		$appLayouts = scandir(LAYOUTS);
		// Read filenames from BCP plugin layout directry
		$bcpLayouts = scandir(APP.'plugins'.DS.'bcp'.DS.'views'.DS.'layouts'.DS);
		$layouts = array_merge($appLayouts, $bcpLayouts);
		foreach($layouts as $key => &$file){
			$position = strpos($file, '.ctp'); // Find the position of '.ctp' in the filename
			if($position === false){ // If '.ctp' was not found in the filename then unset the filename
				unset($layouts[$key]);
			}else{
				$file = substr($file, 0, $position); // Truncate the filename by '.ctp'
			}
		}
		sort($layouts);
		// Create associative array with keys equal to values
		$layouts = array_combine($layouts, $layouts);
		return $layouts;
	}
}
?>