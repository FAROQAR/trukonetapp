<!-- general form elements -->
<div id="cardeditcustomerlist" class="card card-primary" style="display:none">
    <div class="card-header">
        <h3 id="formeditcustomerlisttitle" class="card-title">Customer</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="formeditcustomerlist" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="customer_edit_id" class="col-sm-1e col-form-label">ID</label>
                <div class="col-sm-2">
                    <label class="form-control" id="customer_edit_id" name="id" placeholder="auto"></label>
                </div>
                <label for="customer_edit_id_pelanggan" class="col-sm-1e col-form-label">IDPEL</label>
                <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="nomorpasang" placeholder="ID"> -->
                    <label class="form-control" id="customer_edit_id_pelanggan" name="id_pelanggan"
                        placeholder="auto"></label>
                </div>
            </div>

            <div class="form-group row">
                <label for="customer_edit_nama" class="col-sm-1e col-form-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="customer_edit_nama" name="nama" placeholder="nama"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label for="customer_edit_no_ktp" class="col-sm-1e col-form-label">No.KTP</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="customer_edit_no_ktp" name="no_ktp" placeholder="No.KTP">
                </div>
                <label for="customer_edit_kontak" class="col-sm-1 col-form-label">Telepon</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="customer_edit_kontak" name="kontak" placeholder="telepon"
                        required>
                </div>
            </div>

            <div class="form-group row">
                <label for="customer_edit_kecamatan" class="col-sm-1e col-form-label">Kecamatan</label>
                <div class="col-sm-3">
                    <select class="form-control" id="customer_edit_kecamatan" name="kecamatan" placeholder="kecamatan"
                        required>
                    </select>
                </div>
                <label for="customer_edit_desa" class="col-sm-1 col-form-label">Desa</label>
                <div class="col-sm-3">
                    <select class="form-control" id="customer_edit_desa" name="desa" placeholder="desa" required>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="customer_edit_dusun" class="col-sm-1e col-form-label">Dusun</label>
                <div class="col-sm-3">
                    <select class="form-control" id="customer_edit_dusun" name="dusun" placeholder="dusun" required>
                    </select>
                </div>
                <label for="customer_edit_area_code" class="col-sm-1 col-form-label">Code</label>
                <div class="col-sm-3">
                    <label class="form-control" id="customer_edit_area_code" name="area_code" placeholder="auto"></label>
                </div>
            </div>

            <div class="form-group row">
                <label for="customer_edit_rt_rw" class="col-sm-1e col-form-label">RT/RW</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="customer_edit_rt_rw" name="rt_rw" placeholder="RT/RW"
                        required>
                </div>
                <!-- <label for="customer_edit_paket" class="col-sm-1 col-form-label">Paket</label>
                <div class="col-sm-3">
                    <select class="form-control" id="customer_edit_paket" name="paket" placeholder="paket" required>
                    </select>
                </div> -->
            </div>
            <div class="form-group row">                
                
                <label for="customer_edit_modem_sn" class="col-sm-1e col-form-label">Modem.SN</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="customer_edit_modem_sn" name="modem_sn"
                        placeholder="modem_sn" required>
                </div>
                <label for="customer_edit_odp" class="col-sm-1 col-form-label">ODP</label>
                <div class="col-sm-2">
                    <!-- <input type="text" class="form-control" id="customer_edit_kecamatan" name="kecamatan"
                        placeholder="Kecamatan"> -->
                    <select class="form-control" id="customer_edit_odp" name="odp" placeholder="odp" required>
                    </select>
                </div>
            </div>            
           
            <div class="form-group row">
                <label for="customer_edit_wifi_id" class="col-sm-1e col-form-label">Wifi.ID</label>
                <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="nomorpasang" placeholder="ID"> -->
                    <label class="form-control" id="customer_edit_wifi_id" name="wifi_id" placeholder="auto"></label>
                </div>
                <label for="customer_edit_wifi_pass" class="col-sm-1 col-form-label">Wifi.Pass</label>
                <div class="col-sm-2">
                    <!-- <input type="text" class="form-control" id="nomorpasang" placeholder="ID"> -->
                    <label class="form-control" id="customer_edit_wifi_pass" name="wifi_pass" placeholder="auto"></label>
                </div>
            </div>
            
        </div>
        <!-- /.card-body -->

        <div class="card-footer">

            <button type="button" class="btn btn-danger" onclick="batalAddeditcustomer()">Batal</button>
            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button> -->
            <button id="btnSimpaneditcustomer" class="btn btn-primary" type="button"
                onclick="simpaneditcustomer()">Edit</button>
        </div>
    </form>
</div>
<!-- /.card -->