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
<title>Flickr - 照片列表</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/3.7.2/build/cssreset/reset-min.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/3.7.2/build/cssfonts/fonts-min.css">
<style>
.clearfix {
    zoom: 1;
}
.clearfix:after {
    content: "";
    clear: both;
    display: block;
}
#photo-list ul {
    margin: 0 auto;
}
#photo-list li {
    overflow: hidden;
    float: left;
    display: inline-block;
    margin: 0 5px 5px 0;
}
#photo-list li .photo {
    background: #000;
    border: solid 1px #ccc;
    width: 240px;
    height: 240px;
}
#photo-list li .photo * {
    vertical-align: middle;
}
</style>
</head>
<body>
    <div id="photo-list">
        <div class="mod-content">
            <div class="bd">
                <ul class="clearfix">
<?php
      foreach ($photos as $photo):
          $img = "http://farm{$photo->farm}.staticflickr.com/{$photo->server}/{$photo->id}_{$photo->secret}_m.jpg";
          $title = $photo->title;
?>
                    <li>
                        <div class="photo">
                            <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>" width="240">
                            <div class="title"><?php echo $title; ?></div>
                        </div>
                    </li>
<?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
