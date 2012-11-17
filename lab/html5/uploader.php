<?php
header("Access-Control-Allow-Origin: *");
$file = $_FILES["file"];
if ($file["error"] > 0)
{
    $result = json_encode(array("error" => $file["error"]));
}
else
{
    $filename = $file["name"];
    $fp = fopen("tmp/$filename", "w+");
    fclose($fp);
}
exit(0);
?>
