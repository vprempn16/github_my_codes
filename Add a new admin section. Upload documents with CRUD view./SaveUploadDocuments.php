<?php
class Settings_Vtiger_SaveUploadDocuments_Action extends Settings_Vtiger_IndexAjax_View{
								
	public function process(Vtiger_Request $request){

		global $adb;				
		$folder = "storage/2019/SR_BA/";
		$file = $_FILES['file']['name'];
		$file_loc = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_type = $_FILES['file']['type'];
		move_uploaded_file($file_loc,$folder.$file);
		
		$adb->pquery("insert into Vtiger_srba_documents(name,type,size,path)values(?,?,?,?)",array($file,$file_type,$file_size,$folder));
	
		header("location:index.php?parent=Settings&module=Vtiger&view=viewUploadedDocuments&message=success");	

	}

}
?>
