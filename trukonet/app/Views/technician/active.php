<?= $this->extend('layout/template_2'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content" style="padding-top:10px;" id="sectionactive">
        <!-- Default box -->
        <div id="secretactivelist" class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <?= $title ?>
                </h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 300px;">
                        <button type="button" class="btn btn-primary btn-sm" id="btnloadsecretactive"
                            onclick="loaddatasecretactive()" style="margin-right: 3px;">
                            Load Secret
                            <i class="fas fa-cogs"></i>

                        </button>
                        <input type="text" name="table_search" id="searchsecretactive" class="form-control float-right"
                            placeholder="Search">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-default" id="btnsearchsecretactive"
                                onclick="cariSecretActiveClick()">
                                <i class="fas fa-search"></i>

                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row" id="jsGridactive">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0" id="pagingactive">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
<!-- /.content-wrapper -->
<div id="activedetail-modal" class="modal">

    <!-- Modal content -->
    <div class="modal-content" style="width:400px;position: relative;margin: auto;">

        <div class="card card-warning" style="width:100%;height: 100%;position: relative;margin: auto;">
            <div class="card-header">
                <h3 id="activedetail-modal-title" class="card-title">Removable</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool">
                        <i class="fas fa-times"
                            onclick="document.getElementById('activedetail-modal').style.display = 'none'"></i>
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
        -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>