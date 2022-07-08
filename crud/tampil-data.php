<div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
        <i class="fas fa-box"></i>
        <br>
          <!-- <i class="glyphicon glyphicon-folder-open"  ></i> Data barang -->         
          <a class="btn btn-success pull-right" href="?page=tambah-data-barang">
            <i class="glyphicon glyphicon-plus"></i> Tambah
          </a>
        </h4>
      </div>

  <?php  
  if (empty($_GET['alert'])) {
    echo "";
  } elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
          </div>";
  } elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data barang berhasil disimpan.
          </div>";
  } elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data barang berhasil diubah.
          </div>";
  } elseif ($_GET['alert'] == 4) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data barang berhasil dihapus.
          </div>";
  }
  ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Data barang</h3>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Asal Barang</th>
                <th>Tanggal</th>
                <th>Jumlah Barang</th>
                <th>Harga Barang</th>
                <th>Aksi</th>
              </tr>
            </thead>   

            <tbody>
            <?php
            // memanggil file barang.php
            require_once 'crud/barang.php';
            
            // membuat objek barang
            $barang = new barang();
            
            // mengambil seluruh data barang
            $result = $barang->view();

            $no = 1;

            if (!empty($result)) { 
              foreach($result as $data) {

                $tanggal        = $data['tanggal_stamp'];
                $tgl            = explode('-',$tanggal);
                $tanggal_stamp  = $tgl[2]."-".$tgl[1]."-".$tgl[0];

                echo "  <tr>
                      <td width='50' class='center'>$no</td>
                      <td width='60'>$data[id]</td>
                      <td width='150'>$data[nama_barang]</td>
                      <td width='150'>$data[asal_barang]</td>
                      <td width='180'>$data[tanggal_stamp]</td>
                      <td width='120'>$data[jumlah_barang]</td>
                      <td width='80'>$data[harga_barang]</td>

                      <td width='100'>
                        <div class=''>
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-success btn-sm' href='?page=ubah&id=$data[id]'>
                            <i class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="crud/proses-hapus.php?id=<?php echo $data['id'];?>" onclick="return confirm('Anda yakin ingin menghapus barang <?php echo $data['nama_barang']; ?>?');">
                            <i class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
                echo "
                        </div>
                      </td>
                    </tr>";
                $no++;
              }
            }
            ?>
            </tbody>           
          </table>
        </div>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->