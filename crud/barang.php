
<?php
        
/* class barang */
class barang {

    /* method untuk menampilkan data barang */
    function view() {
        // memanggil file database.php
        require_once "config/database.php";

        // membuat objek db dengan nama_$nama_barang $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk mengambil semua data barang
        $query = "SELECT * FROM is_barang ORDER BY id DESC";
        
        // membuat prepared statements
        $stmt = $mysqli->prepare($query);

        //cek query
        if (!$stmt) {
          die('Query Error: '.$mysqli->errno.'-'.$mysqli->error);
        }

        // jalankan query: execute
        $stmt->execute();

        // ambil hasil query
        $result = $stmt->get_result();

        while ($data = $result->fetch_assoc()) {
            $hasil[] = $data;
        }

        /* tutup statement */
        $stmt->close();

        // menutup koneksi database
        $mysqli->close();

        // nilai kembalian dalam bentuk array
        return $hasil;
    }
    function view_rekap() {
        // memanggil file database.php
        require_once "config/database.php";

        // membuat objek db dengan nama_$nama_barang $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk mengambil semua data barang
        $query = "SELECT * FROM validasi_barang ORDER BY id DESC";
        
        // membuat prepared statements
        $stmt = $mysqli->prepare($query);

        //cek query
        if (!$stmt) {
          die('Query Error: '.$mysqli->errno.'-'.$mysqli->error);
        }

        // jalankan query: execute
        $stmt->execute();

        // ambil hasil query
        $result = $stmt->get_result();

        while ($data = $result->fetch_assoc()) {
            $hasil[] = $data;
        }

        /* tutup statement */
        $stmt->close();

        // menutup koneksi database
        $mysqli->close();

        // nilai kembalian dalam bentuk array
        return $hasil;
    }

    /* Method untuk menyimpan data ke tabel barang */
    function insert($id, $nama_barang, $asal_barang, $tanggal_stamp, $jumlah_barang, $harga_barang) {
        // memanggil file database.php
        require_once "../config/database.php";

        // membuat objek db dengan nama_$nama_barang $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk insert data ke tabel is_barang
        $query = "INSERT INTO is_barang(id, nama_barang, asal_barang, tanggal_stamp, jumlah_barang, harga_barang) 
                  VALUES (?,?,?,?,?,?)";

        // membuat prepared statements
        $stmt = $mysqli->prepare($query);

        // hubungkan "data" dengan prepared statements
        $stmt->bind_param("ssssss", $id, $nama_barang, $asal_barang, $tanggal_stamp, $jumlah_barang, $harga_barang);

        // jalankan query: execute
        $stmt->execute();

        // cek hasil query
        if (!$stmt) {
            // jika gagal tampilkan pesan kesalahan
            header('location: ../index.php?alert=1');
        } 
        else {
            // jika berhasil tampilkan pesan berhasil insert data
            header('location: ../index.php?alert=2');
        }

        /* tutup statement */
        $stmt->close();

        // menutup koneksi database
        $mysqli->close();
    }
      /* Method untuk menyimpan data ke tabel barang */
      function insert_split($id, $nama_barang, $kondisi_barang) {
        // memanggil file database.php
        require_once "../config/database.php";

        // membuat objek db dengan nama_$nama_barang $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk insert data ke tabel is_barang
        $query = "INSERT INTO validasi_barang(id, nama_barang, kondisi_barang) 
                  VALUES (?,?,?)";

        // membuat prepared statements
        $stmt = $mysqli->prepare($query);

        // hubungkan "data" dengan prepared statements
        $stmt->bind_param("sss", $id, $nama_barang, $kondisi_barang);

        // jalankan query: execute
        $stmt->execute();

        // cek hasil query
        if (!$stmt) {
            // jika gagal tampilkan pesan kesalahan
            header('location: ../index.php?alert=1');
        } 
        else {
            // jika berhasil tampilkan pesan berhasil insert data
            header('location: ../index.php?alert=2');
        }

        /* tutup statement */
        $stmt->close();

        // menutup koneksi database
        $mysqli->close();
    }

    /* Method untuk menampilkan data barang berdasarkan id */
    function get_barang($id) {
        // memanggil file database.php
        require_once "config/database.php";

        // membuat objek db dengan nama_$nama_barang $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk menampilkan data dari tabel is_barang
        $query = "SELECT * FROM is_barang WHERE id=?";

        // membuat prepared statements
        $stmt = $mysqli->prepare($query);

        //cek query
        if (!$stmt) {
          die('Query Error: '.$mysqli->errno.'-'.$mysqli->error);
        }

        // hubungkan "data" dengan prepared statements
        $stmt->bind_param("s", $id);

        // jalankan query: execute
        $stmt->execute(); 

        // ambil hasil query
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        /* tutup statement */
        $stmt->close();

        // menutup koneksi database
        $mysqli->close();
        
        // nilai kembalian dalam bentuk array
        return $data;
    }
     
