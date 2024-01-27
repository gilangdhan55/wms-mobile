<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
  <div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                Tentang Kami
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                Kontak
                </a>
            </li>
            </ul>
        </div>
        </nav>

        <!-- Konten Utama -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <!-- Konten Anda akan ditempatkan di sini -->
        <h1 class="mt-2">Selamat Datang!</h1>
        </main>
    </div>
    </div>

    <script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
 