<!-- #relate-link 相關連結模組 (開始) -->
<?php
$data = array(
    "HTML" => array(
        array(
            "text" => "HTML 模組",
            "href" => "lab/html/module.html",
        ),
    ),
    "CSS" => array(
        array(
            "text" => "YUI Reset",
            "href" => "lab/css/reset.html",
        ),
        array(
            "text" => "YUI Fonts",
            "href" => "lab/css/font.html",
        ),
        array(
            "text" => "YUI Grids",
            "href" => "lab/css/grids.html",
        ),
        array(
            "text" => "YUI Buttons",
            "href" => "lab/css/button.html",
        ),
    ),
    "JavaScript" => array(

    ),
    "YUI" => array(
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
);
?><div id="relate-link">
    <div class="mod-content">
        <div class="hd">
            <h2>隨堂練習</h2>
        </div>
        <div class="bd">
<?php foreach ($data as $category => $links): ?>
            <h3><?php echo $category; ?></h3>
            <ul>
<?php     foreach ($links as $link): ?>
                <li>
                    <a href="<?php echo $link["href"]; ?>" target="_blank"><?php echo $link["text"]; ?></a>
                </li>
<?php     endforeach; ?>
            </ul>
<?php endforeach; ?>
        </div>
    </div>
</div>
<!-- #relate-link 相關連結模組 (結束) -->
