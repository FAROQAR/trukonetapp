<!-- general form elements -->
<div id="cardorderlinklist" class="card card-primary" style="display:none">
    <div class="card-header">
        <h3 id="formorderlinklisttitle" class="card-title">Order Link</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="formorderlinklist" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="id" class="col-sm-1 col-form-label">ID</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="nomororderlink" placeholder="ID">
                </div>
                <label for="idpel" class="col-sm-1 col-form-label">IdPel</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="idpelorderlink" placeholder="idpel">
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
                <label for="nama" class="col-sm-1 col-form-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="namaorderlink" placeholder="nama">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-1 col-form-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="alamatorderlink" placeholder="alamat">
                </div>
            </div>
            <div class="form-group row">
                <label for="telp" class="col-sm-1 col-form-label">Telepon</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="telporderlink" placeholder="telepon">
                </div>

                <label for="paket" class="col-sm-1 col-form-label">Paket</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="paketorderlink" placeholder="paket">
                </div>

            </div>
            <div class="form-group row">
                <label for="modem_sn" class="col-sm-1 col-form-label">Modem SN</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="modemsnorderlink" placeholder="Modem SN">
                </div>
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
        
            <button type="button" class="btn btn-danger" onclick="batalAddOrderlink()">Batal</button>
            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button> -->
            <button id="btnSimpanorderlink" type="submit" class="btn btn-primary" onclick="simpanAddorderlink(this.id, this.textContent)">Simpan</button>
        </div>
    </form>
</div>
<!-- /.card -->