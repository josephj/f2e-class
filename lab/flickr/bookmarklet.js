(function () {
    var images = document.images,
        largestOffset = 0,
        largestSize = 0;

    if (!images.length) {
        alert("沒有照片！");
        return;
    }

    for (var i = 0, j = images.length; i < j; i ++) {
        var size = images[i].width * images[i].height;
        if (largestSize < size) {
            largestSize = size;
            largestOffset = i;
        }
    }

    var url = images[largestOffset].getAttribute("src");
    var title = "";
    if (document.getElementsByTagName("h1")[0]) {
        var h1 = document.getElementsByTagName("h1")[0];
        if (h1) {
            title = (h1.textContent) ? h1.innerText : h1.innerText;
        }
    }

    if (!url) {
        alert("圖檔無法儲存！請嘗試別頁！");
        return false;
    }

    var msg = [
        "圖檔路徑為：" + url,
        "圖檔標題為：" + title,
        "\n您確定要存到到 F2E 的相簿中嗎？"
    ].join("\n");

    if (!confirm(msg)) {
        return false;
    }

    var request = [
        "http://f2eclass.com/service/?method=saveURL",
        "url=" + encodeURIComponent(url),
        "title=" + encodeURIComponent(title),
        "callback=bookmarkCallback"
    ].join("&");

    var scriptEl = document.createElement("script");
    scriptEl.src = request;
    document.getElementsByTagName("head")[0].appendChild(scriptEl);

    window.bookmarkCallback = function (o) {
        alert("儲存完畢");
    };

}());
