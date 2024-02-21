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
      $BukuID = $_POST["BukuID"];
      $Judul =$_POST["Judul"];
      $Penulis =$_POST["Penulis"];
      $Penerbit =$_POST["Penerbit"];
      $TahunTerbit =$_POST["TahunTerbit"];
      $input = mysqli_query($conn, "insert into buku values ('$BukuID', '$Judul', '$Penulis', '$Penerbit', '$TahunTerbit')");
      echo "<div class='alert alert-success' >Selamat, anda sukses mendaftar!</div> ";
      }
      ?>
      <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="text-center">
          <h1>Tambah Buku</h1>
          <form method="post" action="">
            <div class="form-group">
              <label><b> Id Buku</b></label> 
              <input type="text" class="form-control" placeholder="masukkan id buku" name="BukuID">
            </div>
            <div class="form-group">
              <label><b>Judul</b></label>
              <input type="text" class="form-control" placeholder="Judul Buku" name="Judul">
            </div>
            <div class="form-group">
              <label><b>Penulis</b></label>
              <input type="text" class="form-control" placeholder="Penulis Buku" name="Penulis">
            </div> 
             <div class="form-group">
              <label><b>Penerbit</b></label>
              <input type="text" class="form-control" placeholder="Penerbit Buku" name="Penerbit">
            </div> 
            </div> 
             <div class="form-group">
              <label><b>TahunTerbit</b></label>
              <input type="text" class="form-control" placeholder="Tahun" name="TahunTerbit">
            </div> 
            <button type="submit" name="ok" class="btn btn-success mt-2">OK</button>
            <button type="reset" class="btn btn-danger mt-2 ">CANCEL</button>
          </form>
          <h6> <button type="button" class="btn btn-a btn-outline-info mt-3" ><a href="tampil_buku.php">Tampilkan data buku</a></button></h6>
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