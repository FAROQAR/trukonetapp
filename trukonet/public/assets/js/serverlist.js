/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */



$(function () {
    $("#jsGridServer").jsGrid({
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
                    url: base_url + "/loadServer",
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
//                    var $iconPencil = $("<i>").attr({class: "fa fa-pencil-alt"});
//                    var $iconTrash = $("<i>").attr({class: "fa fa-trash"});
                    var $iconSearch = $("<i>").attr({class: "fa fa-search"});

//                    var $customEditButton = $("<button>")
//                            .attr({class: "btn btn-outline-primary btn-xs", style: "margin-right: 3px;"})
//                            .attr({role: "button"})
//                            .attr({title: jsGrid.fields.control.prototype.editButtonTooltip})
//                            .attr({id: "btn-edit-" + item.id})
//                            .click(function (e) {
////                                alert("Edit: " + item.kode_server);
//                                showEditBma(item);
//                                // document.location.href = item.id + "/edit";
//                                e.stopPropagation();
//                            })
//                            .append($iconPencil);
//                    var $customDeleteButton = $("<button>")
//                            .attr({class: "btn btn-outline-danger btn-xs", style: "margin-right: 3px;"})
//                            .attr({role: "button"})
//                            .attr({title: jsGrid.fields.control.prototype.deleteButtonTooltip})
//                            .attr({id: "btn-delete-" + item.id})
//                            .click(function (e) {
//                                alert("Delete: " + item.kode_server);
//                                // document.location.href = item.id + "/delete";
//                                e.stopPropagation();
//                            })
//                            .append($iconTrash);
                    var $customSwitchButton = $("<button>")
                            .attr({class: "btn btn-outline-warning btn-xs", style: "margin-right: 3px;"})

                            .attr({role: "button"})
                            .attr({title: "Detail"})
                            .attr({id: "btn-detail-" + item.id})
                            .click(function (e) {
//                                alert("Detail: " + item.kode_server);
                                var modal = document.getElementById("serverdetail-modal");
                                var judul = document.getElementById("serverdetail-modal-title");
                                judul.innerHTML = item.kode_server;
                                modal.style.display = "block";

                                e.stopPropagation();
                            })
                            .append($iconSearch);

                    return $("<div>")
                            .append($customSwitchButton);
//                            .append($customEditButton)
//                            .append($customDeleteButton);

                }
            },
            {title: 'ID', name: 'id_server', soritng: false, width: 25},
            {title: 'Lokasi', name: 'lokasi', soritng: false, width: 110},
            {title: 'Core', name: 'core', soritng: false, width: 20},
            {title: 'Max User', name: 'max_user', soritng: false, width: 30},
            //{title: 'Merk/No,SN', name: 'merk_no_seri', soritng: false, width: 110},
            {title: 'Bandwith', name: 'dedicated_bandwith', soritng: false, width:30},
            

        ]
    });

});



function showAddServer() {
//    var list = getComp('formserverlisttitle');
//    console.log(list);
    hideComp('serverlist');
    showComp('cardserverlist');
    setText('btnSimpanServer', 'Simpan');
    setText('formserverlisttitle', 'Add Server');
    resetForm('formserverlist');
//     $.ajax({
//                     url: base_url + "/loadserveradd",
// //                    data: filter,
//                     dataType: "json",
//                     success: function (response) {
//                         var ret = {
//                             data: response.data,
//                             itemsCount: response.totalCount
//                         };
//                         kode_server=ret.data.kode_server;
//                         setValue('kodeserver',kode_server);
    
//                     }
//                 });
                
    
}
;

function showEditServer(data) {
//    var list = getComp('serverlist');
//    console.log('disini');
    hideComp('serverlist');
    showComp('cardserverlist');
    setText('btnSimpanBma', 'Edit');
    setText('formserverlisttitle', 'Edit Bumdesma');
//    resetForm('formserverlist');
//    $('#formserverlist').get(0).reset();
}
;
function batalAddServer() {
    hideComp('cardserverlist');
    showComp('serverlist');
}
;

function simpanAddServer(id, text) {
    console.log(id);
    console.log(text);
}
;


