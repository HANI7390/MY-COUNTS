<?php
	define('PREPEND_PATH', '');
	include_once(__DIR__ . '/lib.php');

	// accept a record as an assoc array, return transformed row ready to insert to table
	$transformFunctions = [
		'table1' => function($data, $options = []) {
			if(isset($data['field2'])) $data['field2'] = guessMySQLDateTime($data['field2']);
			if(isset($data['field3'])) $data['field3'] = pkGivenLookupText($data['field3'], 'table1', 'field3');
			if(isset($data['field5'])) $data['field5'] = pkGivenLookupText($data['field5'], 'table1', 'field5');
			if(isset($data['field10'])) $data['field10'] = pkGivenLookupText($data['field10'], 'table1', 'field10');
			if(isset($data['field12'])) $data['field12'] = pkGivenLookupText($data['field12'], 'table1', 'field12');
			if(isset($data['field17'])) $data['field17'] = pkGivenLookupText($data['field17'], 'table1', 'field17');
			if(isset($data['field21'])) $data['field21'] = pkGivenLookupText($data['field21'], 'table1', 'field21');
			if(isset($data['field27'])) $data['field27'] = pkGivenLookupText($data['field27'], 'table1', 'field27');

			return $data;
		},
		'table4' => function($data, $options = []) {
			if(isset($data['field3'])) $data['field3'] = pkGivenLookupText($data['field3'], 'table4', 'field3');
			if(isset($data['field4'])) $data['field4'] = pkGivenLookupText($data['field4'], 'table4', 'field4');
			if(isset($data['field19'])) $data['field19'] = pkGivenLookupText($data['field19'], 'table4', 'field19');

			return $data;
		},
		'table2' => function($data, $options = []) {

			return $data;
		},
		'table3' => function($data, $options = []) {

			return $data;
		},
		'table5' => function($data, $options = []) {

			return $data;
		},
	];

	// accept a record as an assoc array, return a boolean indicating whether to import or skip record
	$filterFunctions = [
		'table1' => function($data, $options = []) { return true; },
		'table4' => function($data, $options = []) { return true; },
		'table2' => function($data, $options = []) { return true; },
		'table3' => function($data, $options = []) { return true; },
		'table5' => function($data, $options = []) { return true; },
	];

	/*
	Hook file for overwriting/amending $transformFunctions and $filterFunctions:
	hooks/import-csv.php
	If found, it's included below

	The way this works is by either completely overwriting any of the above 2 arrays,
	or, more commonly, overwriting a single function, for example:
		$transformFunctions['tablename'] = function($data, $options = []) {
			// new definition here
			// then you must return transformed data
			return $data;
		};

	Another scenario is transforming a specific field and leaving other fields to the default
	transformation. One possible way of doing this is to store the original transformation function
	in GLOBALS array, calling it inside the custom transformation function, then modifying the
	specific field:
		$GLOBALS['originalTransformationFunction'] = $transformFunctions['tablename'];
		$transformFunctions['tablename'] = function($data, $options = []) {
			$data = call_user_func_array($GLOBALS['originalTransformationFunction'], [$data, $options]);
			$data['fieldname'] = 'transformed value';
			return $data;
		};
	*/

	@include(__DIR__ . '/hooks/import-csv.php');

	$ui = new CSVImportUI($transformFunctions, $filterFunctions);
