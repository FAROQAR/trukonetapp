/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */



$(function () {
    $("#jsGridcustomer").jsGrid({
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
                // var base_url = window.location.origin + "/truko";
                var d = $.Deferred();
                $.ajax({
                    url: base_url + "/loadCustomer",
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
                    var $iconMutasi = $("<i>").attr({ class: "fa fa-box" });
                    

                    var $customEditButton = $("<button>")
                        .attr({ class: "btn btn-primary btn-xs", style: "margin-right: 3px;" })
                        .attr({ role: "button" })
                        .attr({ title: jsGrid.fields.control.prototype.editButtonTooltip })
                        .attr({ id: "btn-edit-cust-" + item.id })
                        .click(function (e) {
                            //                                alert("Edit: " + item.kode_bma);
                            showEditCustomer(item);
                            // document.location.href = item.id + "/edit";
                            e.stopPropagation();
                        })
                        .append($iconPencil);
                    var $customMutasiButton = $("<button>")
                        .attr({ class: "btn btn-success btn-xs", style: "margin-right: 3px;" })
                        .attr({ role: "button" })
                        .attr({ title: "Edit Paket" })
                        .attr({ id: "btn-mutasi-cust-" + item.id })
                        .click(function (e) {
                            showMutasiCustomer(item);
                            // document.location.href = item.id + "/delete";
                            e.stopPropagation();
                        })
                        .append($iconMutasi);                    
                    return $("<div>")
                        // .append($customSwitchButton)
                        .append($customEditButton)
                         .append($customMutasiButton)
                        ;

                }
            },
            { title: 'ID', name: 'id', soritng: false, width: 65 },
            { title: 'IDPEL', name: 'id_pelanggan', soritng: false, width: 130 },
            { title: 'NAMA', name: 'nama', soritng: false, width: 200 },
            { title: 'NOKTP', name: 'no_ktp', soritng: false, width: 150 },
            { title: 'KONTAK', name: 'kontak', soritng: false, width: 130 },
            { title: 'KECAMATAN', name: 'kecamatan', soritng: false, width: 130 },
            { title: 'DESA', name: 'desa', soritng: false, width: 120 },
            { title: 'DUSUN', name: 'dusun', soritng: false, width: 120 },
            { title: 'RT/RW', name: 'rt_rw', soritng: false, width: 100 },
            { title: 'PAKET', name: 'paket', soritng: false, width: 100 },
            { title: 'CODE', name: 'area_code', soritng: false, width: 100 },
            { title: 'ODP', name: 'odp', soritng: false, width: 100 },
            { title: 'MODEM_SN', name: 'modem_sn', soritng: false, width: 130 },
            { title: 'WIFI_ID', name: 'wifi_id', soritng: false, width: 100 },
            { title: 'WIFI_PASS', name: 'wifi_pass', soritng: false, width: 100 },
            { title: 'STATUS', name: 'status', soritng: false, width: 80 },
            { title: 'MUTASI', name: 'mutasi', soritng: false, width: 80 },
            { title: 'NO_REG', name: 'no_reg', soritng: false, width: 80 },
            // { title: 'TGL_REG', name: 'tgl_reg', soritng: false, width: 100 },
            // { title: 'TGL_PASANG', name: 'tgl_pasang', soritng: false, width: 100 },
            { title: 'TGL_ON', name: 'tgl_on', soritng: false, width: 100 },
            // { title: 'CREATE_DATE', name: 'create_date', soritng: false, width: 100 },
            // { title: 'CREATE_BY', name: 'create_by', soritng: false, width: 100 },
            // { title: 'UPDATE_DATE', name: 'update_date', soritng: false, width: 100 },
            // { title: 'UPDATE_BY', name: 'update_by', soritng: false, width: 100 },

            // { title: 'NO', name: 'counter', soritng: false, width: 65 },
            // { title: 'ID', name: 'no', soritng: false, width: 50 },
            // { title: 'NAMA', name: 'nama', soritng: false, width: 200 },
            // { title: 'KONTAK', name: 'kontak', soritng: false, width: 130 },
            // { title: 'DESA', name: 'desa', soritng: false, width: 100 },
            // { title: 'DUSUN', name: 'dusun', soritng: false, width: 100 },
            // { title: 'RT/RW', name: 'rtrw', soritng: false, width: 100 },
            // { title: 'IDPEL', name: 'idpel', soritng: false, width: 130 },
            // { title: 'PAKET', name: 'paket', soritng: false, width: 100 },

            // { title: 'ODP', name: 'odp', soritng: false, width: 100 },
            // { title: 'MODEM SN', name: 'modemsn', soritng: false, width: 130 },

            // { title: 'TGL ON', name: 'tgl on', soritng: false, width: 100 },

        ]
    });

});

