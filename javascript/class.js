window.onerror = function () {
    return false;
};
YUI({skin:"night", fetchCSS: false}).use(
    "node-menunav",
    "gallery-node-accordion",
    "event-delegate",
    "cookie",
    function (Y) {
        var node = Y.one("#nav");
        var iframe = Y.one("#slide iframe");
        node.plug(Y.Plugin.NodeMenuNav);
        var accordionNode = Y.one("#relate-link .bd");
        accordionNode.plug(Y.Plugin.NodeAccordion);
        accordionNode.delegate("click", function (e) {
            if (!this.ancestor(".yui3-accordion-item").hasClass("yui3-accordion-item-active")) {
                return;
            }
            Y.Cookie.set("selected", this.get("href").split("#")[1], {
                 expires: new Date("January 12, 2025")
            });
            Y.Cookie.set("slide_id", this.getAttribute("data-slide"), {
                 expires: new Date("January 12, 2025")
            });
        }, ".yui3-accordion-item-trigger a");

        Y.delegate("click", function (e) {
            e.preventDefault();
            iframe.set("src", "https://www.slideshare.net/slideshow/embed_code/" + this.get("id") + "?rel=0");
        }, "#relate-link", ".slide-link");

    }
);
