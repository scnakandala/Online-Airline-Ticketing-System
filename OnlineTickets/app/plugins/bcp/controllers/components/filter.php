<?php
/**
 * Filter component
 **
 * @oryginal concept by Nik Chankov - http://nik.chankov.net
 * @modified and extended by Maciej Grajcarek - http://blog.uplevel.pl
 * @version 0.1
 */

class FilterComponent extends Object {
	/**
	 * fields which will replace the regular syntax in where i.e. field = 'value'
	 */
	var $fieldFormatting = array(
		"string"=>"LIKE '%%%s%%'",
		"text"=>"LIKE '%%%s%%'",
		"date"=>"'%s'"
		);

	/**
	 * Paginator params sended in URL
	 */
	var $paginatorParams = array('page', 'sort', 'direction');

	/**
	 *  Url variable used in paginate helper (array('url'=>$url)); 
	 */
	var $url = '';
	
	/**
	 * Function which will change controller->data array
	 *
	 * @param object $controller the class of the controller which call this component
	 * @param array $whiteList contains list of allowed filter attributes
	 * @access public
	 */
	function process(&$controller, $whiteList = null){
		//@$this->_prepareFilter(&$controller);
		$this->_prepareFilter($controller);
		$ret = array();
		if(isset($controller->data)){
			//Loop for models
			foreach($controller->data as $key=>$value){
				if(isset($controller->{$key})){
					$columns = $controller->{$key}->getColumnTypes();
					foreach($value as $k=>$v){
						if($v != ''){
							if(is_array($whiteList) && !in_array($k, $whiteList)){
								continue;
							}
							//Check if there are some fieldFormatting set
							if(isset($this->fieldFormatting[$columns[$k]])){
								$tmp = sprintf($this->fieldFormatting[$columns[$k]], $v);
								if(substr($tmp,0,4)=='LIKE')
									$ret[] = $key.'.'.$k." ".sprintf($this->fieldFormatting[$columns[$k]], $v);
								else
									$ret[$key.'.'.$k] = sprintf($this->fieldFormatting[$columns[$k]], $v);
							}else{
								$ret[$key.'.'.$k] = $v;
							}
							$this->url .= '/'.$key.'.'.$k.':'.$v;
						}
					}
					//unsetting the empty forms
					if(count($value) == 0){
						unset($controller->data[$key]);
					}
				}elseif(isset($controller->{$controller->modelClass}->belongsTo[$key])){
					$columns = $controller->{$controller->modelClass}->{$key}->getColumnTypes();
					foreach($value as $k=>$v){
						if($v != ''){
							if(is_array($whiteList) && !in_array($k,$whiteList) ){
								continue;
							}
							//Check if there are some fieldFormatting set
							if(isset($this->fieldFormatting[$columns[$k]])){
								$tmp = sprintf($this->fieldFormatting[$columns[$k]], $v);
								if(substr($tmp,0,4)=='LIKE')
									$ret[] = $key.'.'.$k." ".sprintf($this->fieldFormatting[$columns[$k]], $v) ;
								else
									$ret[$key.'.'.$k] = sprintf($this->fieldFormatting[$columns[$k]], $v);
							}else{
								$ret[$key.'.'.$k] = $v;
							}
							$this->url .=  '/'.$key.'.'.$k.':'.$v;
						}
					}
					//unsetting the empty forms
					if(count($value) == 0){
						unset($controller->data[$key]);
					}
				}
			}
		}
		return $ret;
	}

	/**
	 * function which will take care of the storing the filter
	 * data and loading after this from the Session
	 */
	function _prepareFilter(&$controller){
		$filter = array();
		if(isset($controller->data)){
			foreach($controller->data as $model=>$fields){
				foreach($fields as $key=>$field){
					if($field == ''){
						unset($controller->data[$model][$key]);
					}
				}
			}
			App::import('Sanitize');
			$sanit = new Sanitize();
			$controller->data = $sanit->clean($controller->data);
			$filter = $controller->data;
		}
		if(empty($filter)){
			$filter = $this->_checkParams($controller);  	
		}
		$controller->data = $filter;
	}

	/**
	 * function which will take care of filters from URL
	 */
	function _checkParams($controller){
		if(empty($controller->params['named'])){
			$filter = array();
		}
		App::import('Sanitize');
		$sanit = new Sanitize();
		$controller->params['named'] = $sanit->clean($controller->params['named']);
		foreach($controller->params['named'] as $field => $value){
			if(!in_array($field, $this->paginatorParams)){
				$fields = explode('.',$field);
				if (sizeof($fields) == 1)
					$filter[$controller->modelClass][$field] = $value;
				else
					$filter[$fields[0]][$fields[1]] = $value;
			}
		}
		if(!empty($filter))
			return $filter;
		else
			return array();
	}
}
?>