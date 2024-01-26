<!-- general form elements -->
<div id="cardserverlist" class="card card-primary" style="display:none">
<div class="form-msg"></div>
    <div class="card-header">
        <h3 id="formserverlisttitle" class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="formserverlist" class="form-horizontal" method="POST">
        <div class="card-body">
            <div class="form-group row">
                <label for="id_server" class="col-sm-1 col-form-label">ID</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="id_server" name="id_server" placeholder="id server">
                </div>
                
                <!-- <label for="tglpembentukan" class="col-sm-1 col-form-label">Berdiri</label>
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
                <label for="lokasi" class="col-sm-1 col-form-label">Lokasi</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="lokasi">
                </div>
            </div>
            <div class="form-group row">
                <label for="core" class="col-sm-1 col-form-label">Core</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="core"  name="core" placeholder="core">
                </div>
                <label for="max_user" class="col-sm-1 col-form-label">Max User</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="max_user" name="max_user" placeholder="core">
                </div>
            </div>
            <div class="form-group row">
                <label for="dedicated_bandwith" class="col-sm-1 col-form-label">Bandwith</label>
                <div class="col-sm-2 input-group">
                    <input type="number" class="form-control" id="dedicated_bandwith" name="dedicated_bandwith" placeholder="dedicated_bandwith">
                    <div class="input-group-append">
                    <span class="input-group-text">Mb</span>
                  </div>
                </div>
                
                
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="button" class="btn btn-danger" onclick="batalAddServer()">Batal</button>
            <!-- <button id="btnSimpanServer" type="submit" class="btn btn-primary" onclick="simpanAddServer(this.id, this.textContent)">Simpan</button> -->
            <button id="btnSimpanServer" type="submit" class="btn btn-primary" >Simpan</button>
        </div>
    </form>
</div>
<!-- /.card -->