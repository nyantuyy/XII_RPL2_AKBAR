
<?php
include('koneksi.php');

$USERID = $_GET['UserID'];
$delete = "DELETE from user WHERE UserID = '$USERID'";

if($conn->query($delete)) {
header ("location:tampil_user.php");
} else {
	echo "data gagal dihapus!!!";
}
?>