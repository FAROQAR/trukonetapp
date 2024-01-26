<?= $this->extend('layout/template_2'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <section class="content" style="padding-top:10px;">
        <?= view('master/form/formpaket'); ?>
        <div id="paketlist" class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <?= $title ?>
                </h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <!--                        <div class="btn btn-success btn-sm" style="margin-right: 3px;">
                            <div class="fa fa-plus" onclick="showAddBma" role="button" ></div>
                        </div>-->
                        <div type="button" class="btn btn-success btn-sm" style="margin-right: 3px;"
                            onclick="showAddPaket()">
                            <i class="fa fa-plus"></i>
                        </div>
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="jsGridPaket"></div>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
<!-- /.content-wrapper -->
<div id="paketdetail-modal" class="modal">

    <!-- Modal content -->
    <div class="modal-content" style="width:400px;position: relative;margin: auto;">

        <div class="card card-warning" style="width:100%;height: 100%;position: relative;margin: auto;">
            <div class="card-header">
                <h3 id="paketdetail-modal-title" class="card-title">Removable</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool">
                        <i class="fas fa-times"
                            onclick="document.getElementById('paketdetail-modal').style.display = 'none'"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                The body of the card
            </div>
            <!-- /.card-body -->
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>
<?= $this->section('pageScript'); ?>
<script src="<?= base_url(); ?>/assets/js/paket.js">  
</script>
<?= $this->endSection(); ?>