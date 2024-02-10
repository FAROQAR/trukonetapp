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
                    $("#customer_reg_paket").html(response.data);
                },
            });
            $.ajax({
                url: base_url + "/loadakecamatancombo",
                method: "GET",
                success: function (response) {
                    $("#customer_reg_kecamatan").html(response.data);
                },
            });
        },
    };
    app.show();
});

$("#customer_reg_kecamatan").on("change", function () {
    var kec = $(this).val();
    $.ajax({
        url: base_url + "/loadadesacombo",
        method: "GET",
        data: {
            query: kec,
        },
        success: function (response) {
            $("#customer_reg_desa").html(response.data);
        },
    });
});
$("#customer_reg_desa").on("change", function () {
    var kec = $(this).val();
    $.ajax({
        url: base_url + "/loadadusuncombo",
        method: "GET",
        data: {
            query: kec,
        },
        success: function (response) {
            $("#customer_reg_dusun").html(response.data);
        },
    });
});
$("#customer_reg_dusun").on("change", function () {
    var kec = $(this).val();
    var cd = document.getElementById("customer_reg_area_code");
    cd.textContent = kec;
    // console.log(cd);
    // setText('#customer_reg_area_code',kec);
});
// $(function () {
//     $("#jsGridOrderlink").jsGrid({
//         height: "auto",
//         width: "100%",

//         sorting: true,
//         paging: true,
//         autoload: true,
//         pageLoading: true,
//         pageSize: 10,
//         pageIndex: 1,

//         controller: {
//             loadData: function (filter) {
//                 //                var base_url = window.location.origin;
//                 var d = $.Deferred();
//                 $.ajax({
//                     url: base_url + "/loadOrderlink",
//                     data: filter,
//                     dataType: "json",
//                     success: function (response) {
//                         var ret = {
//                             data: response.data,
//                             itemsCount: response.totalCount
//                         };
//                         d.resolve(ret);
//                     }
//                 });

//                 return d.promise();
//             }
//         },
//         fields: [
//             {
//                 type: "control", width: 100, editButton: false, deleteButton: false,
//                 itemTemplate: function (value, item) {
//                     var $result = jsGrid.fields.control.prototype.itemTemplate.apply(this, arguments);
//                     var $iconPencil = $("<i>").attr({ class: "fa fa-pencil-alt" });
//                     var $iconTrash = $("<i>").attr({ class: "fa fa-trash" });
//                     var $iconSearch = $("<i>").attr({ class: "fa fa-search" });

//                     var $customEditButton = $("<button>")
//                         .attr({ class: "btn btn-outline-primary btn-xs", style: "margin-right: 3px;" })
//                         .attr({ role: "button" })
//                         .attr({ title: jsGrid.fields.control.prototype.editButtonTooltip })
//                         .attr({ id: "btn-edit-order-" + item.id })
//                         .click(function (e) {
//                             //                                alert("Edit: " + item.kode_bma);
//                             showEditOrderlink(item);
//                             // document.location.href = item.id + "/edit";
//                             e.stopPropagation();
//                         })
//                         .append($iconPencil);
//                     var $customDeleteButton = $("<button>")
//                         .attr({ class: "btn btn-outline-danger btn-xs", style: "margin-right: 3px;" })
//                         .attr({ role: "button" })
//                         .attr({ title: jsGrid.fields.control.prototype.deleteButtonTooltip })
//                         .attr({ id: "btn-delete-order-" + item.id })
//                         .click(function (e) {
//                             alert("Delete: " + item.kode_bma);
//                             // document.location.href = item.id + "/delete";
//                             e.stopPropagation();
//                         })
//                         .append($iconTrash);
//                     var $customSwitchButton = $("<button>")
//                         .attr({ class: "btn btn-outline-warning btn-xs", style: "margin-right: 3px;" })

