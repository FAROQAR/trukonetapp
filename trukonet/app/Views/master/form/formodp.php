<!-- general form elements -->
<div id="cardodplist" class="card card-primary" style="display:none">
    <div class="form-msg"></div>
    <div class="card-header">
        <h3 id="formodplisttitle" class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="formodplist" class="form-horizontal" method="POST">
        <div class="card-body">
            <div class="form-group row">
                <label for="idodp_odp" class="col-sm-1 col-form-label">ID ODP</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="idodp_odp" name="idodp" placeholder="id odp">
                </div>
            </div>
            <div class="form-group row">
                <label for="slot_odp" class="col-sm-1 col-form-label">Slot</label>
                <div class="col-sm-3">
                    <select class="form-control" id="slot_odp" name="slot" placeholder="slot odp">
                        <option value="">--Pilih Slot--</option>
                        <option value="8">8</option>
                        <option value="16">16</option>
                    </select>

                </div>
                <!-- <div class="col-sm-2">
                    <input type="number" class="form-control" id="slot_odp" name="slot" placeholder="slot odp">
                </div> -->

            </div>
            <div class="form-group row">
                <label for="idcore_odp" class="col-sm-1 col-form-label">ID Core</label>
                <div class="col-sm-3">
                    <select class="form-control" id="idcore_odp" name="idcore" placeholder="idcore">
                    </select>

                </div>
            </div>
            <div class="form-group row">
                <label for="ratio_odp" class="col-sm-1 col-form-label">Ratio</label>
                <div class="col-sm-3">
                    <select class="form-control" id="ratio_odp" name="ratio" placeholder="ratio odp">
                    </select>

                </div>
<!--                 
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="ratio_odp" name="ratio" placeholder="ratio odp">
                </div> -->

            </div>
            <div class="form-group row">
                <label for="slot_use_odp" class="col-sm-1 col-form-label">Slot Use</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="slot_use_odp" name="slot_use" placeholder="slot Use">
                </div>

            </div>

            
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="button" class="btn btn-danger" onclick="batalAddOdp()">Batal</button>
            <!-- <button id="btnSimpanServer" type="submit" class="btn btn-primary" onclick="simpanAddOdp(this.id, this.textContent)">Simpan</button> -->
            <button id="btnSimpanOdp" type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<!-- /.card -->