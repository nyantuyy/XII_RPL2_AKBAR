
<?php
include 'koneksi.php';
if (isset($_POST["ok"])) {
      $BukuID = $_POST["UserId"];
      $Email =$_POST["Email"];
      $NamaLengkap =$_POST["NamaLengkap"];
      $Alamat =$_POST["Alamat"];
  $input = mysqli_query($conn, "UPDATE user SET UserID='$UserID', Email ='$Email ', NamaLengkap='$NamaLengkap', Penerbit='$Penerbit' WHERE UserID='$UserID'");
  header("location:tampil_user.php");
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
         if (isset($_POST["UserID"])) {
             $UserID = $_POST["UserID"];
             $Email = $_POST["Email"];
             $NamaLengkap = $_POST["NamaLengkap"];
             $Alamat = $_POST["Alamat"];
             
             
             $input = mysqli_query($conn, "UPDATE user SET UserID='$UserID', Email='$Email', NamaLengkap='$NamaLengkap' , Alamat='$Alamat' WHERE UserID='$UserID'");
             if ($input) {
                 echo "<div class='alert alert-success' >Data berhasil di edit!</div> ";
             } else {
                 echo "<script>alert('Gagal menyimpan');</script>";
             }
             
         }
         ?>
          
          <?php
             include 'koneksi.php';
             $UserID = $_GET['UserID'];
             $update = mysqli_query($conn, "SELECT * from user WHERE UserID='$UserID'");
             foreach ($update as $row) {

            ?>

         <form method="post" action="" enctype="multipart/form-data">

           <div class="form-group">
           <label><b>ID User</b></label>
           <input type="text" class="form-control" readonly value="<?php echo $row['UserID']; ?>" name="UserID" id="UserID">
           </div>
                                    
           <div class="form-group">
           <label><b>Email</b></label>
           <input type="text" class="form-control" readonly value="<?php echo $row['Email']; ?>" name="Email" id="Email">
           </div>

           <div class="form-group">
           <label><b>Nama Lengkap</b></label>
           <input type="text" class="form-control" value="<?php echo $row['NamaLengkap']; ?>" name="NamaLengkap" id="NamaLengkap">
           </div>

           <div class="form-group">
           <label><b>Alamat</b></label>
           <input type="text" class="form-control" value="<?php echo $row['Alamat']; ?>" name="Alamat" id="Alamat">
           </div>


          <button type="reset" class="btn btn-warning"><a href="tampil_user.php">KEMBALI</a></button> &emsp; &emsp;
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