//                         .attr({ role: "button" })
//                         .attr({ title: "Detail" })
//                         .attr({ id: "btn-detail-order-" + item.id })
//                         .click(function (e) {
//                             //                                alert("Detail: " + item.kode_bma);
//                             var modal = document.getElementById("orderlinkdetail-modal");
//                             var judul = document.getElementById("orderlinkdetail-modal-title");
//                             judul.innerHTML = item.kode_bma;
//                             modal.style.display = "block";

//                             e.stopPropagation();
//                         })
//                         .append($iconSearch);

//                     return $("<div>")
//                         .append($customSwitchButton)
//                         .append($customEditButton)
//                         .append($customDeleteButton);

//                 }
//             },
//             { title: 'NO', name: 'counter', soritng: false, width: 65 },
//             { title: 'ID', name: 'no', soritng: false, width: 50 },
//             { title: 'NAMA', name: 'nama', soritng: false, width: 200 },
//             { title: 'KONTAK', name: 'kontak', soritng: false, width: 130 },
//             { title: 'DESA', name: 'desa', soritng: false, width: 100 },
//             { title: 'DUSUN', name: 'dusun', soritng: false, width: 100 },
//             { title: 'RT/RW', name: 'rtrw', soritng: false, width: 100 },
//             { title: 'AREA CODE', name: 'areacode', soritng: false, width: 100 },
//             { title: 'PAKET', name: 'paket', soritng: false, width: 100 },
//             { title: 'IDPEL', name: 'idpel', soritng: false, width: 130 },
//             { title: 'ODP', name: 'odp', soritng: false, width: 100 },
//             { title: 'MODEM SN', name: 'modemsn', soritng: false, width: 130 },

//             // { title: 'TGL ON', name: 'tgl on', soritng: false, width: 100 },

//         ]
//     });

