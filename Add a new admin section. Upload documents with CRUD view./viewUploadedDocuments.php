<?php
class Settings_Vtiger_viewUploadedDocuments_View extends Settings_Vtiger_Index_View{
	public function process(Vtiger_Request $request){
	global $adb;	
	$getList = $adb->pquery("select *from Vtiger_srba_documents");
	while($row=$adb->fetch_array($getList)){
		$fileName[] = $row['name'];
		$fileId[] = $row['fileid'];
		$fileType[] = $row['type'];
		$fileStatus[] = $row['filter'];	
		$fileSize[] = $row['size']; 	
	}

	$moduleName = $request->getmodule(false);
	$viewer = $this->getViewer($request);
	$viewer->assign('FILE_ID',$fileId);
	$viewer->assign('FILE_Status',$fileStatus);
	$viewer->assign('FILE_NAME',$fileName);
	$viewer->assign('FILE_TYPE',$fileType);
	$viewer->assign('FILE_SIZE',$fileSize);
	$viewer->view('listUploadedDocuments.tpl',$moduleName);
	}
}
?>
