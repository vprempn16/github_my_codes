<?php
include_once('vtlib/Vtiger/Module.php');
include_once 'includes/main/WebUI.php';

// Module Instance 
$moduleName='Contacts';
$moduleInstance = Vtiger_Module::getInstance($moduleName);
$blockInstance = Vtiger_Block::getInstance('LBL_CONTACT_INFORMATION', $moduleInstance); 
if($blockInstance) {

	$fieldInstance = new Vtiger_Field();
	$fieldInstance->name = 'group_diff';
	$fieldInstance->table = 'vtiger_contactdetails';
	$fieldInstance->column = 'group_diff';
	$fieldInstance->label = 'Group Diff';
	$fieldInstance->uitype = '55';
	$fieldInstance->typeofdata = 'V~O';	
	$blockInstance->addField($fieldInstance);

echo"ok";
} else {
	echo "Block Name is not Found";
}
