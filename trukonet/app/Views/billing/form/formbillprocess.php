<!-- general form elements -->
<div id="cardbillprocesslist" class="card card-danger" style="display:none">
    <div class="form-msg"></div>
    <div class="card-header">
        <h3 id="formbillprocesslisttitle" class="card-title">Pembayaran</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="formbillprocesslist" class="form-horizontal" method="POST">
        <div class="card-body">
            <div class="form-group row">
                <label for="id_pelanggan_billprocess" class="col-sm-1 col-form-label">ID</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="id_pelanggan_billprocess" name="id_pelanggan"
                        placeholder="id pelanggan">
                </div>
            </div>

            <div class="form-group row">
                <label for="thbl_billprocess" class="col-sm-1 col-form-label">THBL</label>
                <div class="col-sm-2">
                    <div class="input-group date" data-target-input="nearest">
                        <input type="text" id="thbl_billprocess" name="datetimepicker"
                            class="form-control datetimepicker-input" data-target="#thbl_billprocess"
                            placeholder="Tahun Bulan" />
                        <div class="input-group-append" data-target="#thbl_billprocess" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="button" class="btn btn-danger" onclick="batalbillprocess()">Batal</button>
            <!-- <button id="btnSimpanServer" type="submit" class="btn btn-primary" onclick="simpanAddServer(this.id, this.textContent)">Simpan</button> -->
            <button id="btnbillprocess" type="submit" class="btn btn-success" onclick="genBillIdpel()">Process</button>
        </div>
    </form>
</div>
<!-- /.card -->