$(function () {
    $("#jsGridBillPending").jsGrid({
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
                    url: base_url + "/loadBillpending",
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
                    var $iconPayment = $("<i>").attr({ class: "fa fa-dollar-sign" });


                    var $customPayButton = $("<button>")
                        .attr({ class: "btn btn-success", style: "margin-right: 3px;" })
                        .attr({ role: "button" })
                        // .attr({title: jsGrid.fields.control.prototype.payButtonTooltip})
                        .attr({ id: "btn-payment-" + item.id_pelanggan })
                        .click(function (e) {
                            //    alert("Edit: " + item.id_pelanggan);
                            //     // showPayment(item);
                            //     // document.location.href = item.id + "/edit";
                            //     e.stopPropagation();
                            showPayment(item);

                            // var modal = document.getElementById("billpendingdetail-modal");
                            // // var judul = document.getElementById("billpendingdetail-modal-title");
                            // // judul.innerHTML = item.kode_server;
                            // modal.style.display = "block";

                            e.stopPropagation();
                        })
                        .append($iconPayment);

                    return $("<div>")
                        .append($customPayButton);

                }
            },
            // { title: 'ID', name: 'id', sorting: true, width: 100, visible: true },
            // { title: 'ID', name: 'id', sorting: true, width: 100 },
            // { title: 'NOUSER', name: 'nouser', sorting: true, width: 100 },
            { title: 'ID USER', name: 'id_pelanggan', sorting: true, width: 130 },
            { title: 'NAMA', name: 'nama', sorting: true, width: 200 },
            { title: 'ALAMAT', name: 'alamat', sorting: true, width: 200 },
            { title: 'KONTAK', name: 'kontak', sorting: true, width: 130 },
            // { title: 'KECAMATAN', name: 'kecamatan', sorting: true, width: 100 },
            // { title: 'DESA', name: 'desa', sorting: true, width: 100 },
            { title: 'DUSUN', name: 'dusun', sorting: true, width: 100 },
            { title: 'PAKET', name: 'paket', sorting: true, width: 100 },

            // { title: 'ODP', name: 'odp', sorting: true, width: 100 },
            // { title: 'MODEM SN', name: 'modem sn', sorting: true, width: 100 },
            { title: 'STATUS', name: 'status', sorting: true, width: 80 },
            { title: 'TGL_ON', name: 'tgl_on', sorting: true, width: 100 },
            { title: 'TARIF/BLN', name: 'tarif_bln', sorting: true, width: 100 },
            // { title: 'JML_HARI', name: 'jml_hari', sorting: true, width: 100 },
            { title: 'TARIF/HARI', name: 'tarif_hari', sorting: true, width: 100 },
            // { title: 'TANGGAL_AKHIR', name: 'tanggal_akhir', sorting: true, width: 100 },
            // { title: 'LAMA_PAKAI', name: 'lama_pakai', sorting: true, width: 100 },
            { title: 'TAGIHAN', name: 'tagihan', sorting: true, width: 100 },
            { title: 'BI.ADMIN', name: 'bi_admin', sorting: true, width: 100 },
            { title: 'TOTAL', name: 'total_tagihan', sorting: true, width: 100 },
            { title: 'THBL', name: 'thbl', sorting: true, width: 80 },
            { title: 'LUNAS', name: 'lunas', sorting: true, width: 80 },




        ]
    });



});


