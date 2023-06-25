<?php 
class BALetters_suggestionTagName_Action extends Vtiger_Action_Controller 
{
	public function checkPermission() 
	{
                return true;
        }

	public function process(Vtiger_Request $request)
	{
		global $adb;
		$searchValue = $_POST['searchValue'];
		$searchValue = "%$searchValue%";
                $getTagsName = $adb->pquery( 'select tag from vtiger_freetags where tag like ? ', array($searchValue) );
                while( $row = $adb->fetch_array($getTagsName) ) {
                        $tagsName[] = $row['tag'];
                }
                echo json_encode($tagsName);
                die;
	}	
}
