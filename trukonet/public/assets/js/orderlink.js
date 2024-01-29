/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */

$(document).ready(function () {
    var app = {
        show: function () {
            $.ajax({
                url: base_url + "/loadpaketcombo",
                method: "GET",
                success: function (response) {
                    $("#customer_reg_paket").html(response.data)
                }
            });
            $.ajax({
                url: base_url + "/loadakecamatancombo",
                method: "GET",
                success: function (response) {
                    $("#customer_reg_kecamatan").html(response.data)
                }
            });
        }
    }
    app.show();
    

});

$('#customer_reg_kecamatan').on('change', function(){
    var kec = $(this).val();
    $.ajax({
        url: base_url + "/loadadesacombo",
        method: "GET",
        data:{
            query:kec
        },
        success: function (response) {
            $("#customer_reg_desa").html(response.data)
        }
    });
   });
   $('#customer_reg_desa').on('change', function(){
    var kec = $(this).val();
    $.ajax({
        url: base_url + "/loadadusuncombo",
        method: "GET",
        data:{
            query:kec
        },
        success: function (response) {
            $("#customer_reg_dusun").html(response.data)
        }
    });
   });   
   $('#customer_reg_dusun').on('change', function(){
    var kec = $(this).val();
    var cd = document.getElementById('customer_reg_area_code');
    cd.textContent=kec;
    // console.log(cd);
    // setText('#customer_reg_area_code',kec);    
   });   
$(function () {
    $("#jsGridOrderlink").jsGrid({
        height: "auto",
        width: "100%",

        sorting: true,
        paging: true,
        autoload: true,
        pageLoading: true,
        pageSize: 10,
        pageIndex: 1,

        controller: {
            loadData: function (filter) {
                //                var base_url = window.location.origin;
                var d = $.Deferred();
                $.ajax({
                    url: base_url + "/loadOrderlink",
                    data: filter,
                    dataType: "json",
                    success: function (response) {
                        var ret = {
                            data: response.data,
                            itemsCount: response.totalCount
                        };
                        d.resolve(ret);
                    }
                });

                return d.promise();
            }
        },
        fields: [
            {
                type: "control", width: 100, editButton: false, deleteButton: false,
                itemTemplate: function (value, item) {
                    var $result = jsGrid.fields.control.prototype.itemTemplate.apply(this, arguments);
                    var $iconPencil = $("<i>").attr({ class: "fa fa-pencil-alt" });
                    var $iconTrash = $("<i>").attr({ class: "fa fa-trash" });
                    var $iconSearch = $("<i>").attr({ class: "fa fa-search" });

                    var $customEditButton = $("<button>")
                        .attr({ class: "btn btn-outline-primary btn-xs", style: "margin-right: 3px;" })
                        .attr({ role: "button" })
                        .attr({ title: jsGrid.fields.control.prototype.editButtonTooltip })
                        .attr({ id: "btn-edit-order-" + item.id })
                        .click(function (e) {
                            //                                alert("Edit: " + item.kode_bma);
                            showEditOrderlink(item);
                            // document.location.href = item.id + "/edit";
                            e.stopPropagation();
                        })
                        .append($iconPencil);
                    var $customDeleteButton = $("<button>")
                        .attr({ class: "btn btn-outline-danger btn-xs", style: "margin-right: 3px;" })
                        .attr({ role: "button" })
                        .attr({ title: jsGrid.fields.control.prototype.deleteButtonTooltip })
                        .attr({ id: "btn-delete-order-" + item.id })
                        .click(function (e) {
                            alert("Delete: " + item.kode_bma);
                            // document.location.href = item.id + "/delete";
                            e.stopPropagation();
                        })
                        .append($iconTrash);
                    var $customSwitchButton = $("<button>")
                        .attr({ class: "btn btn-outline-warning btn-xs", style: "margin-right: 3px;" })

                        .attr({ role: "button" })
                        .attr({ title: "Detail" })
                        .attr({ id: "btn-detail-order-" + item.id })
                        .click(function (e) {
                            //                                alert("Detail: " + item.kode_bma);
                            var modal = document.getElementById("orderlinkdetail-modal");
                            var judul = document.getElementById("orderlinkdetail-modal-title");
                            judul.innerHTML = item.kode_bma;
                            modal.style.display = "block";

                            e.stopPropagation();
                        })
                        .append($iconSearch);

                    return $("<div>")
                        .append($customSwitchButton)
                        .append($customEditButton)
                        .append($customDeleteButton);

                }
            },
            { title: 'NO', name: 'counter', soritng: false, width: 65 },
            { title: 'ID', name: 'no', soritng: false, width: 50 },
            { title: 'NAMA', name: 'nama', soritng: false, width: 200 },
            { title: 'KONTAK', name: 'kontak', soritng: false, width: 130 },
            { title: 'DESA', name: 'desa', soritng: false, width: 100 },
            { title: 'DUSUN', name: 'dusun', soritng: false, width: 100 },
            { title: 'RT/RW', name: 'rtrw', soritng: false, width: 100 },
            { title: 'AREA CODE', name: 'areacode', soritng: false, width: 100 },
            { title: 'PAKET', name: 'paket', soritng: false, width: 100 },
            { title: 'IDPEL', name: 'idpel', soritng: false, width: 130 },
            { title: 'ODP', name: 'odp', soritng: false, width: 100 },
            { title: 'MODEM SN', name: 'modemsn', soritng: false, width: 130 },
            
            // { title: 'TGL ON', name: 'tgl on', soritng: false, width: 100 },

        ]
    });

});

