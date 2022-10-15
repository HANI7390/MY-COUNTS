<?php
// This script and data application were generated by AppGini 22.12
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/table5.php');
	include_once(__DIR__ . '/table5_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('table5');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'table5';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`table5`.`ID`" => "ID",
		"`table5`.`field2`" => "field2",
		"`table5`.`field3`" => "field3",
		"`table5`.`field4`" => "field4",
		"`table5`.`field5`" => "field5",
		"`table5`.`field6`" => "field6",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`table5`.`ID`',
		2 => 2,
		3 => 3,
		4 => '`table5`.`field4`',
		5 => '`table5`.`field5`',
		6 => '`table5`.`field6`',
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`table5`.`ID`" => "ID",
		"`table5`.`field2`" => "field2",
		"`table5`.`field3`" => "field3",
		"`table5`.`field4`" => "field4",
		"`table5`.`field5`" => "field5",
		"`table5`.`field6`" => "field6",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`table5`.`ID`" => "ID",
		"`table5`.`field2`" => "&#1575;&#1587;&#1605; &#1575;&#1604;&#1593;&#1605;&#1610;&#1604;",
		"`table5`.`field3`" => "&#1575;&#1604;&#1589;&#1601;&#1577;",
		"`table5`.`field4`" => "&#1585;&#1589;&#1610;&#1583; &#1587;&#1581;&#1576; &#1576;&#1591;&#1575;&#1602;&#1575;&#1578;",
		"`table5`.`field5`" => "&#1578;&#1587;&#1604;&#1610;&#1605; &#1602; &#1573;&#1588;&#1575;&#1585;&#1610;",
		"`table5`.`field6`" => "&#1585;&#1589;&#1610;&#1583; &#1605;&#1578;&#1575;&#1581; $",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`table5`.`ID`" => "ID",
		"`table5`.`field2`" => "field2",
		"`table5`.`field3`" => "field3",
		"`table5`.`field4`" => "field4",
		"`table5`.`field5`" => "field5",
		"`table5`.`field6`" => "field6",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`table5` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm['view'] == 0 ? 1 : 0);
	$x->AllowDelete = $perm['delete'];
	$x->AllowMassDelete = true;
	$x->AllowInsert = $perm['insert'];
	$x->AllowUpdate = $perm['edit'];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = (getLoggedAdmin() !== false);
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = (getLoggedAdmin() !== false);
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'table5_view.php';
	$x->RedirectAfterInsert = 'table5_view.php?SelectedID=#ID#';
	$x->TableTitle = '&#1575;&#1604;&#1593;&#1605;&#1604;&#1575;&#1569;';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`table5`.`ID`';

	$x->ColWidth = [150, 150, 150, 150, 150, ];
	$x->ColCaption = ['&#1575;&#1587;&#1605; &#1575;&#1604;&#1593;&#1605;&#1610;&#1604;', '&#1575;&#1604;&#1589;&#1601;&#1577;', '&#1585;&#1589;&#1610;&#1583; &#1587;&#1581;&#1576; &#1576;&#1591;&#1575;&#1602;&#1575;&#1578;', '&#1578;&#1587;&#1604;&#1610;&#1605; &#1602; &#1573;&#1588;&#1575;&#1585;&#1610;', '&#1585;&#1589;&#1610;&#1583; &#1605;&#1578;&#1575;&#1581; $', ];
	$x->ColFieldName = ['field2', 'field3', 'field4', 'field5', 'field6', ];
	$x->ColNumber  = [2, 3, 4, 5, 6, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/table5_templateTV.html';
	$x->SelectedTemplate = 'templates/table5_templateTVS.html';
	$x->TemplateDV = 'templates/table5_templateDV.html';
	$x->TemplateDVP = 'templates/table5_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = true;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: table5_init
	$render = true;
	if(function_exists('table5_init')) {
		$args = [];
		$render = table5_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// column sums
	if(strpos($x->HTML, '<!-- tv data below -->')) {
		// if printing multi-selection TV, calculate the sum only for the selected records
		$record_selector = Request::val('record_selector');
		if(Request::val('Print_x') && is_array($record_selector)) {
			$QueryWhere = '';
			foreach($record_selector as $id) {   // get selected records
				if($id != '') $QueryWhere .= "'" . makeSafe($id) . "',";
			}
			if($QueryWhere != '') {
				$QueryWhere = 'where `table5`.`ID` in ('.substr($QueryWhere, 0, -1).')';
			} else { // if no selected records, write the where clause to return an empty result
				$QueryWhere = 'where 1=0';
			}
		} else {
			$QueryWhere = $x->QueryWhere;
		}

		$sumQuery = "SELECT SUM(`table5`.`field4`), SUM(`table5`.`field5`), SUM(`table5`.`field6`) FROM {$x->QueryFrom} {$QueryWhere}";
		$res = sql($sumQuery, $eo);
		if($row = db_fetch_row($res)) {
			$sumRow = '<tr class="success sum">';
			if(!Request::val('Print_x')) $sumRow .= '<th class="text-center sum">&sum;</th>';
			$sumRow .= '<td class="table5-field2 sum"></td>';
			$sumRow .= '<td class="table5-field3 sum"></td>';
			$sumRow .= "<td class=\"table5-field4 text-right sum locale-float\">{$row[0]}</td>";
			$sumRow .= "<td class=\"table5-field5 text-right sum locale-float\">{$row[1]}</td>";
			$sumRow .= "<td class=\"table5-field6 text-right sum locale-float\">{$row[2]}</td>";
			$sumRow .= '</tr>';

			$x->HTML = str_replace('<!-- tv data below -->', '', $x->HTML);
			$x->HTML = str_replace('<!-- tv data above -->', $sumRow, $x->HTML);
		}
	}

	// hook: table5_header
	$headerCode = '';
	if(function_exists('table5_header')) {
		$args = [];
		$headerCode = table5_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: table5_footer
	$footerCode = '';
	if(function_exists('table5_footer')) {
		$args = [];
		$footerCode = table5_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
