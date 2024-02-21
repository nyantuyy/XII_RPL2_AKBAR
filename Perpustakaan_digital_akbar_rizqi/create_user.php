<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>petugas</title>
    
    <link 
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
</head>
<body>
<div class="container">
    <?php
    include 'koneksi.php';
    if (isset($_POST["ok"])) {
      $UserID = $_POST["UserID"];
      $Email =$_POST["Email"];
      $NamaLengkap =$_POST["NamaLengkap"];
      $Alamat =$_POST["Alamat"];
      $input = mysqli_query($conn, "insert into user values ('$UserID', '$Email', '$NamaLengkap', '$Alamat')");
      echo "<div class='alert alert-success' >Selamat, anda sukses mendaftar!</div> ";
      }
      ?>
      <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="text-center">
          <h1>Tambah User</h1>
          <form method="post" action="">
            <div class="form-group">
              <label><b> User Id</b></label> 
              <input type="text" class="form-control" placeholder="masukkan id user" name="UserID">
            </div>
            <div class="form-group">
              <label><b>Email</b></label>
              <input type="text" class="form-control" placeholder="masukkan email anda" name="Email">
            </div>
            <div class="form-group">
              <label><b>Nama Lengkap</b></label>
              <input type="text" class="form-control" placeholder="nama lengkap" name="NamaLengkap">
            </div> 
             <div class="form-group">
              <label><b>Alamat</b></label>
              <input type="text" class="form-control" placeholder="isi alamat anda" name="Alamat">
            </div> 
            <button type="submit" name="ok" class="btn btn-success mt-2">OK</button>
            <button type="reset" class="btn btn-danger mt-2 ">CANCEL</button>
          </form>
          <h6> <button type="button" class="btn btn-a btn-outline-info mt-3" ><a href="tampil_user.php">Tampilkan data user</a></button></h6>
        </div>
      </div>
    </div>
    

    <section class="overlay"></section>

    <script>
      const navBar = document.querySelector("nav"),
        menuBtns = document.querySelectorAll(".menu-icon"),
        overlay = document.querySelector(".overlay");

      menuBtns.forEach((menuBtn) => {
        menuBtn.addEventListener("click", () => {
          navBar.classList.toggle("open");
        });
      });

      overlay.addEventListener("click", () => {
        navBar.classList.remove("open");
      });
    </script>

	
</body>
</html>