<!-- #relate-link 相關連結模組 (開始) -->
<?php
$selected = (isset($_COOKIE["selected"]) && $_COOKIE["selected"] !== "") ? $_COOKIE["selected"] : "";
$data = array(
    "intro" => array(
        "text" => "盤古開天 - Intro",
        "slide_id" => "14734059",
        "items" => array(
            array(
                "text" => "載入投影片",
                "id"   => "14734059",
                "href" => "#show-slide",
                "class" => "slide-link",
                "answer" => FALSE,
            ),
            array(
                "text" => "軟體安裝",
                "href" => "/software.php",
                "answer" => FALSE,
            ),
        ),
    ),
    "html" => array(
        "text" => "基本架構 - HTML",
        "slide_id"   => "14701114",
        "items" => array(
            array(
                "text" => "載入投影片",
                "id"   => "14701114",
                "href" => "#show-slide",
                "class" => "slide-link",
                "answer" => FALSE,
            ),
            array(
                "text" => "練習：將一篇文章套版",
                "href" => "lab/html/history.html",
            ),
            array(
                "text" => "練習：製作一個 HTML 模組",
                "href" => "lab/html/module.html",
            ),
            array(
                "text" => "示範：表單撰寫",
                "href" => "lab/html/form.html",
            ),
            array(
                "text" => "練習：撰寫相簿存檔表單",
                "href" => "lab/html/save_form.html",
            ),
            array(
                "text" => "練習：撰寫相簿照片列表",
                "href" => "lab/html/list.phps",
            ),
            array(
                "text" => "延伸閱讀：Dive Into Accessibility",
                "href" => "http://dia.z6i.org/",
                "answer" => FALSE,
            ),
        ),
    ),
    "css" => array(
        "text" => "樣式之美 - CSS",
        "slide_id" => "14701189",
        "items" => array(
            array(
                "text" => "載入投影片",
                "id"   => "14701189",
                "href" => "#show-slide",
                "class" => "slide-link",
                "answer" => FALSE,
            ),
            array(
                "text" => "練習：float 浮動",
                "href" => "lab/css/float.html",
            ),
            array(
                "text" => "練習：background 背景",
                "href" => "lab/css/background.html",
            ),
            array(
                "text" => "練習：CSS Hack",
                "href" => "lab/css/css-hack.html",
            ),
            array(
                "text" => "練習：Module",
                "href" => "lab/css/module.html",
            ),
            array(
                "text" => "練習：Bootstrap",
                "href" => "lab/css/bootstrap.html",
            ),
            array(
                "text" => "練習：position 定位",
                "href" => "lab/css/position.html",
            ),
            array(
                "text" => "練習：YUI Reset",
                "href" => "lab/css/reset.html",
            ),
            array(
                "text" => "練習：YUI Base",
                "href" => "lab/css/base.html",
            ),
            array(
                "text" => "參考：960 Grid System",
                "href" => "http://960.gs/",
                "answer" => FALSE,
            ),
            array(
                "text" => "參考：YUI3 CSS Grid",
                "href" => "http://yuilibrary.com/yui/docs/cssgrids/",
                "answer" => FALSE,
            ),
            array(
                "text" => "參考：YUI Grids Builder",
                "href=" => "http://developer.yahoo.com/yui/grids/builder/",
                "answer" => FALSE,
            ),
            array(
                "text" => "練習：YUI 2 Grids",
                "href" => "lab/css/grids.html",
            ),
            array(
                "text" => "練習：YUI Buttons",
                "href" => "lab/css/button.html",
            ),
            array(
                "text" => "Compass 範例下載",
                "href" => "lab/css/compass.zip",
                "answer" => FALSE,
            ),
            array(
                "text" => "練習：Compass - No Sprite",
                "href" => "lab/css/compass/normal.html",
                "answer" => FALSE,
            ),
            array(
                "text" => "練習：Compass - Sprite",
                "href" => "lab/css/compass/basic-sprite.html",
                "answer" => FALSE,
            ),
            array(
                "text" => "練習：Compass - Auto Sprite",
                "href" => "lab/css/compass/auto-sprite.html",
                "answer" => FALSE,
            ),
        ),
    ),
    "javascript" => array(
        "text" => "賦予生命 - JavaScript",
        "slide_id"   => "14734172",
        "items" => array(
            array(
                "text" => "載入投影片",
                "id"   => "14734172",
                "href" => "#show-slide",
                "class" => "slide-link",
                "answer" => FALSE,
            ),
        ),
    ),
    "yui" => array(
        "text" => "功力大增 - YUI",
        "slide_id" => "14721701",
        "items" => array(
            array(
                "text" => "載入投影片",
                "id"   => "14721701",
                "href" => "#show-slide",
                "class" => "slide-link",
                "answer" => FALSE,
            ),
            array(
                "text" => "Y.jsonp",
                "href" => "lab/yui/jsonp.html",
            ),
            array(
                "text" => "Y.io",
                "href" => "lab/yui/io.html",
            ),
            array(
                "text" => "Y.MenuNav",
                "href" => "lab/yui/menunav.html",
            ),
            array(
                "text" => "Y.Button",
                "href" => "lab/yui/button.html",
            ),
            array(
                "text" => "Y.Panel",
                "href" => "lab/yui/panel.html",
            ),
        ),
    ),
    "yui-advance" => array(
        "text" => "功力大增 - YUI",
        "slide_id" => "14721701",
        "items" => array(
            array(
                "text" => "載入投影片(同上一堂課)",
                "id"   => "14721701",
                "href" => "http://www.slideshare.net/secret/FA2dV3uwmXtkwb",
                "class" => "slide-link",
                "answer" => FALSE,
            ),
            array(
                "text" => "Y.jsonp",
                "href" => "lab/yui/jsonp.html",
            ),
            array(
                "text" => "Y.io",
                "href" => "lab/yui/io.html",
            ),
            array(
                "text" => "Y.MenuNav",
                "href" => "lab/yui/menunav.html",
            ),
            array(
                "text" => "Y.Button",
                "href" => "lab/yui/button.html",
            ),
            array(
                "text" => "Y.Panel",
                "href" => "lab/yui/panel.html",
            ),
        ),
    ),
    "debugging" => array(
        "text" => "自我省視 - Debug / Performance",
        "slide_id" => "14768361",
        "items" => array(
            array(
                "text" => "載入投影片",
                "id"   => "14768361",
                "href" => "#show-slide",
                "class" => "slide-link",
                "answer" => FALSE,
            ),
            array(
                "text" => "Chrome Develoepr 的 Breakpoints 教學",
                "href" => "https://developers.google.com/chrome-developer-tools/docs/scripts-breakpoints",
                "answer" => FALSE,
            ),
        ),
    ),
    "nodejs" => array(
        "text" => "飛鴿傳書 - Node.js",
        "slide_id" => "14734167",
        "items" => array(
            array(
                "text" => "載入投影片",
                "id"   => "14734167",
                "href" => "#show-slide",
                "class" => "slide-link",
                "answer" => FALSE,
            ),
        ),
    ),
    "html5" => array(
        "text"  => "放眼未來 - HTML5",
        "slide_id" => "14734167",
        "items" => array(
        ),
    ),
);
?><div id="relate-link">
    <div class="mod-content">
        <div class="hd">
            <h2>連結列表</h2>
        </div>
        <div class="bd yui3-accordion">