// });
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
        onItemUpdated: paint,
        onRefreshed: paint,

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
                            itemsCount: response.totalCount,
                        };
                        d.resolve(ret);
                    },
                });

                return d.promise();
            },
        },
        fields: [
            {
                type: "control",
                width: 150,
                editButton: false,
                deleteButton: false,
                itemTemplate: function (value, item) {
                    var $result = jsGrid.fields.control.prototype.itemTemplate.apply(
                        this,
                        arguments
                    );
                    var $iconPencil = $("<i>").attr({ class: "fa fa-pencil-alt" });
                    var $iconTrash = $("<i>").attr({ class: "fa fa-trash" });
                    var $iconSearch = $("<i>").attr({ class: "fa fa-wrench" });
                    var $iconLink = $("<i>").attr({ class: "fa fa-link" });
                    var $iconPrint = $("<i>").attr({ class: "fa fa-print" });

                    var $customEditButton = $("<button>")
                        .attr({
                            class: "btn btn-primary btn-xs",
                            style: "margin-right: 3px;",
                        })
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
                        .attr({
                            class: "btn btn-danger btn-xs",
                            style: "margin-right: 3px;",
                        })
                        .attr({ role: "button" })
                        .attr({
                            title: jsGrid.fields.control.prototype.deleteButtonTooltip,
                        })
                        .attr({ id: "btn-delete-order-" + item.id })
                        .click(function (e) {
                            Swal.fire({
                                title: "Do you want to delete the changes?",
                                icon: "warning",
                                showDenyButton: false,
                                showCancelButton: true,
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Yes, Delete it"
                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    //Swal.fire("Deleted!", "", "success"); 
                                    deleteReg(item.no_reg);
                                }
                            });
                            e.stopPropagation();
                        })
                        .append($iconTrash);

                    var $customSwitchButton = $("<button>")
                        .attr({
                            class: "btn btn-warning btn-xs",
                            style: "margin-right: 3px;",
                        })

                        .attr({ role: "button" })
                        .attr({ title: "Pasang" })
                        .attr({ id: "btn-detail-order-" + item.id })
                        .click(function (e) {
                            if (item.status == "pasang") {
                                Swal.fire({
                                    // position: "top-end",
                                    icon: "warning",
                                    title: "Dalam Proses Pemasangan",
                                    // showConfirmButton: false,
                                    // timer: 1500
                                });
                            } else {
                                showPasang(item);
                            }

                            e.stopPropagation();
                        })
                        .append($iconSearch);
                    var $customPrintButton = $("<button>")
                        .attr({ class: "btn btn-info btn-xs", style: "margin-right: 3px;" })

                        .attr({ role: "button" })
                        .attr({ title: "Cetak label" })
                        .attr({ id: "btn-cetaklabel-order-" + item.id })
                        .click(function (e) {
                            if (item.status == "pasang") {
                                window.open(base_url + '/printlabel?data='+ JSON.stringify(item), '_blank');
                            }else{
                                Swal.fire({                                  
                                    icon: "warning",
                                    title: "Silahkan Proses Pemasangan!",
                                    // showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                            e.stopPropagation();
                        })
                        .append($iconPrint);                    
                    var $customLinkButton = $("<button>")
                        .attr({
                            class: "btn btn-success btn-xs",
                            style: "margin-right: 3px;",
                        })

                        .attr({ role: "button" })
                        .attr({ title: "Aktivasi" })
                        .attr({ id: "btn-aktivasi-order-" + item.id })
                        .click(function (e) {
                            
                            if (item.status == "pasang") {
                                Swal.fire({
                                    title: "Do you want to activate the changes?",
                                    showDenyButton: false,
                                    showCancelButton: true,
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Activate"
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        //Swal.fire("Deleted!", "", "success"); 
                                        activateReg(item.no_reg);
                                    }
                                });
                            }else{
                                Swal.fire({
                                    // position: "top-end",
                                    icon: "warning",
                                    title: "Silahkan Proses Pemasangan!",
                                    // showConfirmButton: false,
                                    // timer: 1500
                                });
                            }

                            e.stopPropagation();
                        })
                        .append($iconLink);
                    return $("<div>")
                        .append($customEditButton)
                        .append($customDeleteButton)
                        .append($customSwitchButton)
                        .append($customPrintButton)
                        .append($customLinkButton);
                },
            },
            { title: "ID", name: "id", sorting: true, width: 80 },
            { title: "NO_REG", name: "no_reg", sorting: true, width: 100 },
            { title: "NAMA", name: "nama", sorting: true, width: 200 },
            { title: "NO_KTP", name: "no_ktp", sorting: true, width: 130 },
            { title: "KONTAK", name: "kontak", sorting: true, width: 130 },
            { title: "KECAMATAN", name: "kecamatan", sorting: true, width: 110 },
            { title: "DESA", name: "desa", sorting: true, width: 100 },
            { title: "DUSUN", name: "dusun", sorting: true, width: 100 },
            { title: "RT_RW", name: "rt_rw", sorting: true, width: 100 },
            { title: "PAKET", name: "paket", sorting: true, width: 100 },
            { title: "CODE", name: "area_code", sorting: true, width: 100 },
            { title: "IDPEL", name: "id_pelanggan", sorting: true, width: 130 },
            { title: "ODP", name: "odp", sorting: true, width: 100 },
            { title: "MODEM_SN", name: "modem_sn", sorting: true, width: 130 },
            { title: "WIFI_ID", name: "wifi_id", sorting: true, width: 100 },
            { title: "WIFI_PASS", name: "wifi_pass", sorting: true, width: 100 },
            { title: "STATUS", name: "status", sorting: true, width: 100 },
            { title: "REG", name: "tgl_reg", sorting: true, width: 100 },
            { title: "PASANG", name: "tgl_pasang", sorting: true, width: 100 },
            { title: "ON", name: "tgl_on", sorting: true, width: 100 },

            // { title: 'TGL ON', name: 'tgl on', soritng: false, width: 100 },
        ],
    });
    function paint(ev) {
        $("#jsGridOrderlink tbody tr").each((i, tr) => {
            // console.log(tr.children[17]);
            if (tr.children[17] !== undefined) {
                console.log(tr.children[17].textContent);
                if (tr.children[17].textContent === "pasang") {
                    $(tr).children().css("background-color", "#35BAF6");
                    $(tr).children().css("color", "#FFFFFF");
                    $(tr).children().css("font-weight", "bold");
                }
            }
        });
    }
});
$(document).ready(function () {
    $("#searchorderlink").on("keyup", function () {
        var ret = $(this).val().toLowerCase();
        $("#jsGridOrderlink").jsGrid("search", { query: ret }).done(function () {
            // console.log("filtering completed ");
        });
    });
});
function cariOrderlink() {
    var ret = $("#searchorderlink").val();

    $("#jsGridOrderlink").jsGrid("search", { query: ret }).done(function () {
        // console.log("filtering completed ");
    });
}

