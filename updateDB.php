<?php
	// check this file's MD5 to make sure it wasn't called before
	$tenantId = Authentication::tenantIdPadded();
	$setupHash = __DIR__ . "/setup{$tenantId}.md5";

	$prevMD5 = @file_get_contents($setupHash);
	$thisMD5 = md5_file(__FILE__);

	// check if this setup file already run
	if($thisMD5 != $prevMD5) {
		// set up tables
		setupTable(
			'table1', " 
			CREATE TABLE IF NOT EXISTS `table1` ( 
				`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`field2` DATE NOT NULL,
				`field3` INT UNSIGNED NOT NULL,
				`field4` VARCHAR(150) NULL,
				`field5` INT UNSIGNED NULL,
				`field6` VARCHAR(150) NULL,
				`field7` DOUBLE(10,3) NULL DEFAULT '0.000',
				`field14` DOUBLE(10,3) NULL,
				`field8` DOUBLE(10,3) NULL DEFAULT '0.000',
				`field9` DOUBLE(10,3) NULL,
				`field10` INT UNSIGNED NULL,
				`field11` VARCHAR(150) NULL,
				`field12` INT UNSIGNED NULL,
				`field13` VARCHAR(150) NULL,
				`field16` VARCHAR(10) NULL,
				`field17` INT UNSIGNED NULL,
				`field24` VARCHAR(10) NULL,
				`field18` DOUBLE(10,3) NULL,
				`field19` DOUBLE(10,3) NULL,
				`field20` DOUBLE(10,3) NULL,
				`field21` INT UNSIGNED NULL,
				`field25` VARCHAR(150) NULL,
				`field23` DOUBLE(10,3) NULL,
				`field22` DOUBLE(10,3) NULL,
				`field26` DOUBLE(10,3) NULL,
				`field29` VARCHAR(150) NULL,
				`field27` INT UNSIGNED NULL,
				`field28` VARCHAR(150) NULL,
				`field15` TEXT NULL
			) CHARSET utf8"
		);
		setupIndexes('table1', ['field3','field5','field10','field12','field17','field21','field27',]);

		setupTable(
			'table4', " 
			CREATE TABLE IF NOT EXISTS `table4` ( 
				`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`field2` VARCHAR(150) NULL,
				`field3` INT UNSIGNED NULL,
				`field4` INT UNSIGNED NULL,
				`field19` INT UNSIGNED NULL,
				`field15` DOUBLE(10,3) NULL,
				`field16` DOUBLE(10,3) NULL,
				`field12` DOUBLE(10,3) NULL,
				`field14` DOUBLE(10,3) NULL,
				`field5` DOUBLE(10,3) NULL,
				`field6` DOUBLE(10,3) NULL,
				`field9` DOUBLE(10,3) NULL,
				`field17` DOUBLE(10,3) NULL,
				`field18` DOUBLE(10,3) NULL,
				`field7` DOUBLE(10,3) NULL,
				`field8` DOUBLE(10,3) NULL,
				`field10` DOUBLE(10,3) NULL
			) CHARSET utf8"
		);
		setupIndexes('table4', ['field3','field4','field19',]);

		setupTable(
			'table2', " 
			CREATE TABLE IF NOT EXISTS `table2` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`field2` VARCHAR(150) NULL,
				`field3` VARCHAR(10) NULL
			) CHARSET utf8"
		);

		setupTable(
			'table3', " 
			CREATE TABLE IF NOT EXISTS `table3` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`field2` VARCHAR(150) NULL
			) CHARSET utf8"
		);

		setupTable(
			'table5', " 
			CREATE TABLE IF NOT EXISTS `table5` ( 
				`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`field2` VARCHAR(150) NULL,
				`field3` VARCHAR(100) NULL,
				`field4` DOUBLE(10,3) NULL,
				`field5` DOUBLE(10,3) NULL,
				`field6` DOUBLE(10,3) NULL
			) CHARSET utf8"
		);



		// save MD5
		@file_put_contents($setupHash, $thisMD5);
	}


	function setupIndexes($tableName, $arrFields) {
		if(!is_array($arrFields) || !count($arrFields)) return false;

		foreach($arrFields as $fieldName) {
			if(!$res = @db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")) continue;
			if(!$row = @db_fetch_assoc($res)) continue;
			if($row['Key']) continue;

			@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
		}
	}


	function setupTable($tableName, $createSQL = '', $arrAlter = '') {
		global $Translation;
		$oldTableName = '';
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)) {
			$matches = [];
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/i", $arrAlter[0], $matches)) {
				$oldTableName = $matches[1];
			}
		}

		if($res = @db_query("SELECT COUNT(1) FROM `$tableName`")) { // table already exists
			if($row = @db_fetch_array($res)) {
				echo str_replace(['<TableName>', '<NumRecords>'], [$tableName, $row[0]], $Translation['table exists']);
				if(is_array($arrAlter)) {
					echo '<br>';
					foreach($arrAlter as $alter) {
						if($alter != '') {
							echo "$alter ... ";
							if(!@db_query($alter)) {
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							} else {
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				} else {
					echo $Translation['table uptodate'];
				}
			} else {
				echo str_replace('<TableName>', $tableName, $Translation['couldnt count']);
			}
		} else { // given tableName doesn't exist

			if($oldTableName != '') { // if we have a table rename query
				if($ro = @db_query("SELECT COUNT(1) FROM `$oldTableName`")) { // if old table exists, rename it.
					$renameQuery = array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)) {
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					} else {
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				} else { // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			} else { // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)) {
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';
				} else {
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}

			// set Admin group permissions for newly created table if membership_grouppermissions exists
			if($ro = @db_query("SELECT COUNT(1) FROM `membership_grouppermissions`")) {
				// get Admins group id
				$ro = @db_query("SELECT `groupID` FROM `membership_groups` WHERE `name`='Admins'");
				if($ro) {
					$adminGroupID = intval(db_fetch_row($ro)[0]);
					if($adminGroupID) @db_query("INSERT IGNORE INTO `membership_grouppermissions` SET
						`groupID`='$adminGroupID',
						`tableName`='$tableName',
						`allowInsert`=1, `allowView`=1, `allowEdit`=1, `allowDelete`=1
					");
				}
			}
		}

		echo '</div>';

		$out = ob_get_clean();
		if(defined('APPGINI_SETUP') && APPGINI_SETUP) echo $out;
	}
