
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Berhasil Login</title>
</head>
<body>


<div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">ADMIN</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Buku</span>
        </a>
         <span class="tooltip">Buku</span>
      </li>
      <li>
       <a href="#">
         <i class='bx bx-user' ></i>
         <span class="links_name">Peminjaman</span>
       </a>
       <span class="tooltip">Peminjaman</span>
     </li>
     <li>
       <a href="logout.php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Logout</span>
       </a>
       <span class="tooltip">Logout</span>
     </li>
    </ul>
  </div>


  <form action="" allign="center" method="post">
        Cari berdasarkan <select name ="pilih">
            <option value= "id_pengaduan">id pengaduan</option>
            <option value= "NIK">NIK</option>
            <option value= "isi_laporan">isi laporan</option>
          </select>
          <input type ="text" name="tekscari"size="24"/>
          <input type ="submit" name="cari"value="cari"/>
          <input type ="submit" name="semua"value="Tampilkan Semua"/>
        </form>
      <table class="table table-a table-bordered table-striped">
        <tr>
          <th> user id  </th>
          <th> email </th>
          <th> nama lengkap</th>
          <th> alamat </th>
          <th> OPSI </th>
        </tr>
        
        <?php
        include 'koneksi.php';
        $input_pengaduan = mysqli_query($conn, "SELECT * from user");
        $input_pengaduan = "";
        if(isset($_POST["cari"])){
          $opsi=$_POST["pilih"];
          $teks=$_POST["tekscari"];
          $input_pengaduan=mysqli_query($conn,"SELECT * from user where $opsi like'%$teks%'");
        }
        else{
          $input_pengaduan=mysqli_query($conn,"SELECT * FROM user");
        }

        

        $no = 1;
        foreach ($input_pengaduan as $row) {
          echo "<tr>
            <td>$no</td>
            <td>" . $row['UserID'] . "</td>
            <td>" . $row['Email'] . "</td>
            <td>" . $row['NamaLengkap'] . "</td>
            <td>" . $row['Alamat'] . "</td>
            
            <td><a href='create_user.php?id_pengaduan=$row[UserID]'><button> tanggapi </button></a> 
            </td></tr>";
          $no++;
        }
        ?>
      </div>
    </div>

 
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");
  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });
  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });
  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>

</body>
</html>