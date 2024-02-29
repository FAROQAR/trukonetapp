$(function () {
    $("#jsGridbillprocess").jsGrid({
        height: "auto",
        width: "100%",

        sorting: true,
        paging: true,
        autoload: true,
        pageLoading: true,
        pageSize: 20,
        pageIndex: 1,

        controller: {
            loadData: function (filter) {
                //                var base_url = window.location.origin;
                var d = $.Deferred();
                $.ajax({
                    url: base_url + "/loadBillprocess",
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
            // {
            //     type: "control", width: 100, editButton: false, deleteButton: false,
            //     itemTemplate: function (value, item) {
            //         var $result = jsGrid.fields.control.prototype.itemTemplate.apply(this, arguments);
            //         var $iconPayment = $("<i>").attr({ class: "fa fa-dollar-sign" });


            //         var $customPayButton = $("<button>")
            //             .attr({ class: "btn btn-success", style: "margin-right: 3px;" })
            //             .attr({ role: "button" })
            //             // .attr({title: jsGrid.fields.control.prototype.payButtonTooltip})
            //             .attr({ id: "btn-payment-" + item.id_pelanggan })
            //             .click(function (e) {
            //                 //    alert("Edit: " + item.id_pelanggan);
            //                 //     // showPayment(item);
            //                 //     // document.location.href = item.id + "/edit";
            //                 //     e.stopPropagation();
            //                 showPayment(item);

            //                 // var modal = document.getElementById("billprocessdetail-modal");
            //                 // // var judul = document.getElementById("billprocessdetail-modal-title");
            //                 // // judul.innerHTML = item.kode_server;
            //                 // modal.style.display = "block";

            //                 e.stopPropagation();
            //             })
            //             .append($iconPayment);

            //         return $("<div>")
            //             .append($customPayButton);

            //     }
            // },
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
            { title: 'JML_HARI', name: 'jml_hari', sorting: true, width: 100 },
            { title: 'TARIF/HARI', name: 'tarif_hari', sorting: true, width: 100 },
            { title: 'AWAL', name: 'tanggal_awal', sorting: true, width: 100 },
            { title: 'AKHIR', name: 'tanggal_akhir', sorting: true, width: 100 },
            { title: 'LAMA', name: 'lama_pakai', sorting: true, width: 100 },
            { title: 'TAGIHAN', name: 'tagihan', sorting: true, width: 100 },
            { title: 'BI.ADMIN', name: 'bi_admin', sorting: true, width: 100 },
            { title: 'TOTAL', name: 'total_tagihan', sorting: true, width: 100 },
            { title: 'THBL', name: 'thbl', sorting: true, width: 80 },
            { title: 'LUNAS', name: 'lunas', sorting: true, width: 80 },
            { title: 'TGLLUNAS', name: 'tgl_lunas', sorting: true, width: 100 },
            { title: 'REFLUNAS', name: 'ref_lunas', sorting: true, width: 150 },




        ]
    });



});

$(document).ready(function () {
    $("#billprocesscaritext").on("keyup", function () {
        var ret = $(this).val().toLowerCase();
        var $thbl = $('#billprocess_thbl').val().replace('-', '');
        // console.log(thbl);
        // $("#jsGridbillprocess").jsGrid("search", { query: { cari: ret, thbl: $thbl }}).done(function () {
        //     // console.log("filtering completed ");
        // });
        searchBillProcess($thbl, ret);
    });
});
function caribillprocess() {
    setValue("billprocesscaritext", '');
    var ret = $("#billprocesscaritext").val();
    var $thbl = $('#billprocess_thbl').val().replace('-', '');
    // console.log(thbl);
    // $("#jsGridbillprocess").jsGrid("search", { query: { cari: ret, thbl: $thbl }}).done(function () {
    //     // console.log("filtering completed ");
    // });
    searchBillProcess($thbl, ret);
}

function genBill() {
    Swal.fire({
        title: "Apakah yakin akan proses Billing ?",
        // showDenyButton: false,
        showCancelButton: true,
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes"
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            //Swal.fire("Deleted!", "", "success"); 
            var $thbl = $('#billprocess_thbl').val().replace('-', '');
            if ($thbl == '') {
                Swal.fire({
                    toast: false,
                    //   position: 'bottom-end',
                    icon: "warning",
                    title: "Tahun Bulan Tidak Valid !",
                    //   showConfirmButton: false,
                    timer: 3000,
                });
            } else {
                $.ajax({
                    // fixBug get url from global function only
                    // get global variable is bug!
                    url: base_url + "/genBill",
                    type: "post",
                    data: { thbl: $thbl },
                    cache: false,
                    dataType: "json",
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
                                caribillprocess();
                            });
                        } else {
                            Swal.fire({
                                toast: false,
                                //   position: 'bottom-end',
                                icon: "error",
                                title: response.message,
                                //   showConfirmButton: false,
                                timer: 3000,
                            });
                        }
                    },
                });
            }
        }
    });

}

