<?php
include 'db.php';

// Memastikan koneksi berhasil
if (!$conn) {
  die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mengambil data harga dari database
$select = mysqli_query($conn, "SELECT * FROM harga");
if (!$select) {
  die("Query error: " . mysqli_error($conn));
}

// Memeriksa apakah ada baris data yang ditemukan
$row = mysqli_fetch_array($select);
if (!$row) {
  // Jika tidak ada baris data, tampilkan pesan
  $row = array('harga' => ''); // Inisialisasi $row dengan nilai default jika tidak ada data
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="shortcut icon" href="img/laundry.png" sizes="16x16 32x32" type="image/png">
  <title>Edit Harga Laundry</title>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="index.php">Laundry Native</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="harga.php">Harga</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
              Data Customer
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="minggu.php">Data Minggu Ini</a></li>
              <li><a class="dropdown-item" href="bulan.php">Data Bulan Ini</a></li>
              <li><a class="dropdown-item" href="tahun.php">Data Tahun Ini</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Content -->
  <div class="container mt-4">
    <h3 class="text-center">Edit Harga Laundry</h3>
    <div class="row justify-content-center">
      <div class="col-sm-4">
        <form action="" method="post">
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo htmlspecialchars($row['harga']); ?>">
          </div>
          <button type="submit" class="btn btn-primary" name="edit">Update</button>
        </form>
      </div>
    </div>

    <!-- Menampilkan pesan hasil update -->
    <?php
    if (isset($_POST['edit'])) {
      $harga = $_POST['harga'];
      $edit = mysqli_query($conn, "UPDATE harga SET harga='$harga'");

      if ($edit) {
        echo '<div class="alert alert-success mt-3" role="alert">Data berhasil diupdate!</div>';
      } else {
        echo '<div class="alert alert-danger mt-3" role="alert">Data gagal diupdate!</div>';
      }
    }
    ?>
  </div>
  <!-- End Content -->

  <!-- Optional JavaScript -->
  <!-- Popper.js first, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-uF7sYCY5DMsVmyitZbiUZJw7+Xw4k3fcFN9RGoC5KhRd0pQ0+P/x+ZmMD0oi4JPP" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>