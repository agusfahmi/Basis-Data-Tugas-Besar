
<?php
// memanggil file barang.php
require_once 'barang.php';

if (isset($_POST['simpan'])) {
    // membuat objek barang
    $barang = new barang();
    
    $id           = trim($_POST['id']);
	$nama_barang  = trim($_POST['nama_barang']);
	$asal_barang  = trim($_POST['asal_barang']);

	$tanggal       = $_POST['tanggal_stamp'];
	$tgl           = explode('-',$tanggal);
	$tanggal_stamp = $tgl[2]."-".$tgl[1]."-".$tgl[0];

	$jumlah_barang = $_POST['jumlah_barang'];
	$harga_barang    = $_POST['harga_barang'];
	$kondisi_barang = $_POST['kondisi_barang'];

    // insert data barang
    $result = $barang->insert($id,$nama_barang,$asal_barang,$tanggal_stamp,$jumlah_barang,$harga_barang);
	$result = $barang ->insert_split($id,$nama_barang,$kondisi_barang);
}			
?>