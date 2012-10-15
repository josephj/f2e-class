// 透過 require 將外部 JavaScript 載入
var mod = require("./commonjs-module.js");

// mod.foo(); // 未定義的函式！
mod.bar();
