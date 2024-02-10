$(function () {
    $("#jsGridBillClose").jsGrid({
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
                    url: base_url + "/loadBillclose",
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
                    var $iconPrint = $("<i>").attr({ class: "fa fa-print" });


                    var $customPrintButton = $("<button>")
                        .attr({ class: "btn btn-primary", style: "margin-right: 3px;" })
                        .attr({ role: "button" })
                        // .attr({title: jsGrid.fields.control.prototype.payButtonTooltip})
                        .attr({ id: "btn-print-" + item.id_pelanggan })
                        .click(function (e) {
                            //    alert("Edit: " + item.id_pelanggan);
                            //     // showPayment(item);
                            //     // document.location.href = item.id + "/edit";
                            //     e.stopPropagation();
                            showCetakUlang(item);

                            // var modal = document.getElementById("billpendingdetail-modal");
                            // // var judul = document.getElementById("billpendingdetail-modal-title");
                            // // judul.innerHTML = item.kode_server;
                            // modal.style.display = "block";

                            e.stopPropagation();
                        })
                        .append($iconPrint);

                    return $("<div>")
                        .append($customPrintButton);

                }
            },
            // { title: 'ID', name: 'id', soritng: false, width: 100, visible: true },
            // { title: 'ID', name: 'id', soritng: false, width: 100 },
            // { title: 'NO', name: 'nomor', soritng: false, width: 100 },
            { title: 'ID USER', name: 'id_pelanggan', soritng: false, width: 130 },
            { title: 'NAMA', name: 'nama', soritng: false, width: 200 },
            { title: 'ALAMAT', name: 'alamat', soritng: false, width: 200 },
            // { title: 'KONTAK', name: 'kontak', soritng: false, width: 130 },
            // { title: 'KECAMATAN', name: 'kecamatan', soritng: false, width: 100 },
            // { title: 'DESA', name: 'desa', soritng: false, width: 100 },
            { title: 'DUSUN', name: 'dusun', soritng: false, width: 100 },
            { title: 'PAKET', name: 'paket', soritng: false, width: 100 },

            // { title: 'ODP', name: 'odp', soritng: false, width: 100 },
            // { title: 'MODEM SN', name: 'modem sn', soritng: false, width: 100 },
            { title: 'STATUS', name: 'status', soritng: false, width: 80 },
            // { title: 'TGL_ON', name: 'tgl_on', soritng: false, width: 100 },
            // { title: 'TARIF/BLN', name: 'tarif_bln', soritng: false, width: 100 },
            // { title: 'JML_HARI', name: 'jml_hari', soritng: false, width: 100 },
            // { title: 'TARIF/HARI', name: 'tarif_hari', soritng: false, width: 100 },
            // { title: 'TANGGAL_AKHIR', name: 'tanggal_akhir', soritng: false, width: 100 },
            // { title: 'LAMA_PAKAI', name: 'lama_pakai', soritng: false, width: 100 },
            { title: 'TAGIHAN', name: 'tagihan', soritng: false, width: 100 },
            { title: 'BI.ADMIN', name: 'bi_admin', soritng: false, width: 100 },
            { title: 'TOTAL', name: 'total_tagihan', soritng: false, width: 100 },
            { title: 'THBL', name: 'thbl', soritng: false, width: 80 },
            // { title: 'LUNAS', name: 'lunas', soritng: false, width: 80 },
            { title: 'TGL LUNAS', name: 'tgl_lunas', soritng: false, width: 100 },
            { title: 'REF', name: 'ref_lunas', soritng: false, width: 120 },




        ]
    });



});


$(document).ready(function () {
    $("#billclosecaritext").on("keyup", function () {
        var ret = $(this).val().toLowerCase();
        $("#jsGridBillClose").jsGrid("search", { query: ret }).done(function () {
            // console.log("filtering completed ");
        });
    });
});
function caribillclose() {
    var ret = $("#billclosecaritext").val();

    $("#jsGridBillClose").jsGrid("search", { query: ret }).done(function () {
        // console.log("filtering completed " );
    });
}

function showCetakUlang(data) {
    console.log(window.location.origin);
    console.log(data);
    var formData = {
        idpel: data.id_pelanggan,
        nama: data.nama,
        alamat: data.alamat,
        dusun: data.dusun,
        paket: (data.paket==1?'5 Mbps':data.paket==2?'10 Mbps':data.paket==3?'20 Mbps':''),
        tgl_on:data.tgl_on,
        tarif_bln: intlFormatNumber (data.tarif_bln,'en-US'),
        tgl_lunas: data.tgl_lunas,
        ref_lunas: data.ref_lunas,
        thbl:data.thbl,
        tagihan:    intlFormatNumber (data.tagihan,'en-US'),
        bi_admin:    intlFormatNumber (data.bi_admin,'en-US'),
        total_tagihan:    intlFormatNumber (data.total_tagihan,'en-US')
    };
    // var base_url = window.location.origin;
    // window.location(base_url + '/printreceipt');
    // location.href=base_url + '/printreceipt?data='+ JSON.stringify(formData);
    window.open(base_url + '/printreceipt?data='+ JSON.stringify(formData), '_blank');
}
;
//Date picker
// $(function() {
    // $("#billclose_tgl_lunas").datetimepicker({
    //     format: 'YYYY-MM-DD',    defaultDate: new Date()
    //     // ,onchangeDate:function(event){
    //     //     console.log('sino');
    //     // }    
    //     //   onchangeDate: function() {
    //     //     console.log('sino');
    //     //   },
    // });

    $(function () {
        // init
        $('#billclose_tgl_lunas').datetimepicker({format: 'YYYY-MM-DD',defaultDate: new Date()})
        
        //detect change
        $("#billclose_tgl_lunas").on("change.datetimepicker", function (e) {
            if (e.oldDate !== e.date) {
                // alert('You picked: ' + new Date(e.date).toLocaleDateString('en-US'))
                let tgl=new Date(e.date);
                let d=tgl.getDate();
                let m=tgl.getMonth()+1;
                let y=tgl.getFullYear();
                let ret=y+'-'+ ((m<10)?('0'+m):m) +'-'+ ((d<10)?('0'+d):d);
                $("#jsGridBillClose").jsGrid("search", { query: ret,tanggal :ret }).done(function () {
                    // console.log("filtering completed " );
                });
            }
        })
    })