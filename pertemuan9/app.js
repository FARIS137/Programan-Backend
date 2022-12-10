
const  {index, store, update, destroy} = require("./FruitController.js");

const main = () => {
console.log("Method index - menampilkan Buah");
index();
console.log("\nMethod store - Menambahkan buah pisang");
store("pisang");
console.log("\nMethod update - update data 0 menjadi kelapa");
update(0,"kelapa");
console.log("\nMethod destroy - menghapus data 0");
destroy(0);
};

main();