// $('#tglpembentukan').datetimepicker({ format: 'DD-MM-YYYY' });
// $("#jsGridCustomer").
function showAddCustomer() {
    //    var list = getComp('formbmalisttitle');
    //    console.log(list);
    hideComp('customerlist');
    showComp('cardcustomerlist');
    setText('btnSimpanCustomer', 'Simpan');
    setText('formcustomerlisttitle', 'Tambah Bumdesma');
    resetForm('formcustomerlist');
    $.ajax({
        url: base_url + "/loadcustomeradd",
        //                    data: filter,
        dataType: "json",
        success: function (response) {
            var ret = {
                data: response.data,
                itemsCount: response.totalCount
            };
            idpel = ret.data.idpel;
            setValue('idpel', idpel);

        }
    });


}
;
$("#customer_edit_kecamatan").on("change", function () {
    var kec = $(this).val();
    $.ajax({
        url: base_url + "/loadadesacombo",
        method: "GET",
        data: {
            query: kec,
        },
        success: function (response) {
            $("#customer_edit_desa").html(response.data);
        },
    });
});
$("#customer_edit_desa").on("change", function () {
    var kec = $(this).val();
    $.ajax({
        url: base_url + "/loadadusuncombo",
        method: "GET",
        data: {
            query: kec,
        },
        success: function (response) {
            $("#customer_edit_dusun").html(response.data);
        },
    });
});
$("#customer_edit_dusun").on("change", function () {
    var kec = $(this).val();
    var cd = document.getElementById("customer_edit_area_code");
    cd.textContent = kec;
    // console.log(cd);
    // setText('#customer__area_code',kec);
});
function showEditCustomer(data) {
    //    var list = getComp('bmalist');
    //    console.log('disini');
    hideComp('customerlist');
    showComp('cardeditcustomerlist');
    // setText('btnSimpanCustomer', 'Edit');
    // setText('formcustomertitle', 'Edit Bumdesma');
    $.ajax({
        url: base_url + "/loadodpcombo",
        method: "GET",
        // data: {no_reg:item.no_reg, area_code:item.area_code},
        // dataType: "json",
        success: function (response) {
            // idpel = ret.data.idpel;
            $("#customer_edit_odp").html(response.data);
            setValue("customer_edit_odp", data.odp);
        },
    });
    // $.ajax({
    //     url: base_url + "/loadpaketcombo",
    //     method: "GET",
    //     success: function (response) {
    //         $("#customer_edit_paket").html(response.data);
    //         setValue("customer_edit_paket", data.paket);
    //     },
    // });
    $.ajax({
        url: base_url + "/loadakecamatancombo",
        method: "GET",
        success: function (response) {
            $("#customer_edit_kecamatan").html(response.data);
            setValue("customer_edit_kecamatan", data.kecamatan);
        },
    });
    $.ajax({
        url: base_url + "/loadadesacombo",
        method: "GET",
        data: {
            query: data.kecamatan,
        },
        success: function (response) {
            $("#customer_edit_desa").html(response.data);
            setValue("customer_edit_desa", data.desa);
        },
    });
    $.ajax({
        url: base_url + "/loadadusuncombo",
        method: "GET",
        data: {
            query: data.desa,
        },
        success: function (response) {
            $("#customer_edit_dusun").html(response.data);
            setValue("customer_edit_dusun", data.area_code);
        },
    });
    setText("customer_edit_id", data.id);
    setText("customer_edit_id_pelanggan", data.id_pelanggan);
    setValue("customer_edit_nama", data.nama);
    setValue("customer_edit_no_ktp", data.no_ktp);
    setValue("customer_edit_kontak", data.kontak);
    setValue("customer_edit_rt_rw", data.rt_rw);
    setText("customer_edit_area_code", data.area_code);
    setValue("customer_edit_modem_sn", data.modem_sn);
    setText("customer_edit_wifi_id", data.wifi_id);
    setText("customer_edit_wifi_pass", data.wifi_pass);



    //    resetForm('formbmalist');
    //    $('#formbmalist').get(0).reset();
}
;
function batalAddeditcustomer() {
    // var frm = getComp('cardcustomerlist');
    // frm.style.display="none";
    hideComp('cardeditcustomerlist');
    showComp('customerlist');
}
;

