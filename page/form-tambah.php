<div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i> 
          Input data barang
        </h4>
      </div> <!-- /.page-header -->

      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="crud/proses-simpan.php">
          <div class="form-group">
              <label class="col-sm-2 control-label">ID</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="id" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Barang</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="nama_barang" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Asal Barang</label>
              <div class="col-sm-2">
              <select class="form-control" name="asal_barang" placeholder="Asal Barang" required>
                  <option value=""></option>
                  <option value="Malang">Malang</option>
                  <option value="Surabaya">Surabaya</option>
                  <option value="Semarang">Semarang</option>
                  <option value="Jakarta">Jakarta</option>
                </select>              
              </div>
            </div>       

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal</label>
              <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_stamp" autocomplete="off" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="jumlah_barang" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Harga</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="harga_barang" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Kondisi Barang</label>
              <div class="col-sm-2">
              <select class="form-control" name="kondisi_barang" placeholder="Kondisi Barang" required>
                  <option value=""></option>
                  <option value="Jelek">Jelek</option>
                  <option value="Kurang Bagus">Kurang Bagus</option>
                  <option value="Bagus">Bagus</option>
                  <option value="Sangat Bagus">Sangat Bagus</option>
                </select>              
              </div>
            </div>        
            
            <hr/>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                <a href="index.php" class="btn btn-default btn-reset">Batal</a>
              </div>
            </div>
          </form>
        </div> <!-- /.panel-body -->
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->


 