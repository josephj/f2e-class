var argv = process.argv,
    who = (typeof argv[2] !== "undefined") ? argv[2] : "World";

console.log("Hello " + who + "!");