// $('#tglpembentukan').datetimepicker({ format: 'DD-MM-YYYY' });
// $("#jsGridOrderlink").
function showAddOrderLink() {
    //    var list = getComp('formbmalisttitle');
    //    console.log(list);
    hideComp('orderlinklist');
    showComp('cardregisterlist');
    setText('btnSimpanregister', 'Simpan');
    setText('formregisterlisttitle', 'Register');
    resetForm('formregisterlist');
    $.ajax({
        url: base_url + "/loadregisteradd",
        //                    data: filter,
        dataType: "json",
        success: function (response) {
           
            // idpel = ret.data.idpel;
            setText('customer_reg_id', response.data.id);
            setText('customer_reg_no_reg', response.data.no_reg);

        }
    });
   


}
;

function showEditOrderlink(data) {
    //    var list = getComp('bmalist');
    //    console.log('disini');
    hideComp('orderlinklist');
    showComp('cardorderlinklist');
    // setText('btnSimpanOrderlink', 'Edit');
    // setText('formorderlinktitle', 'Edit Bumdesma');
    console.log(data);
    setValue('nomororderlink', data.no);
    setValue('idpelorderlink', data.idpel);
    setValue('namaorderlink', data.nama);
    setValue('alamatorderlink', data.desa + ', ' + data.dusun + ' ' + data.rtrw);
    setValue('telporderlink', data.kontak);
    setValue('paketorderlink', data.paket==1?'5 Mbps':data.paket==2?'10 Mbps':data.paket==3?'20 Mbps':'');
    setValue('modemsnorderlink', data.modemsn);
    
    
    
    //    resetForm('formbmalist');
    //    $('#formbmalist').get(0).reset();
}
;
function batalAddOrderlink() {
    // var frm = getComp('cardorderlinklist');
    // frm.style.display="none";
    hideComp('cardorderlinklist');
    showComp('orderlinklist');
}
;
function batalAddregister(){
    hideComp('cardregisterlist');
    showComp('orderlinklist');
}

