var YUI = require('yui').YUI,
    jsdom = require('jsdom'),
    document = jsdom.jsdom("<!DOCTYPE html><html><head><title></title></head><body><h1>Hello YUI!</h1></body></html>"),
    window = document.createWindow();

YUI({
    win: window,
    doc: document
}).use('node', function(Y) {

    Y.one('title').setHTML('YUI Server Side DOM');
    console.log(Y.one("body").getHTML());

});
