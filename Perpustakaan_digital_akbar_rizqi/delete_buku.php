
<?php
include('koneksi.php');

$BukuID = $_GET['BukuID'];
$delete = "DELETE from buku WHERE BukuID = '$BukuID'";

if($conn->query($delete)) {
header ("location:tampil_buku.php");
} else {
	echo "data gagal dihapus!!!";
}
?>