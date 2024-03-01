$(function () {
    $("#jsGridticket").jsGrid({
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
                    url: base_url + "/loadTicket",
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
                    var $iconExecute = $("<i>").attr({ class: "fa fa-cog" });
                    var $iconAborted = $("<i>").attr({ class: "fa fa-times-circle" });

                    var $executeButton = $("<button>")
                        .attr({ class: "btn btn-success btn-sm", style: "margin-right: 3px;" })
                        .attr({ role: "button" })
                        .attr({ title: 'Execute Ticket' })
                        .attr({ id: "btn-exec-ticket-" + item.id })
                        .click(function (e) {
                            //    alert("Exec: " + item.id);
                            // showEditticket(item);
                            // document.location.href = item.id + "/edit";
                            Swal.fire({
                                title: "Apakah Ticket Akan di Eksekusi ?",
                                text: "Jalankan!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Yes"
                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    //Swal.fire("Deleted!", "", "success"); 
                                    setExecuteTicket(item);
                                }
                            });
                            e.stopPropagation();
                        })
                        .append($iconExecute);
                    var $abortedButton = $("<button>")
                        .attr({ class: "btn btn-danger btn-sm", style: "margin-right: 3px;" })
                        .attr({ role: "button" })
                        .attr({ title: "Cancel Ticket" })
                        .attr({ id: "btn-aborted-ticket-" + item.id })
                        .click(function (e) {
                            Swal.fire({
                                title: "Apakah Ticket tersebut akan di Batalkan ?",
                                text: "Jalankan!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Yes"
                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    //Swal.fire("Deleted!", "", "success"); 
                                    setAbortedTicket(item);
                                }
                            });
                            e.stopPropagation();
                        })
                        .append($iconAborted);

                    return $("<div>")
                        // .append($customSwitchButton)
                        .append($executeButton)
                        .append($abortedButton)
                        ;

                }
            },
            { title: 'ID', name: 'id', soritng: false, width: 65 },
            { title: 'NO.TICKET', name: 'no_ticket', soritng: false, width: 130 },
            { title: 'IDPEL', name: 'id_pelanggan', soritng: false, width: 130 },
            { title: 'NAMA', name: 'nama', soritng: false, width: 200 },
            { title: 'PROFILE', name: 'profile', soritng: false, width: 200 },
            { title: 'COMMENT', name: 'comment', soritng: false, width: 120 },
            { title: 'REF', name: 'action_ref', soritng: false, width: 65 },
            { title: 'TGL.TICKET', name: 'tgl_ticket', soritng: false, width: 130 },
            { title: 'TICKET.BY', name: 'ticket_by', soritng: false, width: 120 }


        ]
    });

});
$(document).ready(function () {
    $("#searchticket").on("keyup", function () {
        var ret = $(this).val().toLowerCase();
        $("#jsGridticket").jsGrid("search", { query: ret }).done(function () {
            // console.log("filtering completed ");
        });
    });
});
function cariTicketClick() {
    // console.log('asfda');
    setValue("searchticket", '');

    var ret = $("#searchticket").val();

    $("#jsGridticket").jsGrid("search", { query: ret }).done(function () {
        // console.log("filtering completed ");
    });
}

function setExecuteTicket(item) {
    var formData = {
        opt: item.action_ref,
        no_ticket: item.no_ticket,
        id_pelanggan: item.id_pelanggan,
        profile: item.profile,
        comment: item.comment
    };
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/setExecTicket",
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
                Swal.fire(response.message, "", "success");
                // batalAddOdp(); 
                var ret = $("#searchticket").val();
                $("#jsGridticket").jsGrid("search", { query: ret }).done(function () {

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

function setAbortedTicket(item) {
    var formData = {
        opt: item.action_ref,
        no_ticket: item.no_ticket,
        id_pelanggan: item.id_pelanggan,
        profile: item.profile,
        comment: item.comment
    };
    $.ajax({
        // fixBug get url from global function only
        // get global variable is bug!
        url: base_url + "/setAbortedTicket",
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
                Swal.fire(response.message, "", "success");
                // batalAddOdp(); 
                var ret = $("#searchticket").val();
                $("#jsGridticket").jsGrid("search", { query: ret }).done(function () {

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