function simpanAddCustomer(id, text) {
    alert(text);
}
;
function simpaneditcustomer() {
    var formData = {
        id: getSelectorText("customer_edit_id"),
        id_pelanggan: getSelectorText("customer_edit_id_pelanggan"),
        nama: getSelectorValue("customer_edit_nama"),
        no_ktp: getSelectorValue("customer_edit_no_ktp"),
        kontak: getSelectorValue("customer_edit_kontak"),
        kecamatan: getSelectorValue("customer_edit_kecamatan"),
        desa: getSelectorValue("customer_edit_desa"),
        dusun: getSelectorOptionText("customer_edit_dusun"),
        rt_rw: getSelectorValue("customer_edit_rt_rw"),
        // paket: getSelectorValue("customer_edit_paket"),
        area_code: getSelectorText("customer_edit_area_code"),
        odp: getSelectorValue("customer_edit_odp"),
        modem_sn: getSelectorValue("customer_edit_modem_sn"),
        wifi_id: getSelectorText("customer_edit_wifi_id"),
        wifi_pass: getSelectorText("customer_edit_wifi_pass"),
        cmd: getSelectorText("btnSimpaneditcustomer") + "customer",
    };
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/setCustomer",
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
                    $("#jsGridcustomer")
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

function showMutasiCustomer(data) {
    //    var list = getComp('bmalist');
    //    console.log('disini');
    hideComp('customerlist');
    showComp('cardmutasicustomerlist');
    // setText('btnSimpanCustomer', 'Edit');
    // setText('formcustomertitle', 'Edit Bumdesma');

    $.ajax({
        url: base_url + "/loadpaketcombo",
        method: "GET",
        success: function (response) {
            $("#customer_mutasi_paket").html(response.data);
            setValue("customer_mutasi_paket", data.paket);
        },
    });

    setText("customer_mutasi_id", data.id);
    setText("customer_mutasi_id_pelanggan", data.id_pelanggan);



    //    resetForm('formbmalist');
    //    $('#formbmalist').get(0).reset();
}
;
function simpanmutasicustomer() {
    var formData = {
        id: getSelectorText("customer_mutasi_id"),
        id_pelanggan: getSelectorText("customer_mutasi_id_pelanggan"),        
        paket: getSelectorValue("customer_mutasi_paket"),  
        tgl_mutasi:getDate("customer_mutasi_tanggal"),      
        cmd: "mutasi",
    };
        // console.log(getDate("customer_mutasi_tanggal"));
        // return;
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/setCustomer",
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
                    batalAddmutasicustomer();
                    $("#jsGridcustomer")
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
function batalAddmutasicustomer() {
    // var frm = getComp('cardcustomerlist');
    // frm.style.display="none";
    hideComp('cardmutasicustomerlist');
    showComp('customerlist');
}
;

//Date picker
$('#customer_mutasi_tanggal').datetimepicker({
    format: 'YYYY-MM-DD'
});