    /* Method untuk mengubah data pada tabel barang */
    function  join_table() {
        // memanggil file database.php
        require_once "config/database.php";

        // membuat objek db dengan nama_$nama_barang $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk update data ke tabel is_barang
        $query = "SELECT b.id, b.nama_barang, b.asal_barang, b.tanggal_stamp, b.jumlah_barang, b.harga_barang, v.kondisi_barang
            FROM is_barang b 
            inner JOIN validasi_barang v
            on b.id = v.id;";
        // membuat prepared statements
        $stmt = $mysqli->prepare($query);

        if (!$stmt) {
            die('Query Error: '.$mysqli->errno.'-'.$mysqli->error);
          }

        // jalankan query: execute
        $stmt->execute();
        $result = $stmt->get_result();

        while ($data = $result->fetch_assoc()) {
            $hasil[] = $data;
        }

        /* tutup statement */
        $stmt->close();

        // menutup koneksi database
        $mysqli->close();

        return $hasil;

    }
    
    
    /* Method untuk mengubah data pada tabel barang */
    function update($id, $nama_barang, $asal_barang, $tanggal_stamp, $jumlah_barang, $harga_barang, $kondisi_barang) {
        // memanggil file database.php
        require_once "../config/database.php";

        // membuat objek db dengan nama_$nama_barang $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk update data ke tabel is_barang
        $query = "UPDATE is_barang SET nama_barang   = ?,
                                       asal_barang   = ?,
                                       tanggal_stamp = ?,
                                       jumlah_barang = ?,
                                       harga_barang  = ?,
                                       kondisi_barang = ?
                                WHERE  id            = ?";
        // membuat prepared statements
        $stmt = $mysqli->prepare($query);

        // hubungkan "data" dengan prepared statements
        $stmt->bind_param("sssssss",$id, $nama_barang, $asal_barang, $tanggal_stamp, $jumlah_barang, $harga_barang, $kondisi_barang);

        // jalankan query: execute
        $stmt->execute();

        // cek hasil query
        if (!$stmt) {
            // jika gagal tampilkan pesan kesalahan
            header('location: ../index.php?alert=1');
        } 
        else {
            // jika berhasil tampilkan pesan berhasil update data
            header('location: ../index.php?alert=3');
        }

        /* tutup statement */
        $stmt->close();

        // menutup koneksi database
        $mysqli->close();
    }

    
    /* Method untuk menghapus data pada tabel barang */
    function delete($id) {
        // memanggil file database.php
        require_once "../config/database.php";

        // membuat objek db dengan nama_$nama_barang $db
        $db = new database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk delete data ke tabel is_barang
        $query = "DELETE FROM is_barang WHERE id=?";
        // membuat prepared statements
        $stmt = $mysqli->prepare($query);

        // hubungkan "data" dengan prepared statements
        $stmt->bind_param("s", $id);

        // jalankan query: execute
        $stmt->execute();

        // cek hasil query
        if (!$stmt) {
            // jika gagal tampilkan pesan kesalahan
            header('location: ../index.php?alert=1');
        } 
        else {
            // jika berhasil tampilkan pesan berhasil delete data
            header('location: ../index.php?alert=4');
        }   

        /* tutup statement */
        $stmt->close();
        
        // menutup koneksi database
        $mysqli->close();
    }
    function send_data($id){
         // memanggil file database.php
         require_once "../config/database.php";

         // membuat objek db dengan nama_$nama_barang $db
         $db = new database();
 
         // membuka koneksi ke database
         $mysqli = $db->connect();
        //  $riwayat = mysqli_query($mysqli, "SELECT * FROM riwayat 
        // INNER join eksekusi on(riwayat.id_eksekusi = eksekusi.id_eksekusi)
        // Inner join validasi on( eksekusi.id_validasi = validasi.id_validasi)
        // Inner join laporan on( validasi.id_laporan = laporan.id_laporan)
        // inner join lokasi on(laporan.id_lokasi = lokasi.id_lokasi)
        // ");
         // sql statement untuk delete data ke tabel is_barang
         $query = "DELETE FROM is_barang WHERE id=?";
         // membuat prepared statements
         $stmt = $mysqli->prepare($query);
 
         // hubungkan "data" dengan prepared statements
         $stmt->bind_param("s", $id);
 
         // jalankan query: execute
         $stmt->execute();
 
         // cek hasil query
         if (!$stmt) {
             // jika gagal tampilkan pesan kesalahan
             header('location: index.php?alert=1');
         } 
         else {
             // jika berhasil tampilkan pesan berhasil delete data
             header('location: index.php?alert=4');
         }   
 
         /* tutup statement */
         $stmt->close();
         
         // menutup koneksi database
         $mysqli->close();
       
    }
}
?>
