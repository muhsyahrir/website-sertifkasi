<?php
    require "../function.php";
    $query = "SELECT * FROM informasi";
    $result = mysqli_query($conn, $query);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Sistem Informasi Sekolah (Sinsek)</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="images/pnup.png" rel="icon">
     
  </head>
  <body>
  <?php require "navbar.php"; ?> 

    <section class="jumbotron-bg">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Selamat Datang</h1>
            <p class="lead">Sistem Informasi Sekolah adalah sebuah sistem yang dirancang untuk mengelola dan mengatur berbagai informasi dan proses di sebuah sekolah atau lembaga pendidikan.</p>
            <hr class="my-4">
            <p>Informasi yang dituangkan yaitu berupa informasi kegiatan dan waktu pelaksanaan</p>
            <a class="btn btn-dark btn-lg" href="index.php" role="button">Learn more</a>
            <!-- Elemen dengan ID "clock" akan menampilkan waktu yang diupdate secara real-time -->
            <p id="clock" class="mt-3"></p>
        </div>
    </div>
</section>


  <div class="container mt-2">
        <h4>Informasi Kegiatan</h4><br>
        <div class="row">
            <?php
             while ($row = mysqli_fetch_assoc($result)) {
              echo '<div class="col-md-4 mb-3">';
              echo '<div class="card">';
              echo '<a href="#" data-toggle="modal" data-target="#imageModal' . $row['id'] . '">';
              echo '<img src="../admin/data_gambar/' . $row['image_name'] . '" class="card-img-top" alt="Image" style="max-height:200px;">';
              echo '</a>';
              echo '<div class="card-body">';
              echo '<p class="card-text">Informasi Kegiatan: ' . $row['text_data'] . '</p>';
              echo '<p class="card-text">Waktu Pelaksanaan: ' . $row['date_time_data'] . '</p>';
              echo '<a href="#" class="btn btn-dark">Selengkapnya</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';

              // Modal for image zooming
              echo '<div class="modal fade" id="imageModal' . $row['id'] . '" tabindex="-1" role="dialog" aria-hidden="true">';
              echo '<div class="modal-dialog modal-dialog-centered" role="document">';
              echo '<div class="modal-content">';
              echo '<div class="modal-body">';
              echo '<img src="../admin/data_gambar//' . $row['image_name'] . '" class="img-fluid" alt="Image">';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
          }
            ?>
        </div>
    </div>

  <?php require "footer.php"; ?> 

  <script>
    function updateTime() {
        // Mendapatkan waktu saat ini
        var currentTime = new Date();

        // Format waktu menjadi jam:menit:detik
        var hours = currentTime.getHours().toString().padStart(2, '0');
        var minutes = currentTime.getMinutes().toString().padStart(2, '0');
        var seconds = currentTime.getSeconds().toString().padStart(2, '0');

        // Format tanggal menjadi hari, tanggal bulan tahun
        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var day = days[currentTime.getDay()];
        var date = currentTime.getDate().toString().padStart(2, '0');
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var month = months[currentTime.getMonth()];
        var year = currentTime.getFullYear();

        // Menampilkan waktu dan tanggal pada elemen dengan ID "clock"
        document.getElementById('clock').innerHTML = 'Hari ini: ' + day + ', ' + date + ' ' + month + ' ' + year + ' - ' + hours + ':' + minutes + ':' + seconds;

        // Mengatur waktu untuk memperbarui setiap 1 detik (1000 milidetik)
        setTimeout(updateTime, 1000);
    }

    // Memanggil fungsi updateTime untuk pertama kali
    updateTime();
</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
  </body>
</html>