<?php
header("Access-Control-Allow-Origin: *");
$file = $_FILES["file"];
if ($file["error"] > 0)
{
    $result = json_encode(array("error" => $file["error"]));
}
else
{
    $fp = fopen("tmp/$filename", "w+");
    echo ($file["tmp_name"]);

}
exit(0);
?>
