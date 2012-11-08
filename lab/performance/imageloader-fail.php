<?php
$url = "http://f2eclass.com/service/?method=getPhotoList";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
$photos = json_decode($data);
curl_close($ch);
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>YUI - ImageLoader 工具</title>
<link rel="stylesheet" href="/stylesheets/normalize.css">
<style>
body {
    text-align: center;
}
.photo-content {
    background-color: #ccc;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    display: inline-block;
    height: 240px;
    margin: 0 10px 10px 0;
    width: 240px;
}
.photo-content img {
    display: block;
    height: 240px;
    overflow: hidden;
    width: 240px;
    visibility: hidden;
}
.yui3-imageloader-image {
}
</style>
<body>
    <h1>YUI - ImageLoader 工具</h1>
    <p>ImageLoader 工具能夠有效減少相簿的圖片請求數量。</p>
<?php
      foreach ($photos as $photo):
          $img = "http://farm{$photo->farm}.staticflickr.com/{$photo->server}/{$photo->id}_{$photo->secret}_m.jpg";
          $title = $photo->title;
?>
    <div class="photo-content">
        <img url="<?php echo htmlspecialchars($img); ?>" style="visibility:hidden;" class="yui3-imageloader-image">
    </div>
<?php endforeach; ?>
    <script type="text/javascript" src="http://yui.yahooapis.com/3.7.2/build/yui/yui-min.js"></script>
    <script>
    YUI().use("node", "imageloader", function (Y) {
        var foldGroup = new Y.ImgLoadGroup({
            name: "foldGroup",
            foldDistance: 100,
            className: "yui3-imageloader-image",
            classNameAction: "enhanced"
        });
    });
    </script>

</body>
</html>
