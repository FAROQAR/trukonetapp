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
                    var $iconTrash = $("<i>").attr({ class: "fa fa-trash" });
                    var $iconSearch = $("<i>").attr({ class: "fa fa-search" });

                    var $customEditButton = $("<button>")
                        .attr({ class: "btn btn-outline-primary btn-xs", style: "margin-right: 3px;" })
                        .attr({ role: "button" })
                        .attr({ title: jsGrid.fields.control.prototype.editButtonTooltip })
                        .attr({ id: "btn-edit-order-" + item.id })
                        .click(function (e) {
                            //                                alert("Edit: " + item.kode_bma);
                            showEditCustomer(item);
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
                            var modal = document.getElementById("customerdetail-modal");
                            var judul = document.getElementById("customerdetail-modal-title");
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
            { title: 'IDPEL', name: 'idpel', soritng: false, width: 130 },
            { title: 'PAKET', name: 'paket', soritng: false, width: 100 },
            
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

function showEditCustomer(data) {
    //    var list = getComp('bmalist');
    //    console.log('disini');
    hideComp('customerlist');
    showComp('cardcustomerlist');
    // setText('btnSimpanCustomer', 'Edit');
    // setText('formcustomertitle', 'Edit Bumdesma');
    console.log(data);
    setValue('nomorcustomer', data.no);
    setValue('idpelcustomer', data.idpel);
    setValue('namacustomer', data.nama);
    setValue('alamatcustomer', data.desa + ', ' + data.dusun + ' ' + data.rtrw);
    setValue('telpcustomer', data.kontak);
    setValue('paketcustomer', data.paket==1?'5 Mbps':data.paket==2?'10 Mbps':data.paket==3?'20 Mbps':'');
    setValue('modemsncustomer', data.modemsn);
    
    
    
    //    resetForm('formbmalist');
    //    $('#formbmalist').get(0).reset();
}
;
function batalAddcustomer() {
    // var frm = getComp('cardcustomerlist');
    // frm.style.display="none";
    hideComp('cardcustomerlist');
    showComp('customerlist');
}
;

function simpanAddCustomer(id, text) {
    alert(text);
}
;


