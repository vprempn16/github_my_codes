<?php
class Settings_Vtiger_UpdateCustomDocument_View extends Settings_Vtiger_Index_View{
        public function process(Vtiger_Request $request){
		
		global $adb;
		$fileId = $request->get('id');
		$task  = $request->get('task');

		if($task == 'delete'){
			$ss = $adb->pquery("delete from Vtiger_srba_documents where fileid ={$fileId}");
		}else if($task == 'filter'){
			$fileId = $_POST['id'];
			$status = $_POST['fileStatus'];
			$adb->pquery("update Vtiger_srba_documents set filter = ? where fileid = ?",array($status,$fileId));
		}	
	//eader("location:index.php?parent=Settings&module=Vtiger&view=viewUploadedDocuments");
		
	}
}
?>