$(document).ready(function () {
    $("#billpendingcaritext").on("keyup", function () {
        var ret = $(this).val().toLowerCase();
        $("#jsGridBillPending").jsGrid("search", { query: ret }).done(function () {
            // console.log("filtering completed ");
        });
    });
});
function caribill() {
    var ret = $("#billpendingcaritext").val();

    $("#jsGridBillPending").jsGrid("search", { query: ret }).done(function () {
        // console.log("filtering completed " );
    });
}
function batalPayment() {
    hideComp('cardpaymentlist');
    showComp('billpendinglist');
}
;
function showPayment(data) {
    //    var list = getComp('bmalist');
    console.log(document.getElementById("id_pelanggan_payment"));
    // setText('id_pelanggan_payment', data.id_pelanggan);

    hideComp('billpendinglist');
    showComp('cardpaymentlist');

    setValue('id_pelanggan_payment', data.id_pelanggan);
    setText('nama_payment', data.nama);
    setText('alamat_payment', data.alamat + ", " + data.dusun);
    setText('paket_payment', (data.paket == 1 ? '5 Mbps' : data.paket == 2 ? '10 Mbps' : data.paket == 3 ? '20 Mbps' : ''));
    setText('tglon_payment', data.tgl_on);
    setText('thbl_payment', data.thbl);
    setText('tgl_awal_payment', data.tanggal_awal);
    setText('tgl_akhir_payment', data.tanggal_akhir);
    setText('tarifbulan_payment', intlFormatNumber(data.tarif_bln,'en-US'));
    setText('tagihan_payment', intlFormatNumber(data.tagihan,'en-US'));
    setText('bi_admin_payment', intlFormatNumber(data.bi_admin,'en-US'));
    setText('total_tagihan_payment', intlFormatNumber(data.total_tagihan,'en-US'));
    //    resetForm('formbmalist');
    //    $('#formbmalist').get(0).reset();
}
;
/* Fungsi formatRupiah */
// function intlFormatNumber(v,l){
//     var retval=new Intl.NumberFormat(l).format(v);
//     return retval;
// }
// function formatRupiah(angka, prefix) {
//     var number_string = angka.replace(/[^,\d]/g, '').toString(),
//         split = number_string.split(','),
//         sisa = split[0].length % 3,
//         rupiah = split[0].substr(0, sisa),
//         ribuan = split[0].substr(sisa).match(/\d{3}/gi);

//     // tambahkan titik jika yang di input sudah menjadi angka ribuan
//     if (ribuan) {
//         separator = sisa ? '.' : '';
//         rupiah += separator + ribuan.join('.');
//     }

//     rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
//     return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
// }

$("#formpaymentlist").on("submit", function (event) {
    var formData = {
        id_pelanggan: $("#id_pelanggan_payment").val(),
        nama: $("#nama_payment").text(),
        alamat: $("#alamat_payment").text(),
        paket: $("#paket_payment").text(),
        tgl_on: $("#tglon_payment").text(),
        thbl: $("#thbl_payment").text(),
        tanggal_awal: $("#tgl_awal_payment").text(),
        tanggal_akhir: $("#tgl_akhir_payment").text(),
        tarif_bln: $("#tarifbulan_payment").text(),
        tagihan: $("#tagihan_payment").text(),
        bi_admin: $("#bi_admin_payment").text(),
        total_tagihan: $("#total_tagihan_payment").text(),            
        cmd: $("#btnPayment").text(),
    };
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/billpayment",
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
                    /* Read more about isConfirmed, isDenied below */
                    var vdata=response.data;
                var formData = {
                    idpel: $("#id_pelanggan_payment").val(),
                    nama: $("#nama_payment").text(),
                    alamat: $("#alamat_payment").text(),
                    paket: $("#paket_payment").text(),
                    tgl_on: $("#tglon_payment").text(),
                    thbl: $("#thbl_payment").text(),
                    tarif_bln: $("#tarifbulan_payment").text(),
                    tagihan: $("#tagihan_payment").text(),
                    bi_admin: $("#bi_admin_payment").text(),
                    total_tagihan: $("#total_tagihan_payment").text(),
                    tgl_lunas: vdata.tgl_lunas,
                    ref_lunas: vdata.ref_lunas,
                    dusun:''        
                    
                };
                batalPayment();
                $("#jsGridBillPending").jsGrid("search", { query: '' }).done(function () {
                    // console.log("filtering completed " );
                    //location.href=base_url + '/printreceipt?data='+ JSON.stringify(formData);
                    window.open(base_url + '/printreceipt?data='+ JSON.stringify(formData), '_blank');
                });
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