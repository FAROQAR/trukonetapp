/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */



$(function () {
    $("#jsGrid1").jsGrid({
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
                    url: base_url + "/loadBma",
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
            {type: "control", width: 15, editButton: false, deleteButton: false,
                itemTemplate: function (value, item) {
                    var $result = jsGrid.fields.control.prototype.itemTemplate.apply(this, arguments);
                    var $iconPencil = $("<i>").attr({class: "fa fa-pencil-alt"});
                    var $iconTrash = $("<i>").attr({class: "fa fa-trash"});
                    var $iconSearch = $("<i>").attr({class: "fa fa-search"});

                    var $customEditButton = $("<button>")
                            .attr({class: "btn btn-outline-primary btn-xs", style: "margin-right: 3px;"})
                            .attr({role: "button"})
                            .attr({title: jsGrid.fields.control.prototype.editButtonTooltip})
                            .attr({id: "btn-edit-" + item.id})
                            .click(function (e) {
//                                alert("Edit: " + item.kode_bma);
                                showEditBma(item);
                                // document.location.href = item.id + "/edit";
                                e.stopPropagation();
                            })
                            .append($iconPencil);
                    var $customDeleteButton = $("<button>")
                            .attr({class: "btn btn-outline-danger btn-xs", style: "margin-right: 3px;"})
                            .attr({role: "button"})
                            .attr({title: jsGrid.fields.control.prototype.deleteButtonTooltip})
                            .attr({id: "btn-delete-" + item.id})
                            .click(function (e) {
                                alert("Delete: " + item.kode_bma);
                                // document.location.href = item.id + "/delete";
                                e.stopPropagation();
                            })
                            .append($iconTrash);
                    var $customSwitchButton = $("<button>")
                            .attr({class: "btn btn-outline-warning btn-xs", style: "margin-right: 3px;"})

                            .attr({role: "button"})
                            .attr({title: "Detail"})
                            .attr({id: "btn-detail-" + item.id})
                            .click(function (e) {
//                                alert("Detail: " + item.kode_bma);
                                var modal = document.getElementById("bmadetail-modal");
                                var judul = document.getElementById("bmadetail-modal-title");
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
            {title: 'Kode', name: 'kode_bma', soritng: false, width: 20},
            {title: 'Nama', name: 'nama', soritng: false, width: 110}

        ]
    });

});

$('#tglpembentukan').datetimepicker({format: 'DD-MM-YYYY'});

function showAddBma() {
//    var list = getComp('formbmalisttitle');
//    console.log(list);
    hideComp('bmalist');
    showComp('cardbmalist');
    setText('btnSimpanBma', 'Simpan');
    setText('formbmalisttitle', 'Tambah Bumdesma');
    resetForm('formbmalist');
    $.ajax({
                    url: base_url + "/loadbmaadd",
//                    data: filter,
                    dataType: "json",
                    success: function (response) {
                        var ret = {
                            data: response.data,
                            itemsCount: response.totalCount
                        };
                        kode_bma=ret.data.kode_bma;
                        setValue('kodebma',kode_bma);
    
                    }
                });
                
    
}
;

function showEditBma(data) {
//    var list = getComp('bmalist');
//    console.log('disini');
    hideComp('bmalist');
    showComp('cardbmalist');
    setText('btnSimpanBma', 'Edit');
    setText('formbmalisttitle', 'Edit Bumdesma');
//    resetForm('formbmalist');
//    $('#formbmalist').get(0).reset();
}
;
function batalAddBma() {
    hideComp('cardbmalist');
    showComp('bmalist');
}
;

function simpanAddBma(id, text) {
    alert(text);
}
;


