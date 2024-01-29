<!-- general form elements -->
<div id="cardpasanglist" class="card card-primary" style="display:none">
    <div class="card-header">
        <h3 id="formpasanglisttitle" class="card-title">Order Link</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="formpasanglist" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="customer_reg_no_reg_pasang" class="col-sm-1e col-form-label">No.Reg</label>
                <div class="col-sm-2">
                    <!-- <input type="text" class="form-control" id="nomorpasang" placeholder="ID"> -->
                    <label class="form-control" id="customer_reg_no_reg_pasang" name="NoReg"
                        placeholder="auto"></label>
                </div>
                <label for="customer_reg_id_pelanggan" class="col-sm-1e col-form-label">IDPEL</label>
                <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="nomorpasang" placeholder="ID"> -->
                    <label class="form-control" id="customer_reg_id_pelanggan" name="id_pelanggan"
                        placeholder="auto"></label>
                </div>
            </div>
            <div class="form-group row">
            <label for="customer_reg_area_code_pasang" class="col-sm-1e col-form-label">Code</label>
                <div class="col-sm-2">                   
                        <label class="form-control" id="customer_reg_area_code_pasang" name="area_code"
                        placeholder="auto"></label>
                </div>
                <label for="customer_reg_modem_sn" class="col-sm-1e col-form-label">Modem.SN</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="customer_reg_modem_sn" name="modem_sn"
                        placeholder="modem_sn" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="customer_reg_odp" class="col-sm-1e col-form-label">ODP</label>
                <div class="col-sm-2">
                    <!-- <input type="text" class="form-control" id="customer_reg_kecamatan" name="kecamatan"
                        placeholder="Kecamatan"> -->
                    <select class="form-control" id="customer_reg_odp" name="odp" placeholder="odp" required>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="customer_reg_wifi_id" class="col-sm-1e col-form-label">Wifi.ID</label>
                <div class="col-sm-2">
                    <!-- <input type="text" class="form-control" id="nomorpasang" placeholder="ID"> -->
                    <label class="form-control" id="customer_reg_wifi_id" name="wifi_id" placeholder="auto"></label>
                </div>
            </div>
            <div class="form-group row">
                <label for="customer_reg_wifi_pass" class="col-sm-1e col-form-label">Wifi.Pass</label>
                <div class="col-sm-2">
                    <!-- <input type="text" class="form-control" id="nomorpasang" placeholder="ID"> -->
                    <label class="form-control" id="customer_reg_wifi_pass" name="wifi_pass" placeholder="auto"></label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">

            <button type="button" class="btn btn-danger" onclick="batalAddpasang()">Batal</button>
            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button> -->
            <button id="btnSimpanpasang" class="btn btn-primary" type="button" onclick="simpanPasang()">Simpan</button>
        </div>
    </form>
</div>
<!-- /.card -->