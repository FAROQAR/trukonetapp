<!-- general form elements -->
<div id="cardpaketlist" class="card card-primary" style="display:none">
    <div class="form-msg"></div>
    <div class="card-header">
        <h3 id="formpaketlisttitle" class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="formpaketlist" class="form-horizontal" method="POST">
        <div class="card-body">
            <div class="form-group row">
                <label for="idpaket_paket" class="col-sm-1 col-form-label">ID ODP</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="idpaket_paket" name="idpaket" placeholder="id paket">
                </div>
            </div>
            <div class="form-group row">
                <label for="slot_paket" class="col-sm-1 col-form-label">Slot</label>
                <div class="col-sm-3">
                    <select class="form-control" id="slot_paket" name="slot" placeholder="slot paket">
                        <option value="">--Pilih Slot--</option>
                        <option value="8">8</option>
                        <option value="16">16</option>
                    </select>

                </div>
                <!-- <div class="col-sm-2">
                    <input type="number" class="form-control" id="slot_paket" name="slot" placeholder="slot paket">
                </div> -->

            </div>
            <div class="form-group row">
                <label for="idcore_paket" class="col-sm-1 col-form-label">ID Core</label>
                <div class="col-sm-3">
                    <select class="form-control" id="idcore_paket" name="idcore" placeholder="idcore">
                    </select>

                </div>
            </div>
            <div class="form-group row">
                <label for="ratio_paket" class="col-sm-1 col-form-label">Ratio</label>
                <div class="col-sm-3">
                    <select class="form-control" id="ratio_paket" name="ratio" placeholder="ratio paket">
                    </select>

                </div>
<!--                 
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="ratio_paket" name="ratio" placeholder="ratio paket">
                </div> -->

            </div>
            <div class="form-group row">
                <label for="slot_use_paket" class="col-sm-1 col-form-label">Slot Use</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="slot_use_paket" name="slot_use" placeholder="slot Use">
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