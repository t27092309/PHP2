<?php
if(!function_exists('storage')){
    function storage($imageName){
        $scriptPath = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        return empty($imageName) ? '' : $scriptPath.'storage/upload/'.$imageName;
        
    }
}
?>