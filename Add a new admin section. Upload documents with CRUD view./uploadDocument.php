<?php
include_once 'vtlib/Vtiger/Module.php';
include_once 'includes/main/WebUI.php';
include_once('vtlib/Vtiger/Module.php');
global $adb;
$adb->pquery("insert into vtiger_settings_field (fieldid,blockid,name,linkto)values(36,4,'Upload Documents','index.php?parent=Settings&module=Vtiger&view=viewUploadedDocuments')");
$adb->pquery("create table Vtiger_srba_documents(fileid int auto_increment primary key, name varchar(50),type varchar(10),size int,path varchar(225),filter int)");

 
?>
