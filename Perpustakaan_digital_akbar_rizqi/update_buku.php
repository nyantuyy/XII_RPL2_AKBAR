
<?php
include 'koneksi.php';
if (isset($_POST["ok"])) {
      $BukuID = $_POST["BukuID"];
      $Judul =$_POST["Judul"];
      $Penulis =$_POST["Penulis"];
      $Penerbit =$_POST["Penerbit"];
      $TahunTerbit =$_POST["TahunTerbit"];
  $input = mysqli_query($conn, "UPDATE buku SET BukuID='$BukuID', Judul ='$Judul ', Penulis='$Penulis', Penerbit='$Penerbit', TahunTerbit ='$TahunTebit' WHERE BukuID='$BukuID'");
  header("location:tampil_buku.php");
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
    <title>Berhasil Login</title>
    
    <link 
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
</head>
<body>
  


<div class="container">
    
<?php
         include 'koneksi.php';
         if (isset($_POST["BukuID"])) {
             $BukuID = $_POST["BukuID"];
             $Judul = $_POST["Judul"];
             $Penulis = $_POST["Penulis"];
             $Penerbit = $_POST["Penerbit"];
             $TahunTerbit = $_POST["TahunTerbit"];
             
             
             $input = mysqli_query($conn, "UPDATE buku SET BukuID='$BukuID', Judul='$Judul', Penulis='$Penulis' , Penerbit='$Penerbit' WHERE BukuID='$BukuID'");
             if ($input) {
                 echo "<div class='alert alert-success' >Data berhasil di edit!</div> ";
             } else {
                 echo "<script>alert('Gagal menyimpan');</script>";
             }
             
         }
         ?>
          
          <?php
             include 'koneksi.php';
             $BukuID = $_GET['BukuID'];
             $update = mysqli_query($conn, "SELECT * from buku WHERE BukuID='$BukuID'");
             foreach ($update as $row) {

            ?>

         <form method="post" action="" enctype="multipart/form-data">

           <div class="form-group">
           <label><b>ID Buku</b></label>
           <input type="text" class="form-control" readonly value="<?php echo $row['BukuID']; ?>" name="BukuID" id="id_tanggapan">
           </div>
                                    
           <div class="form-group">
           <label><b>Judul</b></label>
           <input type="text" class="form-control" value="<?php echo $row['Judul']; ?>" name="Judul" id="Judul">
           </div>

           <div class="form-group">
           <label><b>Penulis</b></label>
           <input type="text" class="form-control" value="<?php echo $row['Penulis']; ?>" name="Penulis" id="Penulis">
           </div>

           <div class="form-group">
           <label><b>Penerbit</b></label>
           <input type="text" class="form-control" value="<?php echo $row['Penerbit']; ?>" name="Penerbit" id="Penerbit">
           </div>

           <div class="form-group">
           <label><b>Tahun Terbit</b></label>
           <input type="text" class="form-control" value="<?php echo $row['TahunTerbit']; ?>" name="TahunTerbit" id="TahunTerbit">
           </div>


          <button type="reset" class="btn btn-warning"><a href="tampil_buku.php">KEMBALI</a></button> &emsp; &emsp;
          <button type="submit" name="edit" class="btn btn-primary"> &nbsp; EDIT &nbsp; </button>
          </form>

          <?php } ?>
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