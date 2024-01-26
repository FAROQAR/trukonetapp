/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */

var base_url = window.location.origin;
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