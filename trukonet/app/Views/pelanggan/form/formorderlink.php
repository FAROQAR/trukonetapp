<!-- general form elements -->
<div id="cardregisterlist" class="card card-primary" style="display:none">
    <div class="card-header">
        <h3 id="formregisterlisttitle" class="card-title">Order Link</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="formregisterlist" class="form-horizontal" method="POST">
        <div class="card-body">
            <div class="form-group row">
                <label for="customer_reg_id" class="col-sm-1e col-form-label">ID</label>
                <div class="col-sm-2">
                    <!-- <input type="text" class="form-control" id="nomorregister" placeholder="ID"> -->
                    <label class="form-control" id="customer_reg_id" name="id" placeholder="auto"></label>
                </div>
                <label for="customer_reg_no_reg" class="col-sm-1 col-form-label">No.Reg</label>
                <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="customer_reg_no_reg" name="no_reg" placeholder="no_reg"> -->
                    <label class="form-control" id="customer_reg_no_reg" name="no_reg" placeholder="auto"></label>
                </div>

                <!-- <label for="nomor" class="col-sm-1 col-form-label">No</label>
                <div class="col-sm-2">
                    <div class="input-group date" id="tglpembentukan" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#tglpembentukan"/>
                        <div class="input-group-append" data-target="#tglpembentukan" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="form-group row">
                <label for="customer_reg_nama" class="col-sm-1e col-form-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="customer_reg_nama" name="nama" placeholder="nama" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="customer_reg_no_ktp" class="col-sm-1e col-form-label">No.KTP</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="customer_reg_no_ktp" name="no_ktp" placeholder="No.KTP">
                </div>
                <label for="customer_reg_kontak" class="col-sm-1 col-form-label">Telepon</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="customer_reg_kontak" name="kontak"
                        placeholder="telepon" required>
                </div>
            </div>
           
            <div class="form-group row">
                <label for="customer_reg_kecamatan" class="col-sm-1e col-form-label">Kecamatan</label>
                <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="customer_reg_kecamatan" name="kecamatan"
                        placeholder="Kecamatan"> -->
                        <select class="form-control" id="customer_reg_kecamatan" name="kecamatan" placeholder="kecamatan" required>
                    </select>
                </div>
                <label for="customer_reg_desa" class="col-sm-1 col-form-label">Desa</label>
                <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="customer_reg_desa" name="desa"
                        placeholder="Desa"> -->
                        <select class="form-control" id="customer_reg_desa" name="desa" placeholder="desa" required>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="customer_reg_dusun" class="col-sm-1e col-form-label">Dusun</label>
                <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="customer_reg_dusun" name="dusun"
                        placeholder="Dusun"> -->
                        <select class="form-control" id="customer_reg_dusun" name="dusun" placeholder="dusun" required>
                    </select>
                </div>
                <label for="customer_reg_area_code" class="col-sm-1 col-form-label">Code</label>
                <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="customer_reg_no_reg" name="no_reg" placeholder="no_reg"> -->
                    <label class="form-control" id="customer_reg_area_code" name="area_code" placeholder="auto"></label>
                </div>
            </div>

            <div class="form-group row">
            <label for="customer_reg_rt_rw" class="col-sm-1 col-form-label">RT/RW</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="customer_reg_rt_rw" name="rt_rw"
                        placeholder="RT/RW" required>
                </div>
                <label for="customer_reg_paket" class="col-sm-1e col-form-label">Paket</label>
                <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="customer_reg_paket" name="paket" placeholder="paket"> -->
                    <select class="form-control" id="customer_reg_paket" name="paket" placeholder="paket" required>
                    </select>
                </div>

                <!-- <label for="modem_sn" class="col-sm-1 col-form-label">Modem SN</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="modemsnregister" placeholder="Modem SN">
                </div> -->
            </div>
            <!-- <div class="form-group row">
                <div class="offset-sm-1 col-sm-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="aktif">
                        <label class="form-check-label" for="exampleCheck2">Status Aktif</label>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">

            <button type="button" class="btn btn-danger" onclick="batalAddregister()">Batal</button>
            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button> -->
            <button id="btnSimpanregister" type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<!-- /.card -->