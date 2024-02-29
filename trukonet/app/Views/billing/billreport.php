<?= $this->extend('layout/template_2'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <section class="content" style="padding-top:10px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <div class="input-group input-group-sm" style="width: 650px;">
                            <label for="billreport_tgl_lunas" class="col-sm-3 ">Tanggal Lunas</label>
                            <input type="text" id="billreport_tgl_lunas" name="datetimepicker"
                                class="form-control datetimepicker-input" data-target="#billreport_tgl_lunas"
                                placeholder="Tanggal Lunas" />
                            <div class="input-group-append" data-target="#billreport_tgl_lunas"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <div type="button" class="btn btn-success btn-sm" style="margin-left: 5px;"
                                onclick="previewreport()">
                                <i class="fa fa-cogs"></i> Preview
                            </div>
                            <div type="button" class="btn btn-success btn-sm" style="margin-left: 5px;"
                                onclick="previewdetail()">
                                <i class="fa fa-cogs"></i> Detail
                            </div>
                            <input type="text" id="billreport_thbl" name="datetimepicker" 
                                class="form-control datetimepicker-input" data-target="#billreport_thbl"
                                placeholder="Tahun Bulan" style="margin-left: 5px;"/>
                            <div class="input-group-append" data-target="#billreport_thbl" data-toggle="datetimepicker"
                                style="margin-right: 3px;">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <div type="button" class="btn btn-success btn-sm" style="margin-left: 5px;"
                                onclick="previewrekap()">
                                <i class="fa fa-cogs"></i> Rekap
                            </div>
                        </div>

                        <!-- <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test. -->
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    BumDesa Berkah Amanah <br>
                                    <!-- <small>Date: 2/10/2014</small> -->
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <!-- From -->
                                <address>
                                    <!-- <strong>Admin, Inc.</strong><br> -->
                                    Jl. Silayar RT 02 RW 05<br>
                                    Polaman, Truko, Kangkung<br>
                                    <!-- Phone: (804) 123-5432<br>
                                    Email: info@almasaeedstudio.com -->
                                </address>
                            </div>
                            <!-- /.col -->
                            <!-- <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>John Doe</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    Phone: (555) 539-1037<br>
                                    Email: john.doe@example.com
                                </address>
                            </div> -->
                            <!-- /.col -->
                            <!-- <div class="col-sm-4 invoice-col">
                                <b>Invoice #007612</b><br>
                                <br>
                                <b>Order ID:</b> 4F3S8J<br>
                                <b>Payment Due:</b> 2/22/2014<br>
                                <b>Account:</b> 968-34567
                            </div> -->
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row ">
                            <div class="col-10">
                                <h5>
                                    Rekap Pembayaran Internet Desa <small class="float-right" id="tglreport"> Tanggal:
                                        2/10/2014 </small>
                                </h5>
                            </div>
                        </div>
                        <!-- Table row -->
                        <div class="row">
                            <div class="col-10 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Pelanggan</th>
                                            <th>Keterangan</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="reppel1" width="80px">0</td>
                                            <td width="80px">Tagihan</td>
                                            <td id="reptagihan" align="right" width="80px">0</td>
                                        </tr>
                                        <tr>
                                            <td id="reppel2" width="80px">0</td>
                                            <td width="80px">Admin</td>
                                            <td id="repadmin" align="right" width="80px">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <!-- <p class="lead">Payment Methods:</p>
                                <img src="../../dist/img/credit/visa.png" alt="Visa">
                                <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                                <img src="../../dist/img/credit/american-express.png" alt="American Express">
                                <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                    handango imeem
                                    plugg
                                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                </p> -->
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead" id="tgltotal">Total 2/22/2014</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td id="repsubtotal">0</td>
                                        </tr>
                                        <!-- <tr>
                                            <th>Tax (9.3%)</th>
                                            <td>$10.34</td>
                                        </tr> -->

                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <!-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                        class="fas fa-print"></i> Print</a> -->
                                <!-- <button type="button" class="btn btn-success float-right"><i
                                        class="far fa-credit-card"></i> Submit
                                    Payment
                                </button> -->
                                <button type="button" class="btn btn-primary" style="margin-left: 5px;"
                                    onclick="printreport()">
                                    <i class="fas fa-print"></i> Print
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>


<?= $this->endSection(); ?>
<?= $this->section("pageScript") ?>
<script>
    $(function () {
        // init
        $('#billreport_tgl_lunas').datetimepicker({ format: 'YYYY-MM-DD', defaultDate: new Date() });

        //detect change
        $("#billreport_tgl_lunas").on("change.datetimepicker", function (e) {
            if (e.oldDate !== e.date) {
                // alert('You picked: ' + new Date(e.date).toLocaleDateString('en-US'))
                let tgl = new Date(e.date);
                let d = tgl.getDate();
                let m = tgl.getMonth() + 1;
                let y = tgl.getFullYear();
                let ret = y + '-' + ((m < 10) ? ('0' + m) : m) + '-' + ((d < 10) ? ('0' + d) : d);
                var retu = ((d < 10) ? ('0' + d) : d) + '-' + ((m < 10) ? ('0' + m) : m) + '-' + y;
                setText('tgltotal', retu);
                setText('tglreport', retu);
                previewreport();
            }
        });

        $('#tglreport').onshow = previewreport();
        // $('#tgltotal').onshow=settanggal();

        $('#billreport_thbl').datetimepicker({
            format: 'YYYY-MM',
            defaultDate: new Date(),

            // format: "mm/yyyy",
            // startView: "months", 
            minViewMode: 1,

        });

        //detect change
        $("#billreport_thbl").on("change.datetimepicker", function (e) {
            if (e.oldDate !== e.date) {
                // alert('You picked: ' + new Date(e.date).toLocaleDateString('en-US'))
                let tgl = new Date(e.date);
                let d = tgl.getDate();
                let m = tgl.getMonth() + 1;
                let y = tgl.getFullYear();
                let ret = y + ((m < 10) ? ('0' + m) : m);
                // // console.log(ret );
                // var retu = $("#billprocesscaritext").val();
                // // $("#jsGridbillprocess").jsGrid("search", { query: { cari: retu, thbl: ret }}).done(function () {
                // //     // console.log("filtering completed " );
                // // });
                // searchBillProcess(ret, retu);
            }
        })
    });
    function settanggal() {
        var retu = $('#billreport_tgl_lunas').val();
        var tgl = retu.split('-');
        retu = tgl[2] + '-' + tgl[1] + '-' + tgl[0];
        setText('tgltotal', 'Tanggal ' + retu);
        setText('tglreport', 'Total ' + retu);
    }
    function previewreport() {
        var retu = $('#billreport_tgl_lunas').val();
        var tgl = retu.split('-');
        var retu1 = tgl[2] + '-' + tgl[1] + '-' + tgl[0];
        setText('tglreport', 'Tanggal ' + retu1);
        setText('tgltotal', 'Total ' + retu1);

        $.ajax({
            url: base_url + "/billrekap",
            type: 'get',
            data: { tgl: retu },
            cache: false,
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.success === true) {
                    let data = response.data;

                    setText('reppel1', data.pelanggan);
                    setText('reppel2', data.pelanggan);
                    setText('reptagihan', intlFormatNumber(data.tagihan, 'en-US'));
                    setText('repadmin', intlFormatNumber(data.admin, 'en-US'));
                    setText('repsubtotal', intlFormatNumber(data.total_tagihan, 'en-US'));
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

    function printreport() {
        var retu = $('#billreport_tgl_lunas').val();
        $.ajax({
            url: base_url + "/billrekap",
            type: 'get',
            data: { tgl: retu },
            cache: false,
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.success === true) {
                    var tgl = retu.split('-');
                    var retu1 = tgl[2] + '-' + tgl[1] + '-' + tgl[0];
                    let data = response.data;
                    let formData = {
                        tglreport: retu1,
                        tgltotal: retu1,
                        reppel1: data.pelanggan,
                        reppel2: data.pelanggan,
                        reptagihan: intlFormatNumber(data.tagihan, 'en-US'),
                        repadmin: intlFormatNumber(data.admin, 'en-US'),
                        repsubtotal: intlFormatNumber(data.total_tagihan, 'en-US')
                    };
                    window.open(base_url + '/printbillreport?data=' + JSON.stringify(formData), '_blank');
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
    function previewdetail() {
        var retu = $('#billreport_tgl_lunas').val();
        var tgl = retu.split('-');
        var retu1 = tgl[2] + '-' + tgl[1] + '-' + tgl[0];
        window.open(base_url + '/billdetail?tgl=' + retu, '_blank');
    }
    function previewrekap() {
        var $thbl = $('#billreport_thbl').val().replace('-', '');
        window.open(base_url + '/billrekapbulan?thbl=' + $thbl, '_blank');
    }
</script>
<?= $this->endSection(); ?>