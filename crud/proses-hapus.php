
<?php
// memanggil file barang.php
require_once 'barang.php';

if (isset($_GET['id'])) {
    // membuat objek barang
    $barang = new barang();

	$nis = $_GET['id'];

	// delete data barang
    $result = $barang->delete($nis);
}					
?>