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
    }

    .footer {
      background-color: #032b44;
      width: 100%;
      color: #ffffff;
      padding: 10px;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="jumbotron jumbotron-custom text-center">
      <img src="img/logo.png" alt="Logo Kang FJK" class="img-fluid mb-3">
      <h1>Selamat Datang Servis AC Kang FJK</h1>
      <p>Kami sangat senang bisa mengunjungi situs kamu. Di sini, kami menawarkan berbagai layanan berkualitas dalam perawatan AC. Profesional kami siap membantu Anda dengan solusi cepat, efektif, dan terjangkau.</p>
    </div>

    <div class="services text-center">
      <h2>Jasa Yang Kami Tawarkan</h2>
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

    <div id="carouselExample" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php for ($i = 0; $i < 10; $i++) { ?>
          <li data-target="#carouselExample" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) echo 'class="active"'; ?>></li>
        <?php } ?>
      </ol>
      <div class="carousel-inner">
        <?php for ($i = 0; $i < 10; $i++) { ?>
          <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
            <img src="img/cl<?php echo $i + 1; ?>.jpg" class="img-fluid mb-3" alt="Photo <?php echo $i + 1; ?>">
          </div>
        <?php } ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <footer class="footer">
      <p>&copy; 2023 Servis AC Kang FJK. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>