$(function () {
    // init

    $('#billprocess_thbl').datetimepicker({
        format: 'YYYY-MM',
        defaultDate: new Date(),

        // format: "mm/yyyy",
        // startView: "months", 
        minViewMode: 1,

    });

    //detect change
    $("#billprocess_thbl").on("change.datetimepicker", function (e) {
        if (e.oldDate !== e.date) {
            // alert('You picked: ' + new Date(e.date).toLocaleDateString('en-US'))
            let tgl = new Date(e.date);
            let d = tgl.getDate();
            let m = tgl.getMonth() + 1;
            let y = tgl.getFullYear();
            let ret = y + ((m < 10) ? ('0' + m) : m);
            // console.log(ret );
            var retu = $("#billprocesscaritext").val();
            // $("#jsGridbillprocess").jsGrid("search", { query: { cari: retu, thbl: ret }}).done(function () {
            //     // console.log("filtering completed " );
            // });
            searchBillProcess(ret, retu);
        }
    });

    $('#billreport_thbl').datetimepicker({
        format: 'YYYY-MM',
        defaultDate: new Date(),

        // format: "mm/yyyy",
        // startView: "months", 
        minViewMode: 1,

    });

    //detect change
    $("#billreport_thbl").on("change.datetimepicker", function (e) {
        if (e.oldDate !== e.date) {
            // alert('You picked: ' + new Date(e.date).toLocaleDateString('en-US'))
            let tgl = new Date(e.date);
            let d = tgl.getDate();
            let m = tgl.getMonth() + 1;
            let y = tgl.getFullYear();
            let ret = y + ((m < 10) ? ('0' + m) : m);
            // // console.log(ret );
            // var retu = $("#billprocesscaritext").val();
            // // $("#jsGridbillprocess").jsGrid("search", { query: { cari: retu, thbl: ret }}).done(function () {
            // //     // console.log("filtering completed " );
            // // });
            // searchBillProcess(ret, retu);
        }
    })
})

function searchBillProcess(vthbl, vsearch) {
    $("#jsGridbillprocess").jsGrid("reset");
    var filter = $("#jsGridbillprocess").jsGrid("getFilter");
    $("#jsGridbillprocess").jsGrid({

        // filtering: true,
        controller: {
            loadData: function (filter) {
                //                var base_url = window.location.origin;
                var d = $.Deferred();
                // var tgl = $()

                $.ajax({
                    url: base_url + "/loadBillprocess",
                    // params: { query: retu, tanggal: ret },
                    data: { query: { cari: vsearch, thbl: vthbl }, pageIndex: filter.pageIndex, pageSize: filter.pageSize },
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
    });
}


//-----------------
function batalbillprocess() {
    hideComp('cardbillprocesslist');
    showComp('billprocesslist');

}
function showGenBillIdpel() {

    hideComp('billprocesslist');
    showComp('cardbillprocesslist');

    $('#thbl_billprocess').datetimepicker({
        format: 'YYYY-MM',
        defaultDate: new Date(),

        // format: "mm/yyyy",
        // startView: "months", 
        minViewMode: 1,

    });

}
;

function genBillIdpel() {
    Swal.fire({
        title: "Apakah yakin akan proses Billing ?",
        // showDenyButton: false,
        showCancelButton: true,
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes"
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            //Swal.fire("Deleted!", "", "success"); 
            var $thbl = $('#thbl_billprocess').val().replace('-', '');
            var $idpel = $('#id_pelanggan_billprocess').val();
            if ($thbl == '') {
                Swal.fire({
                    toast: false,
                    //   position: 'bottom-end',
                    icon: "warning",
                    title: "Tahun Bulan Tidak Valid !",
                    //   showConfirmButton: false,
                    timer: 3000,
                });
                if ($idpel == '') {
                    Swal.fire({
                        toast: false,
                        //   position: 'bottom-end',
                        icon: "warning",
                        title: "Id Pelanggan Tidak Valid !",
                        //   showConfirmButton: false,
                        timer: 3000,
                    });
                } else {
                    $.ajax({
                        // fixBug get url from global function only
                        // get global variable is bug!
                        url: base_url + "/genBillIdpel",
                        type: "post",
                        data: { thbl: $thbl, idpel: $idpel },
                        cache: false,
                        dataType: "json",
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

                                    caribillprocess();
                                    batalbillprocess();
                                });
                            } else {
                                Swal.fire({
                                    toast: false,
                                    //   position: 'bottom-end',
                                    icon: "error",
                                    title: response.message,
                                    //   showConfirmButton: false,
                                    timer: 3000,
                                });
                            }
                        },
                    });
                }
            }
        }
    });

}