<?php
require_once("sdk/src/facebook.php");

$config = array();
$config["appId"]      = '442733519077574';
$config["secret"]     = '5ef72ee0781cffe3eb5f249b3854e489';
$config["fileUpload"] = false;

$facebook = new Facebook($config);
$userId = $facebook->getUser();


if ( ! $userId)
{
    $params = array(
        "scope" => "user_photos, user_likes, friends_photos, friends_likes",
        "redirect_uri" => "http://josephj.com/lab/2012/easyoga-facebook/demo.php"
    );
    $loginUrl = $facebook->getLoginUrl($params);
    header("Location: $loginUrl");
    exit;
}
else
{

    if (apc_fetch("albums"))
    {
        $albums = apc_fetch("albums");
    }
    else
    {
        $return = $facebook->api('/josephj6802/albums?limit=30');
        $albums = $return["data"];
        apc_store("albums", $albums, 120);
    }
}

$album_id = isset($_GET["album_id"]) ? $_GET["album_id"] : $albums[0]["id"];

if (!apc_fetch($album_id))
{
    $return = $facebook->api("/$album_id/photos?limit=400");
    //$return = $facebook->api("/$album_id/photos?limit=10");
    $photos = $return["data"];

    $photos2 = array();
    foreach ($photos as $photo):
        $photo_id = $photo["id"];
        $return = $facebook->api("/{$photo_id}/likes?limit=10000");
        //$return = $facebook->api("/{$photo_id}/likes?limit=10");
        $likes_total = count($return["data"]);
        $photos2[] = array(
            "link"        => $photo["link"],
            "image_url"   => $photo["images"][6]["source"],
            "large_image_url" => $photo["images"][2]["source"],
            "likes_total" => $likes_total,
        );
    endforeach;

    function cmp($a, $b)
    {
        return $b['likes_total'] - $a['likes_total'];
    }
    usort($photos2, "cmp");

    if ($album_id !== $albums[0]["id"])
    {
        apc_store($album_id, $photos2, 180);
    }
    $has_cache = FALSE;
}
else
{
    $photos2 = apc_fetch($album_id);
    $has_cache = TRUE;
}

?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $album[$album_id]["name"]; ?></title>
<link rel="stylesheet" href="http://yui.yahooapis.com/3.4.1/build/cssreset/reset-min.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/3.4.1/build/cssfonts/fonts-min.css">
<link rel="stylesheet" href="stylesheets/demo.css">
<script type="text/javascript" src="http://yui.yahooapis.com/3.5.0/build/yui/yui-min.js"></script>
<script>
YUI().use("event-delegate", "panel", function (Y) {

    Y.one("#album_id").on("change", function (e) {
        location.href = "?album_id=" + this.get("value");
    });

    var panel = new Y.Panel({
        render: true,
        visible: false,
        centered: true,
        width: 800,
        height: 600
    })

    Y.delegate("click", function (e) {

        panel.set("headerContent", this.ancestor("li").one("p").getContent())
        panel.set("bodyContent", "<div style='text-align:center'><img src='" + this.ancestor("li").one(".large-photo-url").getContent() + "'></div>");
        panel.show();

    }, "body", "img.thumbnail");

});
</script>
</head>
<body class="yui3-skin-sam">
    <select id="album_id">
<?php foreach ($albums as $album):
        $selected = ($album["id"] === $album_id) ? " selected" : "";
?>
        <option value="<?php echo $album["id"]; ?>"<?php echo $selected; ?>><?php echo $album["name"]; ?></option>
<?php endforeach; ?>
    </select>
    <ol>
<?php
$i = 0;
foreach ($photos2 as $photo):
$i++;
?>
        <li>
            <p>
                第 <?php echo $i; ?> 名、說讚的人共有 <a href="<?php echo $photo["link"]; ?>" target="_blank"><?php echo $photo["likes_total"]; ?></a> 位
            </p>
            <img src="<?php echo $photo["image_url"]; ?>" class="thumbnail">
            <span class="large-photo-url"><?php echo $photo["large_image_url"]; ?></span>
        </li>
<?php endforeach; ?>
    </ol>
</body>
</html>
<!-- <?php echo ($has_cache) ? "From APC Cache" : ""; ?> -->
