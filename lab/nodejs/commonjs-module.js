var foo = function () {
    console.log("foo is invoked");
};

// 所有要被外部存取的方法或屬性都需要用 exports
exports.bar = function () {
    console.log("bar is invoked");
};
