<!-- general form elements -->
<div id="cardpaketlist" class="card card-primary" style="display:none">
    <div class="form-msg"></div>
    <div class="card-header">
        <h3 id="formpaketlisttitle" class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="formpaketlist" class="form-horizontal" >
        <div class="card-body">
            <div class="form-group row">
                <label for="idpaket_paket" class="col-sm-1 col-form-label">ID PAKET</label>
                <div class="col-sm-3">
                    <label class="form-control" id="idpaket_paket" name="nama"></label>
                    <!-- <input type="text" class="form-control" id="nama_payment" name="nama" placeholder="nama" readonly> -->
                </div>
  
            </div>
            <div class="form-group row">
                <label for="nama_paket_paket" class="col-sm-1 col-form-label">NAMA</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="nama_paket_paket" name="nama_paket" placeholder="desc paket">
                </div>

            </div>
            <div class="form-group row">
                <label for="tarif_paket" class="col-sm-1 col-form-label">TARIF</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="tarif_paket" name="tarif" placeholder="tarif paket">
                </div>

            </div>

            
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="button" class="btn btn-danger" onclick="batalAddPaket()">Batal</button>
            <!-- <button id="btnSimpanServer" type="submit" class="btn btn-primary" onclick="simpanAddPaket(this.id, this.textContent)">Simpan</button> -->
            <button id="btnSimpanPaket" type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<!-- /.card -->