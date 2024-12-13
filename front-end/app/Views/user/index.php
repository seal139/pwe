<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mercubuana Dua</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Filter</title>
    <!-- Tambahkan link Bootstrap untuk styling -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-btn {
            border-radius: 5px;
            padding: 10px;
            background-color: #FFFFFF;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .filter-button {
            width: 100%;
        }
        body {
            background-image: linear-gradient(#f7f9fa);
            justify-content: center;
            align-items: center;
            min-height: 90vh;
            background-position: center;
            background-size: cover;
        }
        .custom-bg{
            background-color: #007BFF;
            border: 1px solid #007BFF;
        }
        .custom-bg:hover{
            background-color: blue;
            border-color: blue;
        }        
        .card-img-container {
            flex: 0 0 100px; /* Set a fixed width for the image container */
            margin-right: 20px;
        }        
        .card-img-top {
            width: 100%; /* Make the image fit the container */
        }
        .card-img {
            width: 100vh;
        }

    </style>
</head>

<header>
        <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2 col-md-5">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/Home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/BookingController">Booking List</a>
            </li>         
        </ul>
    </div>
    
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">            
            <li class="nav-item">
            <?php
                if (is_null(session()->get('isLoggedIn'))) { ?>
                    <a class="nav-link" href="/user/login">Login</a>
                <?php } else { ?>
                    <a class="nav-link" href="/user/logout"><?= session()->get('user_name') ?> - Logout</a>
                <?php } 
            ?>
                
            </li>
        </ul>
    </div>
    </nav>
    
</header>

<section id="header">
    <div class="card bg-dark text-white">
        <img src="upload/background.jpg" class="card-img mx-auto">
        <div class="card-img-overlay row align-items-end d-flex justify-content-center">
            <p class="text-center mx-auto">Akhiri pekan terbaikmu,<br class="d-md-block d-none"> dengan berlibur bersama orang tersayang</p>
        <div class="mx-auto d-flex justify-content-center">
            <button class="btn btn-primary">Pesan sekarang</button>
        </div>
    </div>
</section>

<body>
    
<form action="/search" method="get">
    <div class="container mt-5">
        <div class="form-row form-btn row align-items-end d-flex justify-content-center">
            <div class="col-md-11 ">
                <input type="text" id="searchInput" name="keyword" class="form-control" placeholder="Cari kamar sekarang juga ...">
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary">Search</button>
            </div>
        </div>
    </div>
</form>
     <!-- Our Rooms -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Kamar Terbaik Untuk Anda</h2>
    <div class="container">
    <div class="row">
        <?php foreach ($kamar as $k): ?>
            <div class="col-lg-4 col-md-6 my-3" data-id="<?= $k['id']; ?>">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="<?= base_url($k['gambar']); ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $k['tipe_kamar']; ?></h5>
                        <p class="card-text text-success">Harga: Rp <?= number_format($k['harga'], 0, ',', '.'); ?>/malam</p>
                        <h6 class="mb-4"></h6>
                        <div class="deskripsi mb-4">
                            <h6 class="mb-1">Deskripsi</h6>
                            <span class="badge bg-light text-dark text-wrap lh-base">
                                <p class="card-text"><?= $k['deskripsi']; ?></p>
                            </span>
                        </div>
                        <div class="jumlah-kamar mb-4">
                            <h6 class="mb-1">Jumlah Kamar</h6>
                            <span class="badge bg-light text-dark text-wrap lh-base">
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="<?=base_url('kamardetail/'. $k['id'] );?>" class="btn btn-sm text-white custom-bg shadow-none">Detail Kamar</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>  

    <!-- Tambahkan link Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>