<?php
class Settings_Vtiger_uploadDocuments_View extends Settings_Vtiger_Index_View{
        public function process(Vtiger_Request $request){

        	$moduleName = $request->getmodule(false);
       		$viewer = $this->getViewer($request);
       		$viewer->view('uploadDocument.tpl',$moduleName);
	}
}

?>
