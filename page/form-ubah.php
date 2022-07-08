<div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <br>
        <h4>
          <i class="glyphicon glyphicon-edit"></i> 
          Ubah data barang
        </h4>
      </div> <!-- /.page-header -->
      <?php
      $id = $_GET['id'];

      if (isset($id)) {
        // memanggil file barang.php
        require_once 'crud/barang.php';
        
        // membuat objek barang
        $barang = new barang();
        
        // mengambil data barang
        $data = $barang->get_barang($id);

        $id           = $data['id'];
        $nama_barang  = $data['nama_barang'];
        $asal_barang  = $data['asal_barang'];
        
        $tanggal       = $data['tanggal_stamp'];
        $tgl           = explode('-',$tanggal);
        $tanggal_stamp = $tgl[2]."-".$tgl[1]."-".$tgl[0];
        
        $jumlah_barang = $data['jumlah_barang'];
        $harga_barang  = $data['harga_barang'];
        $kondisi_barang = $data['kondisi_barang'];
        
      }
      ?>
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="crud/proses-ubah.php">
            <div class="form-group">
              <label class="col-sm-2 control-label">ID</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="id" value="<?php echo $id; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Barang</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="nama_barang" autocomplete="off" value="<?php echo $nama_barang; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Asal Barang</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="asal_barang" autocomplete="off" value="<?php echo $asal_barang; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal</label>
              <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_stamp" autocomplete="off" value="<?php echo $tanggal_stamp; ?>" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Barang</label>
              <div class="col-sm-3">
                <textarea class="form-control" name="jumlah_barang" rows="3" required><?php echo $jumlah_barang; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Harga</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="harga_barang" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $harga_barang; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Kondisi Barang</label>
              <div class="col-sm-2">
              <select class="form-control" name="kondisi_barang" placeholder="Kondisi Barang" required>
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