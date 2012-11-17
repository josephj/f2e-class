var http = require("http");

http.createServer(function (req, res) {
    res.setHeader("Content-Type", "text/html");
    res.write("Hello World!");
    res.end();
}).listen(1337);

console.log("Server running at http://localhost:1337");