function simpanAddOrderLink(id, text) {
    alert(text);
}
;
$("#customer_reg_kontak").on("input", function (e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,15})/);
    e.target.value = x[1];
});
$("#customer_reg_no_ktp").on("input", function (e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,20})/);
    e.target.value = x[1];
});
$("#customer_reg_rt_rw").on("input", function (e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,2})/);
    e.target.value = !x[2] ? x[1] : x[1] + '/' + x[2];
});
function getTextOrder(id){
    var cmp=document.getElementById(id);
    return cmp.textContent;
}
function simpanRegister(){
    var vid = document.getElementById("#customer_reg_id");
    var vno_reg = document.getElementById("#customer_reg_no_reg");
    var varea_code = document.getElementById("#customer_reg_area_code");
   
    // var formData = {
    //     id:vid.textContent,
    //     no_reg:vno_reg.textContent,
    //     nama:("#customer_reg_nama").val(),
    //     no_ktp:("#customer_reg_no_ktp").val(),
    //     kontak:("#customer_reg_kontak").val(),
    //     kecamatan:("#customer_reg_kecamatan").val(),
    //     desa:("#customer_reg_desa").val(),
    //     dusun:("#customer_reg_dusun").val(),
    //     rt_rw:("#customer_reg_rt_rw").val(),
    //     paket:("#customer_reg_paket").val(),
    //     area_code:varea_code.textContent,
    //     cmd: $("#btnSimpanOdp").text() +"reg",
    // };
    // $.ajax({
    //     // fixBug get url from global function only
    //     // get global variable is bug!
    //     url: base_url + "/setRegister",
    //     type: 'post',
    //     data: formData,
    //     cache: false,
    //     dataType: 'json',
    //     //   beforeSend: function() {
    //     //     $('#form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
    //     //   },
    //     success: function (response) {
    //         console.log(response);
    //         if (response.success === true) {
    //             // console.log(response.message);

    //             Swal.fire({
    //                 // position: "top-end",
    //                 icon: "success",
    //                 title: response.message,
    //                 // showConfirmButton: false,
    //                 // timer: 1500
    //             }).then((result) => {
    //                 batalAddregister(); 
    //                 // $("#jsGridOdp").jsGrid("search", { query: '' }).done(function () {
                        
    //                 // });
    //             });
                

    //         } else {
    //             Swal.fire({
    //                 toast: false,
    //                 //   position: 'bottom-end',
    //                 icon: 'error',
    //                 title: response.message,
    //                 //   showConfirmButton: false,
    //                 timer: 3000
    //             })

    //         }
    //         // $('#form-btn').html(getSubmitText());
    //     }
    // });
}
$("#formregisterlist").on("submit", function (event) {
    var vid = document.getElementById("#customer_reg_id");
    var vno_reg = document.getElementById("#customer_reg_no_reg");
    var varea_code = document.getElementById("#customer_reg_area_code");
   
    var formData = {
        id:vid.textContent,
        no_reg:vno_reg.textContent,
        nama:("#customer_reg_nama").val(),
        no_ktp:("#customer_reg_no_ktp").val(),
        kontak:("#customer_reg_kontak").val(),
        kecamatan:("#customer_reg_kecamatan").val(),
        desa:("#customer_reg_desa").val(),
        dusun:("#customer_reg_dusun").val(),
        rt_rw:("#customer_reg_rt_rw").val(),
        paket:("#customer_reg_paket").val(),
        area_code:varea_code.textContent,
        cmd: $("#btnSimpanOdp").text() +"reg",
    };
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/setRegister",
        type: 'post',
        data: formData,
        cache: false,
        dataType: 'json',
        //   beforeSend: function() {
        //     $('#form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
        //   },
        success: function (response) {
            console.log(response);
            if (response.success === true) {
                // console.log(response.message);

                Swal.fire({
                    // position: "top-end",
                    icon: "success",
                    title: response.message,
                    // showConfirmButton: false,
                    // timer: 1500
                }).then((result) => {
                    batalAddregister(); 
                    // $("#jsGridOdp").jsGrid("search", { query: '' }).done(function () {
                        
                    // });
                });
                

            } else {
                Swal.fire({
                    toast: false,
                    //   position: 'bottom-end',
                    icon: 'error',
                    title: response.message,
                    //   showConfirmButton: false,
                    timer: 3000
                })

            }
            // $('#form-btn').html(getSubmitText());
        }
    });
    // alert("Handler for `submit` called.");
    event.preventDefault();
});

// var kontakreg = document.getElementById('customer_reg_kontak');
// // var myForm = document.forms.formregisterlist;
// // var result = document.getElementById('result');  // only for debugging purposes

// phoneInput.addEventListener('input', function (e) {
// //   var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
// //   e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
// var x = e.target.value.replace(/\D/g, '').match(/(\d{0,15})/);
// e.target.value = x[1];
// });

// myForm.addEventListener('submit', function(e) {
//   phoneInput.value = phoneInput.value.replace(/\D/g, '');
//   result.innerText = phoneInput.value;  // only for debugging purposes
  
//   e.preventDefault(); // You wouldn't prevent it
// });

