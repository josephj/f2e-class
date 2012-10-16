var http = require("http"),
    fs = require("fs");

// 必須採用 fs.readFile 將檔案讀入
fs.readFile("./html.html", function (err, html) {

    if (err) {
        throw err;
    }

    // 建立 Web 伺服器
    http.createServer(function (request, response) {
        response.writeHeader(200, {
            "Content-Type": "text/html"
        });
        response.write(html);
        response.end();
    }).listen(1337);

    console.log("Server running at http://f2eclass.com:1337");
});

