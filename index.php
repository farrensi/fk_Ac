<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Servis AC Kang FJK</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #032b44;
      color: #ffffff;
    }

    .jumbotron-custom {
      background-color: #032b44;
      padding: 2rem 1rem;
    }

    .services,
    .photos {
      margin-top: 2rem;
    }

    .card-body {
      background-color: #333;
      border-radius: 5%;
    }

    .footer {
      background-color: #032b44;
      width: 100%;
      color: #ffffff;
      padding: 10px;
      text-align: center;
    }

    .card-img-top {
      width: 100%; 
      height: 250px;
      object-fit: cover; 
      border-radius: 2%;
    }

    .card {
      border-radius: 5%;
    }

    .whatsapp-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #25D366;
      color: white;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      font-size: 24px;
    }

    .whatsapp-button i {
      margin: 0;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="jumbotron jumbotron-custom text-center">
      <img src="img/logo.png" alt="Logo Kang FJK" class="img-fluid mb-3">
      <h1>Selamat Datang Servis AC Kang FJK</h1>
      <p>Kami sangat senang Anda mengunjungi situs kami. Di sini, kami menawarkan berbagai layanan perbaikan dan perawatan AC terbaik untuk memastikan kenyamanan Anda di rumah atau kantor. Tim profesional kami siap membantu Anda dengan solusi cepat, efektif, dan terjangkau.</p>
    </div>
    <br>

    <div class="services text-center">
      <h2>Jasa Yang Kami Tawarkan</h2>
      <br>
      <div class="row">
        <?php
        require_once 'config.php';
        $sql = "SELECT * FROM jasa";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
        ?>
          <div class="col-md-4">
            <div class="card">
              <img src="img/<?php echo $row['foto']; ?>" class="card-img-top" alt="<?php echo $row['nama_jasa']; ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['nama_jasa']; ?></h5>
                <h5 class="card-title"><?php echo $row['harga']; ?></h5>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <br>
    <br>

    <div class="text-center">
      <h2>Foto Pengerjaan</h2>
      <br>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-indicators">
          <?php
          include 'config.php';
          $sql = "SELECT * FROM carousel";
          $result = $conn->query($sql);
          $active = true;
          $index = 0;
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<button type="button" data-target="#carouselExampleIndicators" data-slide-to="' . $index . '"';
              if ($active) {
                echo ' class="active" aria-current="true"';
                $active = false;
              }
              echo ' aria-label="Slide ' . ($index + 1) . '"></button>';
              $index++;
            }
          }
          ?>
        </div>
        <div class="carousel-inner">
          <?php
          $result->data_seek(0);
          $active = true;
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<div class="carousel-item';
              if ($active) {
                echo ' active';
                $active = false;
              }
              echo '">';
              echo '<img src="img/' . $row["photo"] . '" class="d-block w-100" alt="Carousel Image" style="width: 800px; height: 400px;">';
              echo '</div>';
            }
          }
          $conn->close();
          ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <footer class="footer">
      <p>&copy; 2023 Servis AC Kang FJK. All rights reserved.</p>
    </footer>

    <a href="https://wa.me/6285727654539?text=Halo,%20Saya%20mau%20tanya%20tentang%20layanan%20AC" class="whatsapp-button" target="_blank">
      <i class="fab fa-whatsapp"></i>
    </a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
  </body>
</html>
