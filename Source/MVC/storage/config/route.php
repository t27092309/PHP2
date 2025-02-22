<?php
function route($routeName, $params = [])
{
    // Kiểm tra xem có param truyền vào ko
    if (count($params) > 0) {
        foreach ($params as $key => $value) {
            $path = str_replace("{" . $key . "}", $value, $routeName);
        }
    } else {
        $path = $routeName;
    }
    // return $path;
    $scriptPath = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $scriptPath . $path;
}
