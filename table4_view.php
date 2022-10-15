<?php
// This script and data application were generated by AppGini 22.12
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/table4.php');
	include_once(__DIR__ . '/table4_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('table4');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'table4';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`table4`.`ID`" => "ID",
		"`table4`.`field2`" => "field2",
		"IF(    CHAR_LENGTH(`table51`.`field2`), CONCAT_WS('',   `table51`.`field2`), '') /* &#1605;&#1604;&#1603;&#1610;&#1577; &#1575;&#1604;&#1582;&#1586;&#1610;&#1606;&#1577; */" => "field3",
		"IF(    CHAR_LENGTH(`table21`.`field2`), CONCAT_WS('',   `table21`.`field2`), '') /* &#1606;&#1608;&#1593; &#1575;&#1604;&#1593;&#1605;&#1604;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577; */" => "field4",
		"IF(    CHAR_LENGTH(`table31`.`field2`), CONCAT_WS('',   `table31`.`field2`), '') /* &#1606;&#1608;&#1593; &#1575;&#1604;&#1581;&#1585;&#1603;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581; */" => "field19",
		"`table4`.`field15`" => "field15",
		"`table4`.`field16`" => "field16",
		"`table4`.`field12`" => "field12",
		"`table4`.`field14`" => "field14",
		"`table4`.`field5`" => "field5",
		"`table4`.`field6`" => "field6",
		"`table4`.`field9`" => "field9",
		"`table4`.`field17`" => "field17",
		"`table4`.`field18`" => "field18",
		"`table4`.`field7`" => "field7",
		"`table4`.`field8`" => "field8",
		"`table4`.`field10`" => "field10",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`table4`.`ID`',
		2 => 2,
		3 => '`table51`.`field2`',
		4 => '`table21`.`field2`',
		5 => '`table31`.`field2`',
		6 => '`table4`.`field15`',
		7 => '`table4`.`field16`',
		8 => '`table4`.`field12`',
		9 => '`table4`.`field14`',
		10 => '`table4`.`field5`',
		11 => '`table4`.`field6`',
		12 => '`table4`.`field9`',
		13 => '`table4`.`field17`',
		14 => '`table4`.`field18`',
		15 => '`table4`.`field7`',
		16 => '`table4`.`field8`',
		17 => '`table4`.`field10`',
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`table4`.`ID`" => "ID",
		"`table4`.`field2`" => "field2",
		"IF(    CHAR_LENGTH(`table51`.`field2`), CONCAT_WS('',   `table51`.`field2`), '') /* &#1605;&#1604;&#1603;&#1610;&#1577; &#1575;&#1604;&#1582;&#1586;&#1610;&#1606;&#1577; */" => "field3",
		"IF(    CHAR_LENGTH(`table21`.`field2`), CONCAT_WS('',   `table21`.`field2`), '') /* &#1606;&#1608;&#1593; &#1575;&#1604;&#1593;&#1605;&#1604;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577; */" => "field4",
		"IF(    CHAR_LENGTH(`table31`.`field2`), CONCAT_WS('',   `table31`.`field2`), '') /* &#1606;&#1608;&#1593; &#1575;&#1604;&#1581;&#1585;&#1603;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581; */" => "field19",
		"`table4`.`field15`" => "field15",
		"`table4`.`field16`" => "field16",
		"`table4`.`field12`" => "field12",
		"`table4`.`field14`" => "field14",
		"`table4`.`field5`" => "field5",
		"`table4`.`field6`" => "field6",
		"`table4`.`field9`" => "field9",
		"`table4`.`field17`" => "field17",
		"`table4`.`field18`" => "field18",
		"`table4`.`field7`" => "field7",
		"`table4`.`field8`" => "field8",
		"`table4`.`field10`" => "field10",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`table4`.`ID`" => "ID",
		"`table4`.`field2`" => "&#1571;&#1587;&#1605; &#1575;&#1604;&#1582;&#1586;&#1610;&#1606;&#1577;",
		"IF(    CHAR_LENGTH(`table51`.`field2`), CONCAT_WS('',   `table51`.`field2`), '') /* &#1605;&#1604;&#1603;&#1610;&#1577; &#1575;&#1604;&#1582;&#1586;&#1610;&#1606;&#1577; */" => "&#1605;&#1604;&#1603;&#1610;&#1577; &#1575;&#1604;&#1582;&#1586;&#1610;&#1606;&#1577;",
		"IF(    CHAR_LENGTH(`table21`.`field2`), CONCAT_WS('',   `table21`.`field2`), '') /* &#1606;&#1608;&#1593; &#1575;&#1604;&#1593;&#1605;&#1604;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577; */" => "&#1606;&#1608;&#1593; &#1575;&#1604;&#1593;&#1605;&#1604;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577;",
		"IF(    CHAR_LENGTH(`table31`.`field2`), CONCAT_WS('',   `table31`.`field2`), '') /* &#1606;&#1608;&#1593; &#1575;&#1604;&#1581;&#1585;&#1603;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581; */" => "&#1606;&#1608;&#1593; &#1575;&#1604;&#1581;&#1585;&#1603;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;",
		"`table4`.`field15`" => "&#1583;&#1582;&#1608;&#1604; &#1581;&#1585;&#1603;&#1577; $",
		"`table4`.`field16`" => "&#1582;&#1585;&#1608;&#1580; &#1581;&#1585;&#1603;&#1577; $",
		"`table4`.`field12`" => "&#1583;&#1582;&#1608;&#1604; $ &#1587;&#1581;&#1575;&#1576;",
		"`table4`.`field14`" => "&#1578;&#1587;&#1604;&#1610;&#1605; &#1602; &#1573;&#1588;&#1575;&#1585;&#1610;",
		"`table4`.`field5`" => "&#1583;&#1582;&#1608;&#1604; &#1606;&#1602;&#1583;&#1610; $",
		"`table4`.`field6`" => "&#1582;&#1585;&#1608;&#1580; &#1606;&#1602;&#1583;&#1610; $",
		"`table4`.`field9`" => "&#1585;&#1589;&#1610;&#1583; $ &#1605;&#1578;&#1575;&#1581;",
		"`table4`.`field17`" => "&#1583;&#1582;&#1608;&#1604; &#1581;&#1585;&#1603;&#1577; &#1583;.&#1604;",
		"`table4`.`field18`" => "&#1582;&#1585;&#1608;&#1580; &#1581;&#1585;&#1603;&#1577; &#1583;.&#1604;",
		"`table4`.`field7`" => "&#1583;&#1582;&#1608;&#1604; &#1605;&#1576;&#1610;&#1593;&#1575;&#1578; &#1583;.&#1604;",
		"`table4`.`field8`" => "&#1582;&#1585;&#1608;&#1580; &#1605;&#1588;&#1578;&#1585;&#1610;&#1575;&#1578; &#1583;.&#1604;",
		"`table4`.`field10`" => "&#1585;&#1589;&#1610;&#1583; &#1583;.&#1604; &#1605;&#1578;&#1575;&#1581;",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`table4`.`ID`" => "ID",
		"`table4`.`field2`" => "field2",
		"IF(    CHAR_LENGTH(`table51`.`field2`), CONCAT_WS('',   `table51`.`field2`), '') /* &#1605;&#1604;&#1603;&#1610;&#1577; &#1575;&#1604;&#1582;&#1586;&#1610;&#1606;&#1577; */" => "field3",
		"IF(    CHAR_LENGTH(`table21`.`field2`), CONCAT_WS('',   `table21`.`field2`), '') /* &#1606;&#1608;&#1593; &#1575;&#1604;&#1593;&#1605;&#1604;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577; */" => "field4",
		"IF(    CHAR_LENGTH(`table31`.`field2`), CONCAT_WS('',   `table31`.`field2`), '') /* &#1606;&#1608;&#1593; &#1575;&#1604;&#1581;&#1585;&#1603;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581; */" => "field19",
		"`table4`.`field15`" => "field15",
		"`table4`.`field16`" => "field16",
		"`table4`.`field12`" => "field12",
		"`table4`.`field14`" => "field14",
		"`table4`.`field5`" => "field5",
		"`table4`.`field6`" => "field6",
		"`table4`.`field9`" => "field9",
		"`table4`.`field17`" => "field17",
		"`table4`.`field18`" => "field18",
		"`table4`.`field7`" => "field7",
		"`table4`.`field8`" => "field8",
		"`table4`.`field10`" => "field10",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['field3' => '&#1605;&#1604;&#1603;&#1610;&#1577; &#1575;&#1604;&#1582;&#1586;&#1610;&#1606;&#1577;', 'field4' => '&#1606;&#1608;&#1593; &#1575;&#1604;&#1593;&#1605;&#1604;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577;', 'field19' => '&#1606;&#1608;&#1593; &#1575;&#1604;&#1581;&#1585;&#1603;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;', ];

	$x->QueryFrom = "`table4` LEFT JOIN `table5` as table51 ON `table51`.`ID`=`table4`.`field3` LEFT JOIN `table2` as table21 ON `table21`.`id`=`table4`.`field4` LEFT JOIN `table3` as table31 ON `table31`.`id`=`table4`.`field19` ";
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
	$x->AllowPrinting = (getLoggedAdmin() !== false);
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = (getLoggedAdmin() !== false);
	$x->RecordsPerPage = 200;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'table4_view.php';
	$x->RedirectAfterInsert = 'table4_view.php?SelectedID=#ID#';
	$x->TableTitle = '&#1575;&#1604;&#1582;&#1586;&#1610;&#1606;&#1577;';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`table4`.`ID`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['&#1571;&#1587;&#1605; &#1575;&#1604;&#1582;&#1586;&#1610;&#1606;&#1577;', '&#1605;&#1604;&#1603;&#1610;&#1577; &#1575;&#1604;&#1582;&#1586;&#1610;&#1606;&#1577;', '&#1606;&#1608;&#1593; &#1575;&#1604;&#1593;&#1605;&#1604;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577;', '&#1606;&#1608;&#1593; &#1575;&#1604;&#1581;&#1585;&#1603;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;', '&#1583;&#1582;&#1608;&#1604; &#1581;&#1585;&#1603;&#1577; $', '&#1582;&#1585;&#1608;&#1580; &#1581;&#1585;&#1603;&#1577; $', '&#1583;&#1582;&#1608;&#1604; $ &#1587;&#1581;&#1575;&#1576;', '&#1578;&#1587;&#1604;&#1610;&#1605; &#1602; &#1573;&#1588;&#1575;&#1585;&#1610;', '&#1583;&#1582;&#1608;&#1604; &#1606;&#1602;&#1583;&#1610; $', '&#1582;&#1585;&#1608;&#1580; &#1606;&#1602;&#1583;&#1610; $', '&#1585;&#1589;&#1610;&#1583; $ &#1605;&#1578;&#1575;&#1581;', '&#1583;&#1582;&#1608;&#1604; &#1581;&#1585;&#1603;&#1577; &#1583;.&#1604;', '&#1582;&#1585;&#1608;&#1580; &#1581;&#1585;&#1603;&#1577; &#1583;.&#1604;', '&#1583;&#1582;&#1608;&#1604; &#1605;&#1576;&#1610;&#1593;&#1575;&#1578; &#1583;.&#1604;', '&#1582;&#1585;&#1608;&#1580; &#1605;&#1588;&#1578;&#1585;&#1610;&#1575;&#1578; &#1583;.&#1604;', '&#1585;&#1589;&#1610;&#1583; &#1583;.&#1604; &#1605;&#1578;&#1575;&#1581;', ];
	$x->ColFieldName = ['field2', 'field3', 'field4', 'field19', 'field15', 'field16', 'field12', 'field14', 'field5', 'field6', 'field9', 'field17', 'field18', 'field7', 'field8', 'field10', ];
	$x->ColNumber  = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/table4_templateTV.html';
	$x->SelectedTemplate = 'templates/table4_templateTVS.html';
	$x->TemplateDV = 'templates/table4_templateDV.html';
	$x->TemplateDVP = 'templates/table4_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = true;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: table4_init
	$render = true;
	if(function_exists('table4_init')) {
		$args = [];
		$render = table4_init($x, getMemberInfo(), $args);
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
				$QueryWhere = 'where `table4`.`ID` in ('.substr($QueryWhere, 0, -1).')';
			} else { // if no selected records, write the where clause to return an empty result
				$QueryWhere = 'where 1=0';
			}
		} else {
			$QueryWhere = $x->QueryWhere;
		}

		$sumQuery = "SELECT SUM(`table4`.`field15`), SUM(`table4`.`field16`), SUM(`table4`.`field12`), SUM(`table4`.`field9`), SUM(`table4`.`field17`), SUM(`table4`.`field18`), SUM(`table4`.`field10`) FROM {$x->QueryFrom} {$QueryWhere}";
		$res = sql($sumQuery, $eo);
		if($row = db_fetch_row($res)) {
			$sumRow = '<tr class="success sum">';
			if(!Request::val('Print_x')) $sumRow .= '<th class="text-center sum">&sum;</th>';
			$sumRow .= '<td class="table4-field2 sum"></td>';
			$sumRow .= '<td class="table4-field3 sum"></td>';
			$sumRow .= '<td class="table4-field4 sum"></td>';
			$sumRow .= '<td class="table4-field19 sum"></td>';
			$sumRow .= "<td class=\"table4-field15 text-right sum locale-float\">{$row[0]}</td>";
			$sumRow .= "<td class=\"table4-field16 text-right sum locale-float\">{$row[1]}</td>";
			$sumRow .= "<td class=\"table4-field12 text-right sum locale-float\">{$row[2]}</td>";
			$sumRow .= '<td class="table4-field14 sum"></td>';
			$sumRow .= '<td class="table4-field5 sum"></td>';
			$sumRow .= '<td class="table4-field6 sum"></td>';
			$sumRow .= "<td class=\"table4-field9 text-right sum locale-float\">{$row[3]}</td>";
			$sumRow .= "<td class=\"table4-field17 text-right sum locale-float\">{$row[4]}</td>";
			$sumRow .= "<td class=\"table4-field18 text-right sum locale-float\">{$row[5]}</td>";
			$sumRow .= '<td class="table4-field7 sum"></td>';
			$sumRow .= '<td class="table4-field8 sum"></td>';
			$sumRow .= "<td class=\"table4-field10 text-right sum locale-float\">{$row[6]}</td>";
			$sumRow .= '</tr>';

			$x->HTML = str_replace('<!-- tv data below -->', '', $x->HTML);
			$x->HTML = str_replace('<!-- tv data above -->', $sumRow, $x->HTML);
		}
	}

	// hook: table4_header
	$headerCode = '';
	if(function_exists('table4_header')) {
		$args = [];
		$headerCode = table4_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: table4_footer
	$footerCode = '';
	if(function_exists('table4_footer')) {
		$args = [];
		$footerCode = table4_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
