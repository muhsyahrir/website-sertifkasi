<?php
    require "../function.php";

    $queryinformasi = mysqli_query($conn, "SELECT * FROM informasi");
    $jumlahInformasi = mysqli_num_rows($queryinformasi);
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
<br>
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Informasi Kegiatan</h3>
              </div>
              <form id="quickForm" method="post" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="text_data">Kategori Informasi</label>
                    <input type="text" class="form-control" id="kategori" name="text_data" placeholder="Input Informasi" required >
                </div>
                <div class="form-group">
                    <label for="date_time_data">Jadwal Kegiatan</label><br>
                    <input type="datetime-local" name="date_time_data" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="kategori">Upload Gambar</label>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="image">Upload</label>
                     <input type="file" class="form-control" name="image" accept="image/*" required >
                    </div>   
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="simpan_informasi">Submit</button>
                </div>
              </form>

           <?php

          // Check if the form is submitted
          if (isset($_POST['simpan_informasi'])) {
              // Get the text data from the form
              $textData = $_POST['text_data'];

              $dateTimeData = $_POST['date_time_data'];

              // File upload handling
              if ($_FILES['image']['error'] == 0) {
                  $targetDir = 'data_gambar/';
                  $imageName = time() . '_' . $_FILES['image']['name'];
                  $targetPath = $targetDir . $imageName;
                  
                  if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                      // Insert data into the database
                      $query = "INSERT INTO informasi (text_data, date_time_data, image_name) VALUES ('$textData', '$dateTimeData', '$imageName')";
                      if (mysqli_query($conn, $query)) {
                          ?>
                          <br>
              <div class="alert alert-success text-center" role="alert">
              Data upload success
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>            
            <?php
                      } else {
                          echo "Error: " . mysqli_error($conn);
                      }
                  } else {
                      ?>
                          <br>
              <div class="alert alert-warning text-center" role="alert">
              Failed to upload
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>            
            <?php
                  }
              } else {
                  echo "Error uploading image: " . $_FILES['image']['error'];
              }
          }
          ?>

            </div>
            </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>

  <?php require "footer.php"; ?> 
 
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
  </body>
</html>