
<?php
include('koneksi.php');

$PeminjamanID = $_GET['PeminjamanID'];
$delete = "DELETE from peminjaman WHERE PeminjamanID = '$PeminjamanID'";

if($conn->query($delete)) {
header ("location:tampil_peminjaman.php");
} else {
	echo "data gagal dihapus!!!";
}
?>