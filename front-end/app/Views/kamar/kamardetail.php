<!DOCTYPE html>
<html>
<head>
    <title>Detail Kamar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        .card-img-top {
            object-fit: cover;
            height: 300px;
        }
        .overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 24px;
            padding: 10px;
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
    </nav>
</header>

<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= base_url($kamar['gambar']); ?>" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold"><?= $kamar['tipe_kamar']; ?></h2>
            <p class="fs-5">Rp <?= number_format($kamar['harga'], 0, ',', '.'); ?> / malam</p>
            <p><?= $kamar['deskripsi']; ?></p>

 

            <h6>Fasilitas:</h6>
            <ul>
                <?php if (!empty($fasilitas)): ?>
                    <?php foreach ($fasilitas as $f): ?>
                        <li><?= $f['nama_fasilitas']; ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Tidak ada fasilitas yang tersedia.</li>
                <?php endif; ?>
            </ul>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <?php if (session()->get('role') !== 'admin'): ?>
                    <a href="<?= site_url('book/' . $kamar['id']); ?>" class="btn btn-primary">Pesan Sekarang</a>
                <?php endif; ?>
                <a href="<?= base_url('/'); ?>" class="btn btn-outline-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>