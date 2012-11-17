var http = require("http"),
    url  = require("url"),
    qs   = require("querystring");
httpServer = http.createServer(function (request, response) {
    var callback = qs.parse(url.parse(request.url).query).callback; // 取得 callback GET 參數
    setTimeout(function () { //  3 秒後（只是為了達成等待的效果）就輸出 JSONP 格式，可以想成每一段時間就去 DB 或 memcache 查詢。
        var text = callback + "({'result': 'Server said " + parseInt(new Date().getTime(), 10) + "'});";
        response.write(text);
        response.end(); // 結束連線。
    }, 3000);
    response.writeHead(200, {"Content-Type": "text/javascript"});
}).listen(1387);
