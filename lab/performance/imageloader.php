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
div {
    background-color: #ccc;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    display: inline-block;
    height: 240px;
    margin: 0 10px 10px 0;
    width: 240px;
}
/*
   Step 1:

   請給定一個共用的 Class Name (例如 .photo-link)
   並設定 background: none !important; 預設不顯示任何圖片
*/

</style>
<body>
    <h1>YUI - ImageLoader 工具</h1>
    <p>ImageLoader 工具能夠有效減少相簿的圖片請求數量。</p>
    <!--
        Step 2:

        將 img 標籤移除，改成 div 標籤
        請設定 Step 1 中共用的 Class Name (例如 photo-link)
        並用 Inline Style 的 background-image 屬性將圖檔帶入
        style="background-image: url(<?php echo $img; ?>);"
        <div class=""
             style="">
        </div>
    -->
<?php
      foreach ($photos as $photo):
          $img = "http://farm{$photo->farm}.staticflickr.com/";
          $img.= "{$photo->server}/{$photo->id}_{$photo->secret}_m.jpg";
?>
    <img src="<?php echo $img; ?>" width="240" height="240">
<?php endforeach; ?>
    <script type="text/javascript" src="http://yui.yahooapis.com/3.7.2/build/yui/yui-min.js"></script>
    <script>
    // Step 3: 請 YUI().use "imageloader" 這個模組

        // Step 4: 建立一個 Y.ImgLoadGroup 的 Instance
        //         設定 foldDistance (距離) 屬性及 className (共用 ClassName) 屬性

    </script>

</body>
</html>
