<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bill Report Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
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
                        </div>
                        <!-- /.row -->
                        <div class="row ">
                            <div class="col-10">
                                <h5>
                                    Rekap Pembayaran Internet Desa <small class="float-right" > Tanggal:
                                    <?= $profile->tglreport; ?> </small>
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
                                            <td id="reppel1" width="80px"><?= $profile->reppel1; ?></td>
                                            <td width="80px">Tagihan</td>
                                            <td align="right" width="80px"><?= $profile->reptagihan; ?></td>
                                        </tr>
                                        <tr>
                                            <td id="reppel2" width="80px"><?= $profile->reppel2; ?></td>
                                            <td width="80px">Admin</td>
                                            <td align="right" width="80px"><?= $profile->repadmin; ?></td>
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
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead" >Total <?= $profile->tgltotal; ?></p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td ><?= $profile->repsubtotal; ?></td>
                                        </tr>                                       
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      
                        
                    </div>
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
