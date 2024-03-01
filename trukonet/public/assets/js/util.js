/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */

var base_url = window.location.origin;
// var base_url_origin = window.location.origin+'/adminet';
// var base_url_hosting = 'https://adminet.my.id/truko';
function getComp(id){
    return document.getElementById(id);
}
function showComp(id){
    var cmp=document.getElementById(id);
    cmp.style.display="block";
}
function hideComp(id){
    var cmp=document.getElementById(id);
    cmp.style.display="none";
}

function setText(id,text){
    var cmp=document.getElementById(id);
    cmp.textContent=text;
}
function setValue(id,text){
    var cmp=document.getElementById(id);
    cmp.value=text;
}
function getText(id){
    var cmp=document.getElementById(id);
    return cmp.textContent;
}
function getSelectorText(id){
    var cmp=document.querySelector("#" + id);
    return cmp.textContent;
}
function getSelectorValue(id){
    var cmp=document.querySelector("#" + id);
    return cmp.value;
}
function getSelectorOptionText(id){
    var cmp=document.querySelector("#" + id);
    var retval = '';
    if(cmp.selectedOptions.length>0){
        retval =cmp.selectedOptions[0].text
    }
    
    return retval;
}
function getDate(id){
    var retval = $('#'+id).val();
    return retval;
}
function setValue(id,invalue){
    document.getElementById(id).value=invalue;
    
}

function resetForm(id){
    document.getElementById(id).reset();
}

/* Fungsi formatRupiah */
function intlFormatNumber(v,l){
    var retval=new Intl.NumberFormat(l).format(v);
    return retval;
}
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

function myEncrypt(msg) {
    var DataKey = CryptoJS.enc.Utf8.parse("01234567890123456789012345678901");
    var DataVector = CryptoJS.enc.Utf8.parse("1234567890123412");
    var ciphertext = CryptoJS.AES.encrypt(msg, DataKey, { iv: DataVector } ).toString();
    // console.log(ciphertext);
    return ciphertext;
}
function myDecrypt(ciphertext) {
    var DataKey = CryptoJS.enc.Utf8.parse("01234567890123456789012345678901");
    var DataVector = CryptoJS.enc.Utf8.parse("1234567890123412");
    var bytes = CryptoJS.AES.decrypt(ciphertext, DataKey, { iv: DataVector } );
    var originalText = bytes.toString(CryptoJS.enc.Utf8);
    // console.log(originalText);
    return originalText;
}