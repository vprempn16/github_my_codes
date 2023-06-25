<?php
class Settings_Vtiger_ChangeAccesskey_Action extends Settings_Vtiger_Index_Action {
         function process(Vtiger_Request $request) {

                global $current_user, $adb;

                $userId = $current_user->id;
                $key = md5(uniqid(rand(), true));
                $accessKey = substr($key,0,16);
                $adb->pquery("update vtiger_users set accesskey = ? where id = ?",array($accessKey,$userId));
                $nextPage = "index.php?module=Users&parent=Settings&view=Detail&record=$userId";
                header("Location:$nextPage&message=success"); 

        }
}
?>

