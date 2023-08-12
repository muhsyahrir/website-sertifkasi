
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Sistem Informasi Sekolah (Sinsek)</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="images/pnup.png" rel="icon">
     <style>
      #judul {
  text-align: center;
}

     </style>
  </head>
  <body>
  <?php require "navbar.php"; ?> 
  <br>
  <br>
  <br>
  <div class="container">
    <h3 id="judul">Rincian Biaya</h3>
  <table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Biaya</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Uang Formulir</td>
      <td>Rp. 200.000</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Uang Pembangunan</td>
      <td>Rp.10.000.000</td>
    </tr>
 
  </tbody>
</table>
    </div>


  <?php require "footer.php"; ?> 
 
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
  </body>
</html>