<!-- general form elements -->
<div id="cardpaymentlist" class="card card-success" style="display:none">
    <div class="form-msg"></div>
    <div class="card-header">
        <h3 id="formpaymentlisttitle" class="card-title">Pembayaran</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="formpaymentlist" class="form-horizontal" method="POST">
        <div class="card-body">
            <div class="form-group row">
                <label for="id_pelanggan_payment" class="col-sm-1 col-form-label">ID</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="id_pelanggan_payment" name="id_pelanggan"
                        placeholder="id payment" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama_payment" class="col-sm-1 col-form-label">Nama</label>
                <div class="col-sm-6">
                    <label class="form-control" id="nama_payment" name="nama"></label>
                    <!-- <input type="text" class="form-control" id="nama_payment" name="nama" placeholder="nama" readonly> -->
                </div>
            </div>


            <div class="form-group row">
                <label for="alamat_payment" class="col-sm-1 col-form-label">Alamat</label>
                <div class="col-sm-6">
                    <label class="form-control" id="alamat_payment" name="alamat"></label>
                    <!-- <input type="text" class="form-control" id="alamat_payment" name="alamat" placeholder="alamat" readonly> -->
                </div>
            </div>           
            <div class="form-group row">
                <label for="paket_payment" class="col-sm-1 col-form-label">Paket</label>
                <div class="col-sm-6">
                    <label class="form-control" id="paket_payment" name="paket"></label>
                    <!-- <input type="text" class="form-control" id="paket_payment" name="paket" placeholder="paket" readonly> -->
                </div>
            </div>
            <div class="form-group row">
                <label for="tglon_payment" class="col-sm-1 col-form-label">Aktivasi</label>
                <div class="col-sm-2">
                    <label class="form-control" id="tglon_payment" name="tgl_on"></label>
                    <!-- <input type="text" class="form-control" id="tglon_payment" name="tgl_on" placeholder="tgl_on" readonly> -->
                </div>

                <label for="thbl_payment" class="col-sm-1 col-form-label">ThBl</label>
                <div class="col-sm-2">
                    <label class="form-control" id="thbl_payment" name="thbl"></label>
                    <!-- <input type="text" class="form-control" id="tglon_payment" name="tgl_on" placeholder="tgl_on" readonly> -->
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_awal_payment" class="col-sm-1 col-form-label">Tanggal</label>
                <div class="col-sm-2">
                    <label class="form-control" id="tgl_awal_payment" name="tgl_awal"></label>
                    <!-- <input type="text" class="form-control" id="tglon_payment" name="tgl_on" placeholder="tgl_on" readonly> -->
                </div>

                <label for="tgl_akhir_payment" class="col-sm-1 col-form-label">s/d</label>
                <div class="col-sm-2">
                    <label class="form-control" id="tgl_akhir_payment" name="tgl_akhir"></label>
                    <!-- <input type="text" class="form-control" id="tglon_payment" name="tgl_on" placeholder="tgl_on" readonly> -->
                </div>
            </div>
            <div class="form-group row">
                <label for="tarifbulan_payment" class="col-sm-1 col-form-label">Tarif</label>
                <div class="col-sm-2">
                    <label class="form-control" id="tarifbulan_payment" name="tarif_bln"></label>
                    <!-- <input type="number" class="form-control" id="tarifbulan_payment"  name="tarif_bulan" placeholder="tarif_bulan" readonly> -->
                </div>
                <label for="tagihan_payment" class="col-sm-1 col-form-label">Tagihan</label>
                <div class="col-sm-2">
                    <label class="form-control" id="tagihan_payment" name="tagihan"></label>
                    <!-- <input type="number" class="form-control" id="tagihan_payment" name="tagihan" placeholder="tagihan" readonly> -->
                </div>
            </div>
            <div class="form-group row">
                <label for="bi_admin_payment" class="col-sm-1 col-form-label">Bi.Admin</label>
                <div class="col-sm-2">
                    <label class="form-control" id="bi_admin_payment" name="bi_admin"></label>
                    <!-- <input type="number" class="form-control" id="tarifbulan_payment"  name="tarif_bulan" placeholder="tarif_bulan" readonly> -->
                </div>
                <label for="total_tagihan_payment" class="col-sm-1 col-form-label">Total</label>
                <div class="col-sm-2">
                    <label class="form-control" id="total_tagihan_payment" name="total_tagihan"></label>
                    <!-- <input type="number" class="form-control" id="tagihan_payment" name="tagihan" placeholder="tagihan" readonly> -->
                </div>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="button" class="btn btn-danger" onclick="batalPayment()">Batal</button>
            <!-- <button id="btnSimpanServer" type="submit" class="btn btn-primary" onclick="simpanAddServer(this.id, this.textContent)">Simpan</button> -->
            <button id="btnPayment" type="submit" class="btn btn-success">Bayar</button>
        </div>
    </form>
</div>
<!-- /.card -->