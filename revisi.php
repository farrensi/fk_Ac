<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .brand-link {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .brand-link img {
            height: 40px;
            margin-right: 10px;
        }

        .content-wrapper {
            padding: 20px;
        }

        .nav-link {
            color: #c2c7d0;
        }

        .nav-link.active {
            background-color: #1e282c;
            color: #fff;
        }

        .main-footer {
            background-color: #343a40;
            color: #adb5bd;
            text-align: center;
            padding: 10px;
        }

        .main-footer a {
            color: #adb5bd;
            text-decoration: none;
        }

        .main-footer a:hover {
            color: #fff;
        }

        .card-custom {
            transition: all 0.3s ease-in-out;
        }

        .card-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <img src="img/logo.png" alt="Logo">
                <span class="brand-text font-weight-light"></span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link load-content active" data-page="dashboard.php">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link load-content" data-page="admin.php">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Jasa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link load-content" data-page="add_photo.php">
                                <i class="nav-icon fas fa-images"></i>
                                <p>Carousel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link load-content" data-page="tentang_kami.php">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p>Tentang Kami</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Area -->
        <div class="content-wrapper" id="content-area">
            <div class="content-header">
                <div class="container-fluid">
                    <h2 class="text-center text-black display-4 mb-4">JASA SERVIS AC KANG FJK</h2>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="text-center mt-5">
                        <div class="row">
                            <!-- Konten akan dimuat di sini -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <strong>&copy; 2023 <a href="#">Your Company</a>.</strong> All rights reserved.
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function() {
        // Muat konten dashboard saat halaman pertama kali dimuat
        $('#content-area .row').load('dashboard.php');

        $('.load-content').on('click', function(e) {
            e.preventDefault(); // Mencegah perilaku default
            var page = $(this).data('page'); // Ambil nama file dari data-page
            $('#content-area .row').fadeOut(300, function() { // Berikan efek transisi
                $(this).load(page, function() {
                    $(this).fadeIn(300);
                });
            });
        });
    });
    </script>
</body>
</html>
