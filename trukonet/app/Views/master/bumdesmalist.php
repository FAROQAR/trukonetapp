<?= $this->extend('layout/template_2'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $breadcrumbhref ?>"><?= $breadcrumbhreftext ?></a></li>
              <li class="breadcrumb-item active"><?= $breadcrumbactive ?></li>
            </ol>
          </div>
        </div>
      </div>
    </section> -->

    <!-- Main content -->
    <section class="content" style="padding-top:10px;">
          <?= view('master/formbmalist'); ?>
        <div id="bmalist" class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $title ?></h3>
                <div class="card-tools">

                    <div class="input-group input-group-sm" style="width: 250px;">
<!--                        <div class="btn btn-success btn-sm" style="margin-right: 3px;">
                            <div class="fa fa-plus" onclick="showAddBma" role="button" ></div>
                        </div>-->
                        <div type="button" class="btn btn-success btn-sm" style="margin-right: 3px;" onclick="showAddBma()">
                            <i class="fa fa-plus" ></i>
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
                <div id="jsGrid1"></div>
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
<div id="bmadetail-modal" class="modal">

    <!-- Modal content -->
    <div  class="modal-content" style="width:400px;position: relative;margin: auto;">

        <div class="card card-warning" style="width:100%;height: 100%;position: relative;margin: auto;">
            <div class="card-header">
                <h3 id="bmadetail-modal-title" class="card-title">Removable</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" >
                        <i class="fas fa-times" onclick="document.getElementById('bmadetail-modal').style.display = 'none'"></i>
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

        <!--      <div class="modal-header">
                                    <h4 class="modal-title">Logout</h4>
                                    <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
                                    </button>
                                </div>
            <div class="modal-body">
              <p>Some text in the Modal Body</p>
              <p>Some other text...</p>
            </div>
        -->    <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>
