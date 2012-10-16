window.onerror = function () {
    return false;
};
YUI({skin:"night", fetchCSS: false}).use(
    "node-menunav",
    "gallery-node-accordion",
    "event-delegate",
function (Y) {
    var node = Y.one("#nav");
    var iframe = Y.one("#slide iframe");
    node.plug(Y.Plugin.NodeMenuNav);
    Y.one("#relate-link .bd").plug(Y.Plugin.NodeAccordion);

    Y.delegate("click", function (e) {
        e.preventDefault();
        iframe.set("src", "https://www.slideshare.net/slideshow/embed_code/" + this.get("id") + "?rel=0");
        iframe.ancestor(".player").one(".site-link").set("href", this.get("href"));
    }, "#relate-link", ".slide-link");

});
