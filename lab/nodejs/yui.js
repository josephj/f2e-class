#!/usr/bin/env node

var sys   = require("sys"),
    http  = require("http"),
    YUI   = require("/usr/local/lib/node_modules/yui3").YUI,
    DEBUG = true;

YUI({debug: DEBUG}).use("base", "nodejs-dom", "node", function (Y) {
    Y.log("Loaded first instance..");
    var docType = '<!DOCTYPE html>' + "\n";
    http.createServer(function (req, res) {
        YUI({debug: DEBUG}).use("nodejs-dom", "node", function (Page) {
            Page.one("title").set("innerHTML", "Test Page: " + (new Date()));
            Page.one("body").append("<p>This is a test</p>");
            res.writeHead(200, {"Content-Type": "text/html"});
            var out = docType + Page.one("doc").get("outerHTML");
            res.write(out);
            res.close();
            Page.log("PAGE: Serving Page");
        });
    }).listen(1337);
    Y.log("Server running at http://127.0.0.1:1337/");
});
