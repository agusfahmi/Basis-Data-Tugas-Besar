<br><br>
<div class="row">
<div class="col-md-12">
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
";
            ?>
                         
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
      </div> 
      </div>
      </div>
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Validasi Barang</h3>
        </div>
      <div class="panel-body">
          <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kondisi Barang</th>
              </tr>
            </thead>   
            <tbody>
            <?php
            // memanggil file barang.php
            require_once 'crud/barang.php';
            
            // membuat objek barang
            $barang = new barang();
            
            // mengambil seluruh data barang
            $result = $barang->view_rekap();

            $no = 1;

            if (!empty($result)) { 
              foreach($result as $data) {

                echo "  <tr>
                      <td width='10' class='center'>$no</td>
                      <td width='60'>$data[id]</td>
                      <td width='150'>$data[nama_barang]</td>
                      <td width='150'>$data[kondisi_barang]</td>
                      ";
            ?>                    
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
    </div>
  
    <div class="row">
    <div class="col-md-12">

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Data Keseluruhan</h3>
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
                <th>Kondisi Barang</th>
              </tr>
            </thead>   

            <tbody>
            <?php
            // memanggil file barang.php
            require_once 'crud/barang.php';
            
            // membuat objek barang
            $barang = new barang();
            
            // mengambil seluruh data barang
            $result = $barang->join_table();

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
                      <td width='100'>$data[asal_barang]</td>
                      <td width='120'>$data[tanggal_stamp]</td>
                      <td width='100'>$data[jumlah_barang]</td>
                      <td width='80'>$data[harga_barang]</td>
                      <td width='80'>$data[kondisi_barang]</td>
                    ";
            ?>
        
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