function showAddOrderLink() {
    //    var list = getComp('formbmalisttitle');
    //    console.log(list);
    hideComp("orderlinklist");
    showComp("cardregisterlist");
    setText("btnSimpanregister", "Simpan");
    setText("formregisterlisttitle", "Register");
    resetForm("formregisterlist");
    $.ajax({
        url: base_url + "/loadregisteradd",
        //                    data: filter,
        dataType: "json",
        success: function (response) {
            // idpel = ret.data.idpel;
            setText("customer_reg_id", response.data.id);
            setText("customer_reg_no_reg", response.data.no_reg);
        },
    });
}
$("#customer_regedit_kecamatan").on("change", function () {
    var kec = $(this).val();
    $.ajax({
        url: base_url + "/loadadesacombo",
        method: "GET",
        data: {
            query: kec,
        },
        success: function (response) {
            $("#customer_regedit_desa").html(response.data);
        },
    });
});
$("#customer_regedit_desa").on("change", function () {
    var kec = $(this).val();
    $.ajax({
        url: base_url + "/loadadusuncombo",
        method: "GET",
        data: {
            query: kec,
        },
        success: function (response) {
            $("#customer_regedit_dusun").html(response.data);
        },
    });
});
$("#customer_regedit_dusun").on("change", function () {
    var kec = $(this).val();
    var cd = document.getElementById("customer_regedit_area_code");
    cd.textContent = kec;
    // console.log(cd);
    // setText('#customer_reg_area_code',kec);
});
function showEditOrderlink(data) {
    //    var list = getComp('bmalist');
    //    console.log('disini');
    hideComp("orderlinklist");
    showComp("cardeditorderlist");
    setText("btnSimpaneditorder", "Edit");
    setText("formeditorderlisttitle", "Edit Order");
    resetForm("formeditorderlist");
    // console.log(data);
    $.ajax({
        url: base_url + "/loadodpcombo",
        method: "GET",
        // data: {no_reg:item.no_reg, area_code:item.area_code},
        // dataType: "json",
        success: function (response) {
            // idpel = ret.data.idpel;
            $("#customer_regedit_odp").html(response.data);
            setValue("customer_regedit_odp", data.odp);
        },
    });
    $.ajax({
        url: base_url + "/loadpaketcombo",
        method: "GET",
        success: function (response) {
            $("#customer_regedit_paket").html(response.data);
            setValue("customer_regedit_paket", data.paket);
        },
    });
    $.ajax({
        url: base_url + "/loadakecamatancombo",
        method: "GET",
        success: function (response) {
            $("#customer_regedit_kecamatan").html(response.data);
            setValue("customer_regedit_kecamatan", data.kecamatan);
        },
    });
    $.ajax({
        url: base_url + "/loadadesacombo",
        method: "GET",
        data: {
            query: data.kecamatan,
        },
        success: function (response) {
            $("#customer_regedit_desa").html(response.data);
            setValue("customer_regedit_desa", data.desa);
        },
    });
    $.ajax({
        url: base_url + "/loadadusuncombo",
        method: "GET",
        data: {
            query: data.desa,
        },
        success: function (response) {
            $("#customer_regedit_dusun").html(response.data);
            setValue("customer_regedit_dusun", data.area_code);
        },
    });
    setText("customer_regedit_id", data.id);
    setText("customer_regedit_no_reg", data.no_reg);
    setValue("customer_regedit_nama", data.nama);
    setValue("customer_regedit_no_ktp", data.no_ktp);
    setValue("customer_regedit_kontak", data.kontak);

    setValue("customer_regedit_rt_rw", data.rt_rw);

    setText("customer_regedit_area_code", data.area_code);
    setText("customer_regedit_id_pelanggan", data.id_pelanggan);

    setValue("customer_regedit_modem_sn", data.modem_sn);
    setText("customer_regedit_wifi_id", data.wifi_id);
    setText("customer_regedit_wifi_pass", data.wifi_pass);

    //    resetForm('formbmalist');
    //    $('#formbmalist').get(0).reset();
}
function batalAddeditorder() {
    hideComp("cardeditorderlist");
    showComp("orderlinklist");
}
function batalAddregister() {
    hideComp("cardregisterlist");
    showComp("orderlinklist");
}
function batalAddpasang() {
    hideComp("cardpasanglist");
    showComp("orderlinklist");
}
function showPasang(item) {
    //    var list = getComp('formbmalisttitle');
    //    console.log(list);
    hideComp("orderlinklist");
    showComp("cardpasanglist");
    setText("btnSimpanpasang", "Simpan");
    setText("formpasanglisttitle", "Link User");
    resetForm("formpasanglist");
    $.ajax({
        url: base_url + "/loadpasang",
        data: { no_reg: item.no_reg, area_code: item.area_code },
        dataType: "json",
        success: function (response) {
            // idpel = ret.data.idpel;
            setText("customer_reg_id_pelanggan", response.data.id_pelanggan);
            setText("customer_reg_no_reg_pasang", item.no_reg);
            setText("customer_reg_wifi_id", response.data.wifi_id);
            setText("customer_reg_wifi_pass", response.data.wifi_pass);
            setText("customer_reg_area_code_pasang", item.area_code);
        },
    });
    $.ajax({
        url: base_url + "/loadodpcombo",
        method: "GET",
        // data: {no_reg:item.no_reg, area_code:item.area_code},
        // dataType: "json",
        success: function (response) {
            // idpel = ret.data.idpel;
            $("#customer_reg_odp").html(response.data);
        },
    });
}
function simpanAddOrderLink(id, text) {
    alert(text);
}
$("#customer_reg_kontak").on("input", function (e) {
    var x = e.target.value.replace(/\D/g, "").match(/(\d{0,15})/);
    e.target.value = x[1];
});
$("#customer_reg_no_ktp").on("input", function (e) {
    var x = e.target.value.replace(/\D/g, "").match(/(\d{0,20})/);
    e.target.value = x[1];
});
$("#customer_reg_rt_rw").on("input", function (e) {
    var x = e.target.value.replace(/\D/g, "").match(/(\d{0,2})(\d{0,2})/);
    e.target.value = !x[2] ? x[1] : x[1] + "/" + x[2];
});
function simpanRegister() {
    // myForm = document.forms.formregisterlist;
    // var vid=getSelectorText('customer_reg_id');
    // var vno_reg=document.querySelector("#customer_reg_dusun");
    // console.log(vno_reg.selectedOptions.length);
    // return;
    var formData = {
        id: getSelectorText("customer_reg_id"),
        no_reg: getSelectorText("customer_reg_no_reg"),
        nama: getSelectorValue("customer_reg_nama"),
        no_ktp: getSelectorValue("customer_reg_no_ktp"),
        kontak: getSelectorValue("customer_reg_kontak"),
        kecamatan: getSelectorValue("customer_reg_kecamatan"),
        desa: getSelectorValue("customer_reg_desa"),
        dusun: getSelectorOptionText("customer_reg_dusun"),
        rt_rw: getSelectorValue("customer_reg_rt_rw"),
        paket: getSelectorValue("customer_reg_paket"),
        area_code: getSelectorText("customer_reg_area_code"),
        cmd: getSelectorText("btnSimpanregister") + "reg",
    };
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/setRegister",
        type: "post",
        data: formData,
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
                    batalAddregister();
                    $("#jsGridOrderlink")
                        .jsGrid("search", { query: "" })
                        .done(function () { });
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

function simpanPasang() {
    // myForm = document.forms.formregisterlist;
    // var vid=getSelectorText('customer_reg_id');
    // var vno_reg=document.querySelector("#customer_reg_dusun");
    // console.log(vno_reg.selectedOptions.length);
    // return;
    var formData = {
        no_reg: getSelectorText("customer_reg_no_reg_pasang"),
        area_code: getSelectorText("customer_reg_area_code_pasang"),
        id_pelanggan: getSelectorValue("customer_reg_id_pelanggan"),
        odp: getSelectorValue("customer_reg_odp"),
        modem_sn: getSelectorValue("customer_reg_modem_sn"),
        wifi_id: getSelectorText("customer_reg_wifi_id"),
        wifi_pass: getSelectorText("customer_reg_wifi_pass"),
        cmd: getSelectorText("btnSimpanpasang") + "pasang",
    };
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/setPasang",
        type: "post",
        data: formData,
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
                    batalAddpasang();
                    $("#jsGridOrderlink")
                        .jsGrid("search", { query: "" })
                        .done(function () { });
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
function simpanEditOrder() {
    // myForm = document.forms.formregisterlist;
    // var vid=getSelectorText('customer_reg_id');
    // var vno_reg=document.querySelector("#customer_reg_dusun");
    // console.log(vno_reg.selectedOptions.length);
    // return;
    var formData = {
        id: getSelectorText("customer_regedit_id"),
        no_reg: getSelectorText("customer_regedit_no_reg"),
        nama: getSelectorValue("customer_regedit_nama"),
        no_ktp: getSelectorValue("customer_regedit_no_ktp"),
        kontak: getSelectorValue("customer_regedit_kontak"),
        kecamatan: getSelectorValue("customer_regedit_kecamatan"),
        desa: getSelectorValue("customer_regedit_desa"),
        dusun: getSelectorOptionText("customer_regedit_dusun"),
        rt_rw: getSelectorValue("customer_regedit_rt_rw"),
        paket: getSelectorValue("customer_regedit_paket"),
        area_code: getSelectorText("customer_regedit_area_code"),
        id_pelanggan: getSelectorText("customer_regedit_id_pelanggan"),
        odp: getSelectorValue("customer_regedit_odp"),
        modem_sn: getSelectorValue("customer_regedit_modem_sn"),
        wifi_id: getSelectorText("customer_regedit_wifi_id"),
        wifi_pass: getSelectorText("customer_regedit_wifi_pass"),
        cmd: getSelectorText("btnSimpanpasang") + "order",
    };
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/setOrderlink",
        type: "post",
        data: formData,
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
                    batalAddeditorder();
                    $("#jsGridOrderlink")
                        .jsGrid("search", { query: "" })
                        .done(function () { });
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
};
function deleteReg(data){
    var formData = {
        no_reg: data,
        cmd: "delete"
    };
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/setOrderlink",
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
                Swal.fire("Deleted!", "", "success"); 
                // batalAddOdp(); 
                $("#jsGridOrderlink").jsGrid("search", { query: '' }).done(function () {
                    
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
};
function activateReg(data){
    var formData = {
        no_reg: data,
        cmd: "activate"
    };
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/setOrderlink",
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
                Swal.fire("Activation!", "", "success"); 
                // batalAddOdp(); 
                $("#jsGridOrderlink").jsGrid("search", { query: '' }).done(function () {
                    
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
}

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
