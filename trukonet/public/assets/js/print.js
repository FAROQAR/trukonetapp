const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
    window.print();
});
// var lama = 1000;
//             t = null;
//             function printOutLabel(){
//                 window.print();
//                 t = setTimeout("self.close()",lama);
//             }