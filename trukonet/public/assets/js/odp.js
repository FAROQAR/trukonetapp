
$(document).ready(function () {
    var app = {
        show: function () {
            $.ajax({
                url: base_url + "/loadCoreCombo",
                method: "GET",
                success: function (response) {
                    $("#idcore_odp").html(response.data)
                }
            });
            $.ajax({
                url: base_url + "/loadratiocombo",
                method: "GET",
                success: function (response) {
                    $("#ratio_odp").html(response.data)
                }
            });
        }
    }
    app.show();

});

$(function () {
    $("#jsGridOdp").jsGrid({
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
                    url: base_url + "/loadOdp",
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
                    // var $iconSearch = $("<i>").attr({class: "fa fa-search"});

                    var $customEditButton = $("<button>")
                            .attr({class: "btn btn-primary btn-xs", style: "margin-right: 5px;"})
                            .attr({role: "button"})
                            .attr({title: jsGrid.fields.control.prototype.editButtonTooltip})
                            .attr({id: "btn-edit-" + item.id})
                            .click(function (e) {
//                                alert("Edit: " + item.kode_bma);
                                showEditOdp(item);
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
                                      deleteOdp(item.idodp);
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
            { title: 'ID', name: 'idodp', soritng: false, width: 20 },
            { title: 'SLOT', name: 'slot', soritng: false, width: 20 },
            { title: 'IDCORE', name: 'idcore', soritng: false, width: 20 },
            { title: 'RATIO', name: 'ratio', soritng: false, width: 25 },
            { title: 'SLOT_USE', name: 'slot_use', soritng: false, width: 20 }
        ]
    });

    function paint(ev){
        $("#jsGridOdp tbody tr").each((i,tr)=>{
            // console.log('painter');
            if(tr.children[2]!== undefined){
                $(tr).children().css("background-color",+tr.children[2].textContent==tr.children[5].textContent?"#EA9999":"");
                $(tr).children().css("font-weight",+tr.children[2].textContent==tr.children[5].textContent?"bold":"normal");
                
            }
            
        //   
        })
      }

});



$("#formodplist").on("submit", function (event) {
    var formData = {
        idodp: $("#idodp_odp").val(),
        slot: $("#slot_odp").val(),
        idcore: $("#idcore_odp").val(),
        ratio: $("#ratio_odp").val(),
        slot_use: $("#slot_use_odp").val(),
        cmd: $("#btnSimpanOdp").text(),
    };
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/odp",
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
                    batalAddOdp(); 
                    $("#jsGridOdp").jsGrid("search", { query: '' }).done(function () {
                        
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
function deleteOdp(data){
    var formData = {
        idodp: data,
        cmd: "delete"
    };
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/odp",
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
                $("#jsGridOdp").jsGrid("search", { query: '' }).done(function () {
                    
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
function showAddOdp() {
    //    var list = getComp('formodplisttitle');
    //    console.log(list);
    hideComp('odplist');
    showComp('cardodplist');
    setText('btnSimpanOdp', 'Simpan');
    setText('formodplisttitle', 'Add Odp');
    resetForm('formodplist');
    //     $.ajax({
    //                     url: base_url + "/loadodpadd",
    // //                    data: filter,
    //                     dataType: "json",
    //                     success: function (response) {
    //                         var ret = {
    //                             data: response.data,
    //                             itemsCount: response.totalCount
    //                         };
    //                         kode_odp=ret.data.kode_odp;
    //                         setValue('kodeodp',kode_odp);

    //                     }
    //                 });


}
;

function showEditOdp(data) {
    //    var list = getComp('odplist');
    //    console.log('disini');
    hideComp('odplist');
    showComp('cardodplist');
    setText('btnSimpanOdp', 'Edit');
    setText('formodplisttitle', 'Edit ODP');
    setValue('idodp_odp',data.idodp);
    setValue('slot_odp',data.slot);
    setValue('idcore_odp',data.idcore);
    setValue('ratio_odp',data.ratio);
    setValue('slot_use_odp',data.slot_use);
    //    resetForm('formodplist');
    //    $('#formodplist').get(0).reset();
}
;
function batalAddOdp() {
    hideComp('cardodplist');
    showComp('odplist');
}
;

function simpanAddOdp(id, text) {
    console.log(id);
    console.log(text);
}
;


