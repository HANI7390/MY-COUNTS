<?php
// This script and data application were generated by AppGini 22.12
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/table3.php');
	include_once(__DIR__ . '/table3_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('table3');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'table3';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`table3`.`id`" => "id",
		"`table3`.`field2`" => "field2",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`table3`.`id`',
		2 => 2,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`table3`.`id`" => "id",
		"`table3`.`field2`" => "field2",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`table3`.`id`" => "ID",
		"`table3`.`field2`" => "&#1606;&#1608;&#1593; &#1575;&#1604;&#1581;&#1585;&#1603;&#1577;",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`table3`.`id`" => "id",
		"`table3`.`field2`" => "field2",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`table3` ";
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
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'table3_view.php';
	$x->RedirectAfterInsert = 'table3_view.php?SelectedID=#ID#';
	$x->TableTitle = '&#1575;&#1604;&#1581;&#1585;&#1603;&#1577;';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`table3`.`id`';

	$x->ColWidth = [150, 150, ];
	$x->ColCaption = ['ID', '&#1606;&#1608;&#1593; &#1575;&#1604;&#1581;&#1585;&#1603;&#1577;', ];
	$x->ColFieldName = ['id', 'field2', ];
	$x->ColNumber  = [1, 2, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/table3_templateTV.html';
	$x->SelectedTemplate = 'templates/table3_templateTVS.html';
	$x->TemplateDV = 'templates/table3_templateDV.html';
	$x->TemplateDVP = 'templates/table3_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: table3_init
	$render = true;
	if(function_exists('table3_init')) {
		$args = [];
		$render = table3_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: table3_header
	$headerCode = '';
	if(function_exists('table3_header')) {
		$args = [];
		$headerCode = table3_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: table3_footer
	$footerCode = '';
	if(function_exists('table3_footer')) {
		$args = [];
		$footerCode = table3_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
