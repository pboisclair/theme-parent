<?php
class WPSEOcontent {
	
	function getFieldData($fields) {
		$values = self::getValues($fields);
		$data = '';
		foreach($values as $item) {
			switch(gettype($item)) {
				case 'string':
					$data = $data.' '.$item;
					break;
				case 'array':
					$data = $data.self::getFieldData($item);
					break;
			}
		}
		return $data;
	}

	function getValues($array) {
		$value_array = array_values($array);
		return $value_array;
	}
}