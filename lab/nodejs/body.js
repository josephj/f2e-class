var sys = require('sys'),
    YUI   = require("/usr/local/lib/node_modules/yui3").YUI;

YUI().use('nodejs-dom', 'node', 'event', function (Y) {
    var document = Y.Browser.document;
    var i = Y.Node.create('<i>asdf</i>');
    i.addClass('foo');
    Y.one('body').append(i);
});
