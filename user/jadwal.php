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
  <div class="container">
        <div class="table-responsive mt-5">
        <div class="container mt-4">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Informasi Kegiatan</th>
                    <th>Waktu Pelaksanaan</th>
                    <th>Dokumentasi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['text_data'] . '</td>';
                    echo '<td>' . $row['date_time_data'] . '</td>';
                    echo '<td class="text-center align-middle"><img src="../admin/data_gambar/' . $row['image_name'] . '" class="img-fluid" style="max-width:200px; max-height:200px;" alt="Image"></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        </div>
         </div>
    </div>


  <?php require "footer.php"; ?> 
 
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
  </body>
</html>