<?= $this->extend('layout/template_2'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <section class="content" style="padding-top:10px;">
        <div id="billprocesslist" class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <?= $title ?>
                </h3>
                
                <div class="card-tools">               
                    <div class="input-group input-group-sm" style="width: 400px;">
                        <!--                        <div class="btn btn-success btn-sm" style="margin-right: 3px;">
                            <div class="fa fa-plus" onclick="showAddBma" role="button" ></div>
                        </div>-->
                        <div type="button" class="btn btn-danger btn-sm" style="margin-right: 5px;"
                            onclick="genBill()">
                            <i class="fa fa-cogs"></i> Process Bill
                        </div>
                        <!-- <div class="input-group-append date" data-target-input="nearest" > -->
                                <input type="text" id="billprocess_thbl" name="datetimepicker"
                                    class="form-control datetimepicker-input" data-target="#billprocess_thbl" placeholder="Tahun Bulan"/>
                                <div class="input-group-append" data-target="#billprocess_thbl"
                                    data-toggle="datetimepicker" style="margin-right: 3px;">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            <!-- </div> -->
                        
                        <input type="text" id="billprocesscaritext" name="table_search" class="form-control float-right"
                            placeholder="Search">
                        <div class="input-group-append">
                            <button id="billprocesscari" type="submit" onClick="caribillprocess()" class="btn btn-default">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="jsGridbillprocess"></div>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>


<?= $this->endSection(); ?>
<?= $this->section("pageScript") ?>
<script src="<?= base_url(); ?>/assets/js/billprocess.js">
</script>
<script>

</script>
<?= $this->endSection(); ?>