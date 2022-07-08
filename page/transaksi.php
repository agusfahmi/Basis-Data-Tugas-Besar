<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>
                <i class="glyphicon glyphicon-edit"></i>
                Transaksi Barang
            </h4>
        </div> <!-- /.page-header -->

        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" method="POST" >
                    <?php
                    include "config/database.php";
                    $query = mysqli_query($koneksi, 'SELECT * FROM is_barang');

                    $nama_barang    = "";  
                    $nama_company   = "";
                    $jumlah_barang = "";
                    $error          = "";
                    
                    #inputan tabel posko donor
                    if(isset($_POST['simpan'])){
                        $nama_barang    = $_POST['nama_barang'];
                        $nama_company   = $_POST['nama_company'];
                        $jumlah_barang  = $_POST['jumlah_barang'];
                    
                        if($nama_barang && $nama_company && $jumlah_barang ){
                            // $sql1 = "INSERT INTO is_barang(nama_barang, nama_company, jumlah_barang) VALUES ('$nama_barang', '$nama_company', '$jumlah_barang')";
                            // $q1 = mysqli_query($koneksi, $sql1);
                    
                            $sql2 = "INSERT INTO company_data(nama_barang, nama_company, jumlah_barang) VALUES ('$nama_barang', '$nama_company', '$jumlah_barang')";
                            $q2 = mysqli_query($koneksi, $sql2);
                    
                            if($q2){
                                if($nama_barang == 'A') {
                                    $sql3 = "UPDATE company_data SET darah_a = darah_a + '$kantong' WHERE nama = '$company_data'";
                                } else if($nama_barang == 'B') {
                                    $sql3 = "UPDATE company_data SET darah_b = darah_b + '$kantong' WHERE nama = '$company_data'";
                                } else if($nama_barang == 'AB') {
                                    $sql3 = "UPDATE company_data SET darah_ab = darah_ab + '$kantong' WHERE nama = '$company_data'";
                                } else if($nama_barang == 'O') {
                                    $sql3 = "UPDATE company_data SET darah_o = darah_o + '$kantong' WHERE nama = '$company_data'";
                                }
                                $q3 = mysqli_query($koneksi, $sql3);
                    
                                $sukses = "Data berhasil ditambahkan";
                            }else{
                                $error = "Data gagal ditambahkan";
                            }
                        } else {
                            $error = "Data tidak boleh kosong";
                        }
                    }
                    ?>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Barang</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="nama_barang" placeholder="Nama Barang" required>
                                <?php while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <option value="<?= $data['id'] ?>"><?= $data['nama_barang'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Company</label>
                        <div class="col-sm-2">
                             <select class="form-control" name="nama_company" placeholder="Kondisi Barang" required>
                            <option value="Erigo">Erigo</option>
                            <option value="Oyisam">Oyisam</option>
                            <option value="Awesam">Awesam</option>
                            <option value="Inspired">Inspired</option>
                            </select>   
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jumlah</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                            <input type="text" class="form-control" name="harga_barang" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="col-sm-2 control-label">Jumlah</label>
                        <div class="col-sm-2">
                        <input type="text" class="form-control" name="harga_barang" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
                        </div>
                    </div> -->

                    <!-- <div class="form-group">
                        <label class="col-sm-2 control-label">Harga</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="harga_barang" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
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
                    </div> -->

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