<?php
function getGET($var, $value='') {
    return isset($_GET[$var]) ? trim($_GET[$var]) : $value ;
}
function getPOST($var, $value='') {
    return isset($_POST[$var]) ? trim($_POST[$var]) : $value ;
}
function getREQUEST($var, $value='') {
    return isset($_REQUEST[$var]) ? trim($_REQUEST[$var]) : $value ;
}
?>
