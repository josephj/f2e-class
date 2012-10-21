<?php
$slide_id = (isset($_COOKIE["slide_id"]) && $_COOKIE["slide_id"] !== "") ? $_COOKIE["slide_id"] : "14734059";
$embed_url = "https://www.slideshare.net/slideshow/embed_code/$slide_id?rel=0";
?><!-- #slide (start) -->
<div id="slide">
    <div class="hd clearfix">
        <h2>課程投影片</h2>
        <span>
            <a href="http://www.flickr.com/photos/tags/yzu/interesting/" class="load-link">載入投影片</a>
        </span>
    </div>
    <div class="bd">
        <div class="player">
            <iframe src="<?php echo $embed_url; ?>" allowfullscreen></iframe>
            <div class="info">
                 投影片製作 By <a href="http://www.slideshare.net/josephj" target="_blank">Joseph Chiang</a>
            </div>
        </div>
    </div>
</div>
<!-- #slide (end) -->
