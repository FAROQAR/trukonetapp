<!-- general form elements -->
<div id="cardeditorderlist" class="card card-primary" style="display:none">
    <div class="card-header">
        <h3 id="formeditorderlisttitle" class="card-title">Order Link</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="formeditorderlist" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="customer_regedit_id" class="col-sm-1e col-form-label">ID</label>
                <div class="col-sm-2">
                    <label class="form-control" id="customer_regedit_id" name="id" placeholder="auto"></label>
                </div>
                <label for="customer_regedit_no_reg" class="col-sm-1 col-form-label">No.Reg</label>
                <div class="col-sm-3">
                    <label class="form-control" id="customer_regedit_no_reg" name="no_reg" placeholder="auto"></label>
                </div>
            </div>

            <div class="form-group row">
                <label for="customer_regedit_nama" class="col-sm-1e col-form-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="customer_regedit_nama" name="nama" placeholder="nama"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label for="customer_regedit_no_ktp" class="col-sm-1e col-form-label">No.KTP</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="customer_regedit_no_ktp" name="no_ktp" placeholder="No.KTP">
                </div>
                <label for="customer_regedit_kontak" class="col-sm-1 col-form-label">Telepon</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="customer_regedit_kontak" name="kontak" placeholder="telepon"
                        required>
                </div>
            </div>

            <div class="form-group row">
                <label for="customer_regedit_kecamatan" class="col-sm-1e col-form-label">Kecamatan</label>
                <div class="col-sm-3">
                    <select class="form-control" id="customer_regedit_kecamatan" name="kecamatan" placeholder="kecamatan"
                        required>
                    </select>
                </div>
                <label for="customer_regedit_desa" class="col-sm-1 col-form-label">Desa</label>
                <div class="col-sm-3">
                    <select class="form-control" id="customer_regedit_desa" name="desa" placeholder="desa" required>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="customer_regedit_dusun" class="col-sm-1e col-form-label">Dusun</label>
                <div class="col-sm-3">
                    <select class="form-control" id="customer_regedit_dusun" name="dusun" placeholder="dusun" required>
                    </select>
                </div>
                <label for="customer_regedit_area_code" class="col-sm-1 col-form-label">Code</label>
                <div class="col-sm-3">
                    <label class="form-control" id="customer_regedit_area_code" name="area_code" placeholder="auto"></label>
                </div>
            </div>

            <div class="form-group row">
                <label for="customer_regedit_rt_rw" class="col-sm-1 col-form-label">RT/RW</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="customer_regedit_rt_rw" name="rt_rw" placeholder="RT/RW"
                        required>
                </div>
                <label for="customer_regedit_paket" class="col-sm-1e col-form-label">Paket</label>
                <div class="col-sm-3">
                    <select class="form-control" id="customer_regedit_paket" name="paket" placeholder="paket" required>
                    </select>
                </div>
            </div>
            <div class="form-group row">                
                <label for="customer_regedit_id_pelanggan" class="col-sm-1e col-form-label">IDPEL</label>
                <div class="col-sm-3">
                    <!-- <input type="text" class="form-control" id="nomorpasang" placeholder="ID"> -->
                    <label class="form-control" id="customer_regedit_id_pelanggan" name="id_pelanggan"
                        placeholder="auto"></label>
                </div>
                <label for="customer_regedit_modem_sn" class="col-sm-1e col-form-label">Modem.SN</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="customer_regedit_modem_sn" name="modem_sn"
                        placeholder="modem_sn" required>
                </div>
            </div>            
            <div class="form-group row">
                <label for="customer_regedit_odp" class="col-sm-1e col-form-label">ODP</label>
                <div class="col-sm-2">
                    <!-- <input type="text" class="form-control" id="customer_regedit_kecamatan" name="kecamatan"
                        placeholder="Kecamatan"> -->
                    <select class="form-control" id="customer_regedit_odp" name="odp" placeholder="odp" required>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="customer_regedit_wifi_id" class="col-sm-1e col-form-label">Wifi.ID</label>
                <div class="col-sm-2">
                    <!-- <input type="text" class="form-control" id="nomorpasang" placeholder="ID"> -->
                    <label class="form-control" id="customer_regedit_wifi_id" name="wifi_id" placeholder="auto"></label>
                </div>
            </div>
            <div class="form-group row">
                <label for="customer_regedit_wifi_pass" class="col-sm-1e col-form-label">Wifi.Pass</label>
                <div class="col-sm-2">
                    <!-- <input type="text" class="form-control" id="nomorpasang" placeholder="ID"> -->
                    <label class="form-control" id="customer_regedit_wifi_pass" name="wifi_pass" placeholder="auto"></label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">

            <button type="button" class="btn btn-danger" onclick="batalAddeditorder()">Batal</button>
            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button> -->
            <button id="btnSimpaneditorder" class="btn btn-primary" type="button"
                onclick="simpanEditOrder()">Simpan</button>
        </div>
    </form>
</div>
<!-- /.card -->