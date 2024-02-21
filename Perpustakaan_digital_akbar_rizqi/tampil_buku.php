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
<nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">HI <?php echo $_SESSION['username']; ?>!</span>
      </div>

      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">Peminjaman</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="tampil_user.php" class="nav-link">
                <i class=""></i>
                <span class="link">User</span>
              </a>
            </li>
            <li class="list">
              <a href="tampil_peminjaman.php" class="nav-link">
                <i class=""></i>
                <span class="link">Peminjaman</span>
              </a>
            </li>
            </li>
            <li class="list">
              <a href="tampil_buku.php" class="nav-link">
                <i class=""></i>
                <span class="link">Buku</span>
              </a>
            </li>
            <li class="list">
              <a href="logout.php" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link" >Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>
    <div class="container">
      <h2>PEMINJAMAN</h2>
      <form action="" allign="center" method="post">
        Cari berdasarkan <select name ="pilih">
            <option value= "BukuId">ID BUKU</option>
            <option value= "Judul">JUDUL</option>
            <option value= "Penulis">PENULIS</option>
            <option value= "Penerbit">PENERBIT</option>
            <option value= "TahunTerbit">TAHUN TERBIT</option>


          </select>
          <input type ="text" name="tekscari"size="24"/>
          <input type ="submit" name="cari"value="cari"/>
          <input type ="submit" name="semua"value="Tampilkan Semua"/>
        </form>
      <table class="table table-a table-bordered table-striped">
        <tr>
          <th> id buku </th>
          <th> judul </th>
          <th> penulis </th>
          <th> penerbit </th>
          <th> tahun terbit </th>
          <th> OPSI </th>
        </tr>
        
        <?php
        include 'koneksi.php';
        $input_user = mysqli_query($conn, "SELECT * from buku");
        $input_user = "";
        if(isset($_POST["cari"])){
          $opsi=$_POST["pilih"];
          $teks=$_POST["tekscari"];
          $input_user=mysqli_query($conn,"SELECT * from buku where $opsi like'%$teks%'");
        }
        else{
          $input_user=mysqli_query($conn,"SELECT * FROM buku");
        }

        

        $no = 1;
        foreach ($input_user as $row) {
          echo "<tr>
            <td>" . $row['BukuID'] . "</td>
            <td>" . $row['Judul'] . "</td>
            <td>" . $row['Penulis'] . "</td>
            <td>" . $row['Penerbit'] . "</td>
            <td>" . $row['TahunTerbit'] . "</td>

            <td><a href='delete_buku.php?BukuID=$row[BukuID]'>
                <button class='btn btn-danger'> Delete </button></a> 
                <a href='update_buku.php?BukuID=$row[BukuID]'>
                <button class='btn btn-info'> Update</button> </br></a>
            </td></tr>";
          $no++;
        }
        ?>
        
     <a class="nav-link" href="create_buku.php"><button type="button" class="btn btn-outline-danger">Tambah buku</button></a> 

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