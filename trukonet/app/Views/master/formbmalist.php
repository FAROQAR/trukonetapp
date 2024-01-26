<!-- general form elements -->
<div id="cardbmalist" class="card card-primary" style="display:none">
    <div class="card-header">
        <h3 id="formbmalisttitle" class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="formbmalist" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="kodebma" class="col-sm-1 col-form-label">Kode</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="kodebma" placeholder="auto">
                </div>
                
                <label for="tglpembentukan" class="col-sm-1 col-form-label">Berdiri</label>
                <div class="col-sm-2">
                    <div class="input-group date" id="tglpembentukan" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#tglpembentukan"/>
                        <div class="input-group-append" data-target="#tglpembentukan" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="namabma" class="col-sm-1 col-form-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="namabma" placeholder="nama">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-1 col-form-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="alamat" placeholder="alamat">
                </div>
            </div>
            <div class="form-group row">
                <label for="telp" class="col-sm-1 col-form-label">Telepon</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="telp" placeholder="telepon">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-1 col-sm-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="aktif">
                        <label class="form-check-label" for="exampleCheck2">Status Aktif</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="button" class="btn btn-danger" onclick="batalAddBma()">Batal</button>
            <button id="btnSimpanBma" type="submit" class="btn btn-primary" onclick="simpanAddBma(this.id, this.textContent)">Simpan</button>
        </div>
    </form>
</div>
<!-- /.card -->