<!-- general form elements -->
<div id="cardservercorelist" class="card card-primary" style="display:none">
    <div class="form-msg"></div>
    <div class="card-header">
        <h3 id="formservercorelisttitle" class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="formservercorelist" class="form-horizontal" method="POST">
        <div class="card-body">
            <div class="form-group row">
                <label for="id_servercore" class="col-sm-1 col-form-label">ID Core</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="idcore_servercore" name="idcore"
                        placeholder="id servercore">
                </div>
            </div>

            <div class="form-group row">
                <label for="id_server" class="col-sm-1 col-form-label">ID Server</label>
                <div class="col-sm-3">
                    <select class="form-control" id="id_server_core" name="id_server" placeholder="id_server">
                    </select>

                </div>
            </div>
            <div class="form-group row">
                <label for="core" class="col-sm-1 col-form-label">Core No</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="core_no" name="core_no" placeholder="core nomor">
                </div>
                <label for="line_color" class="col-sm-1 col-form-label">Line Color</label>
                <div class="col-sm-2">
                    <!-- <input type="text" class="form-control" id="line_color_core" name="line_color"
                        placeholder="Line Color"> -->
                    <select class="form-control" id="line_color_core" name="line_color" placeholder="line_color">
                        <option style="background-color:blue; color:white;" value="blue">Blue</option>
                        <option style="background-color:red; color:white; " value="red">Red</option>
                        <option style="background-color:orange; color:white;" value="orange">Orange</option>
                        <option style="background-color:green; color:white; " value="green">Green</option>
                        <option style="background-color:brown; color:white; " value="brown">Brown</option>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="max_user" class="col-sm-1 col-form-label">Max User</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="max_user_core" name="max_user" placeholder="Max User">
                </div>
                <label for="laser_out" class="col-sm-1 col-form-label">Laser Out</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="laser_out_core" name="laser_out"
                        placeholder="Laser Out">
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-1 col-sm-3">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" class="custom-control-input" id="in_use_switch" name="in_use">
                        <label class="custom-control-label" for="in_use_switch">In Use</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="button" class="btn btn-danger" onclick="batalAddServercore()">Batal</button>
            <!-- <button id="btnSimpanServer" type="submit" class="btn btn-primary" onclick="simpanAddServercore(this.id, this.textContent)">Simpan</button> -->
            <button id="btnSimpanServercore" type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<!-- /.card -->