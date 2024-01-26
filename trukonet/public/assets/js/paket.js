/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */


$(function () {
    $("#jsGridPaket").jsGrid({
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
                    url: base_url + "/loadPaket",
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
                type: "control", width: 15, editButton: false, deleteButton: false,
                itemTemplate: function (value, item) {
                    var $result = jsGrid.fields.control.prototype.itemTemplate.apply(this, arguments);
                    var $iconPencil = $("<i>").attr({class: "fa fa-pencil-alt"});
                    var $iconTrash = $("<i>").attr({class: "fa fa-trash"});
                    // var $iconSearch = $("<i>").attr({class: "fa fa-search"});

                    var $customEditButton = $("<button>")
                            .attr({class: "btn btn-primary btn-xs", style: "margin-right: 5px;"})
                            .attr({role: "button"})
                            .attr({title: jsGrid.fields.control.prototype.editButtonTooltip})
                            .attr({id: "btn-edit-" + item.id})
                            .click(function (e) {
//                                alert("Edit: " + item.kode_bma);
                                showEditPaket(item);
                                // document.location.href = item.id + "/edit";
                                e.stopPropagation();
                            })
                            .append($iconPencil);
                    var $customDeleteButton = $("<button>")
                            .attr({class: "btn btn-danger btn-xs", style: "margin-right: 5px;"})
                            .attr({role: "button"})
                            .attr({title: jsGrid.fields.control.prototype.deleteButtonTooltip})
                            .attr({id: "btn-delete-" + item.id})
                            .click(function (e) {
                                // alert("Delete: " + item.kode_bma);
                                // document.location.href = item.id + "/delete";
                                Swal.fire({
                                    title: "Do you want to delete the changes?",
                                    showDenyButton: false,
                                    showCancelButton: true,
                                    confirmButtonText: "Delete"
                                  }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                      //Swal.fire("Deleted!", "", "success"); 
                                      deleteOdp(item.idpaket);
                                    } 
                                  });
                                e.stopPropagation();
                            })
                            .append($iconTrash);
                    

                    return $("<div>")                           
                            .append($customEditButton)
                            .append($customDeleteButton);

                }
            },
            { title: 'IDPAKET', name: 'idpaket', soritng: false, width: 20 },
            { title: 'NAMA_PAKET', name: 'nama_paket', soritng: false, width: 50 },
            { title: 'TARIF', name: 'tarif', soritng: false, width: 30 },


        ]
    });

});
function showAddPaket() {   
    
    hideComp('paketlist');
    showComp('cardpaketlist');
    setText('btnSimpanPaket', 'Simpan');
    setText('formpaketlisttitle', 'Add Paket');
    setText('idpaket_paket','');
    resetForm('formpaketlist');    
};
function batalAddPaket() {
    hideComp('cardpaketlist');
    showComp('paketlist');
};

$("#formpaketlist").on("submit", function (event) {
    var formData = {
        idpaket: $("#idpaket_paket").text(),
        nama_paket: $("#nama_paket_paket").val(),
        tarif: $("#tarif_paket").val(),
        cmd: $("#btnSimpanPaket").text(),
    };
    // console.log("nang kene");
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/paket",
        type: 'post',
        data: formData,
        cache: false,
        dataType: 'json',
        //   beforeSend: function() {
        //     $('#form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
        //   },
        success: function (response) {
            // console.log(response);
            if (response.success === true) {
                // console.log(response.message);

                Swal.fire({
                    // position: "top-end",
                    icon: "success",
                    title: response.message,
                    // showConfirmButton: false,
                    // timer: 1500
                }).then((result) => {
                    batalAddPaket(); 
                    $("#jsGridPaket").jsGrid("search", { query: '' }).done(function () {
                        
                    });
                });
                

            } else {
                Swal.fire({
                    toast: false,                   
                    icon: 'error',
                    title: response.message,                   
                    timer: 3000
                })
            }           
        }
    });  
    event.preventDefault();
});

function showEditPaket(data) {  
    hideComp('paketlist');
    showComp('cardpaketlist');
    setText('btnSimpanPaket', 'Edit');
    setText('formpaketlisttitle', 'Edit Paket');
    setText('idpaket_paket',data.idpaket);
    setValue('nama_paket_paket',data.nama_paket);
    setValue('tarif_paket',data.tarif);    
};

function deletePaket(data){
    var formData = {
        idpaket: data,
        cmd: "delete"
    };
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/paket",
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
                $("#jsGridPaket").jsGrid("search", { query: '' }).done(function () {
                    
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