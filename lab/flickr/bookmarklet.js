/*global window, document, YUI */
(function () {

    var _panel,       // Y.Panel 的 Instance
        _data,
        _createPanel, // 建立 Panel 的函式
        _getPhoto,    // 取得頁面上最大張照片
        _init,
        _loadSeed,    // 下載 YUI Seed JavaScript
        _savePhoto,   // 將照片儲存起來
        _Y;

    /**
     * 在 YUI Seed 下載完後，執行 YUI().use 並建立 Panel
     */
    _createPanel = function (callback) {        
        callback = callback || function () {};
        YUI().use("node-base", "jsonp", "panel", function (Y) {
            Y.one("body").addClass("yui3-skin-sam");
            _panel = new Y.Panel({
                render: true,
                visible: false,
                centered: true,
                width: 400,
                height: 400,
                zIndex: 2,
                buttons: [
                    {
                        value: "確認",
                        action: function (e) {
                            e.preventDefault();
                            _panel.hide();
                            _savePhoto();
                        },
                        section: Y.WidgetStdMod.FOOTER
                    },
                    {
                        value: "取消",
                        action: function (e) {
                            e.preventDefault();
                            _panel.hide();
                        },
                        section: Y.WidgetStdMod.FOOTER
                    }
                ]
            });
            window.Y = Y;
            callback();
        });
    };

    /**
     * 下載 YUI Seed (此時還沒有 Y 可供使用)
     */
    _loadSeed = function (callback) {
        var el;
        el = document.createelement("script");
        el.src = "http://yui.yahooapis.com/3.7.2/build/yui/yui-min.js";
        el.type = "text/javascript";
        el.onload = callback;
        document.getelementsbytagname("head")[0].appendchild(el);
    };

    /**
     * 取得頁面上最大張的照片 (此時已經有 Y 可供使用)
     */
    _getPhoto = function () {
        Y.log("_getPhoto() is executed.");
        var nodes = Y.all("img"),
            offset = 0,
            largestSize = 0,
            url,
            title,
            h1;

        if (!nodes.size()) {
            // 沒有圖片，回傳 false
            return false;
        }

        // 從所有圖片中找出最大張的
        Y.each(nodes, function (node, i) {
            var size = node.width * node.height;
            if (largestSize < size) {
                largestSize = size;
                offset = i;
            }
        });

        // 取得圖檔路徑
        url = nodes.item(offset).get("src");

        // 取得標題
        title = "";
        if (Y.one("h1")) {
            h1 = Y.one("h1");
            title = (h1.get("textContent")) ? h1.get("textContent") : h1.get("innerText");
        }

        return {
            url   : url,
            title : title
        };
    };

    /**
     * 將圖片儲存到伺服器上
     */
    _savePhoto = function (o, callback) {
        Y.log("_savePhoto() is executed.");
        var msg, url;
        o = o || _data;
        if (!o.url) {
            return false;
        }

        callback = callback || function () {
            window.alert("儲存完畢");
        };

        url = [
            "http://f2eclass.com/service/?method=saveURL",
            "url=" + encodeURIComponent(o.url),
            "title=" + encodeURIComponent(o.title),
            "callback={callback}"
        ].join("&");
        Y.jsonp(url, callback);
    };

    _init = function () {
        console.log("_init() is executed.");
        _createPanel(function () {
            Y.log("The callback function of _createPanel() is executed.");
            var photo = _getPhoto();
            if (!photo) {
                alert("找不到圖檔、請到別的頁面試試看。");
                return;
            }
            _panel.set("bodyContent", [
                '<form>',
                '    <div class="row">'
                '        <label>Title</label>',
                '        <input type="text" name="url" value="' + photo.url + '">',
                '    </div>',
                '    <div class="row">',
                '        <label>URL</label>',
                '        <span>' + photo.url + '</span>'
                '        <input type="hidden" name="url" value="' + photo.url + '">',
                '    </div>',
                "圖檔路徑為：" + photo.url,
                "圖檔標題為：" + photo.title,
                "您確定要存到 F2E 的相簿中嗎？"
            ].join("<br>"));
            _data = photo;
            _panel.show();
        });
    };

    if (typeof window.Y !== "undefined") {
        _init();
    } else {
        _loadSeed(_init);
    }

}());
