
$(document).ready(function(){   
    var app = {
        show: function(){
            $.ajax({
                url:  base_url + "/loadServerCombo", 
                method: "GET",
                success: function(response){
                    $("#id_server_core").html(response.data)
                }
            });
            // loadTable();
            // var nTable = $('#jsGridCore').DataTable();
        }        
    }
    app.show();
    
});

$(function () {
    $("#jsGridCore").jsGrid({
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
                    url: base_url + "/loadServercore",
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
            
            {title: 'ID', name: 'idcore', soritng: false, width: 25},
            {title: 'IDServer', name: 'id_server', soritng: false, width: 25},
            {title: 'Core No', name: 'core_no', soritng: false, width: 20},
            {title: 'Line Color', name: 'line_color', soritng: false, width: 50},
            {title: 'Max User', name: 'max_user', soritng: false, width: 30},
            {title: 'Laser Out', name: 'laser_out', soritng: false, width: 70},
            {title: 'In Use', name: 'in_use', soritng: false, width:20},

        ]
    });

    

});
    
function loadTable(){
    $("#jsGridCore").jsGrid({
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
                    url: base_url + "/loadServercore",
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
            
            {title: 'ID', name: 'idcore', soritng: false, width: 25},
            {title: 'IDServer', name: 'id_server', soritng: false, width: 25},
            {title: 'Core No', name: 'core_no', soritng: false, width: 20},
            {title: 'Line Color', name: 'line_color', soritng: false, width: 50},
            {title: 'Max User', name: 'max_user', soritng: false, width: 30},
            {title: 'Laser Out', name: 'laser_out', soritng: false, width: 70},
            {title: 'In Use', name: 'in_use', soritng: false, width:20},

        ]
    });
}

$("#formservercorelist").on("submit", function (event) {
    var formData = {
        idcore: $("#idcore_servercore").val(),
        id_server: $("#id_server_core").val(),
        core_no: $("#core_no").val(),
        line_color: $("#line_color_core").val(),
        max_user: $("#max_user_core").val(),
        laser_out: $("#laser_out_core").val(),
        in_use: $("#in_use_switch").val(),            
        cmd: $("#btnSimpanServercore").text(),
    };
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/servercore",
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
                    timer: 1500
                });
                hideComp('cardservercorelist');
                showComp('servercorelist');
                //var oTable = $('#jsGridCore').DataTable();
                // // to reload
                // oTable.ajax.reload();
                loadTable();
                
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
    function showAddServercore() {
//    var list = getComp('formservercorelisttitle');
//    console.log(list);
    hideComp('servercorelist');
    showComp('cardservercorelist');
    setText('btnSimpanServercore', 'Simpan');
    setText('formservercorelisttitle', 'Add Servercore');
    resetForm('formservercorelist');
//     $.ajax({
//                     url: base_url + "/loadservercoreadd",
// //                    data: filter,
//                     dataType: "json",
//                     success: function (response) {
//                         var ret = {
//                             data: response.data,
//                             itemsCount: response.totalCount
//                         };
//                         kode_servercore=ret.data.kode_servercore;
//                         setValue('kodeservercore',kode_servercore);
    
//                     }
//                 });
                
    
}
;

function showEditServercore(data) {
//    var list = getComp('servercorelist');
//    console.log('disini');
    hideComp('servercorelist');
    showComp('cardservercorelist');
    setText('btnSimpanBma', 'Edit');
    setText('formservercorelisttitle', 'Edit Bumdesma');
//    resetForm('formservercorelist');
//    $('#formservercorelist').get(0).reset();
}
;
function batalAddServercore() {
    hideComp('cardservercorelist');
    showComp('servercorelist');
}
;

function simpanAddServercore(id, text) {
    console.log(id);
    console.log(text);
}
;