<?php
      $i = 0;
      foreach ($data as $key => $info):
          $class = ($key === $selected) ? " yui3-accordion-item-active item-$key" : " item-$key";
?>
            <div class="yui3-accordion-item<?php echo $class; ?>">
                <div class="yui3-accordion-item-hd">
                    <h3 class="yui3-accordion-item-trigger">
                        <a href="#<?php echo $key; ?>" data-slide="<?php echo $info["slide_id"]; ?>"><?php echo $info["text"]; ?></a>
                    </h3>
                </div>
                <div class="yui3-accordion-item-bd">
                    <ul>
<?php
          foreach ($info["items"] as $link):
              $class = isset($link["class"]) ? " class=\"{$link["class"]}\"" : "";
              $id = isset($link["id"]) ? " id=\"{$link["id"]}\"" : "";
              $answer = (isset($link["answer"]) && intval($link["answer"]) === 0) ? FALSE : TRUE;
              if ($answer) :
                  $parts = pathinfo($link["href"]);
                  $extension = str_replace("phps", "php", $parts["extension"]);
                  $answer = "{$parts["dirname"]}/{$parts["filename"]}-answer.{$extension}";
                  $target = ($answer) ? "lab" : "_blank";
              endif;

?>
                        <li>
                            <a href="<?php echo $link["href"]; ?>"<?php echo $id; ?><?php echo $class; ?> target="<?php echo $target; ?>"><?php echo $link["text"]; ?></a>
<?php         if ($answer): ?>
                            <span class="answer">(<a href="<?php echo $answer; ?>" target="_blank">解答</a>)</span>
<?php         endif; ?>
                        </li>
<?php     endforeach; ?>
                    </ul>
                </div>
            </div>
<?php endforeach; ?>
        </div>
    </div>
</div>
<!-- #relate-link 相關連結模組 (結束) -->
