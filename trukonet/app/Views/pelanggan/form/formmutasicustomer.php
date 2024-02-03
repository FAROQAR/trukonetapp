<!-- general form elements -->
<div id="cardmutasicustomerlist" class="card card-primary" style="display:none">
    <div class="card-header">
        <h3 id="formmutasicustomerlisttitle" class="card-title">Customer</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="formmutasicustomerlist" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="customer_mutasi_id" class="col-sm-1 col-form-label">ID</label>
                <div class="col-sm-3">
                    <label class="form-control" id="customer_mutasi_id" name="id" placeholder="auto"></label>
                </div>                
            </div>
            <div class="form-group row">               
                <label for="customer_mutasi_id_pelanggan" class="col-sm-1 col-form-label">IDPEL</label>
                <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="nomorpasang" placeholder="ID"> -->
                    <label class="form-control" id="customer_mutasi_id_pelanggan" name="id_pelanggan"
                        placeholder="auto"></label>
                </div>
            </div>
            <div class="form-group row">                
                <label for="customer_mutasi_paket" class="col-sm-1 col-form-label">Paket</label>
                <div class="col-sm-3">
                    <select class="form-control" id="customer_mutasi_paket" name="paket" placeholder="paket" required>
                    </select>
                </div>
            </div>
            <div class="form-group row">                
                <label for="customer_mutasi_tanggal" class="col-sm-1 col-form-label">Tanggal</label>
                <div class="col-sm-3">
                    <!-- <input type="text" class="form-control datetimepicker-input" id="customer_mutasi_tanggal" name="tanggal" placeholder="tanggal" required> -->
                    <div class="input-group date"  data-target-input="nearest">
                        <input type="text" id="customer_mutasi_tanggal" class="form-control datetimepicker-input" data-target="#customer_mutasi_tanggal"/>
                        <div class="input-group-append" data-target="#customer_mutasi_tanggal" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /.card-body -->

        <div class="card-footer">

            <button type="button" class="btn btn-danger" onclick="batalAddmutasicustomer()">Batal</button>
            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button> -->
            <button id="btnSimpanmutasicustomer" class="btn btn-primary" type="button"
                onclick="simpanmutasicustomer()">Edit</button>
        </div>
    </form>
</div>
<!-- /.card -->