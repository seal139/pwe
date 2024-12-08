<!DOCTYPE html>
<html>
<head>
    <title>Form Pemesanan Kamar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
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
    <div class="container">
        <h1 class="mt-5 pt-4 mb-4 text-center fw-bold">Form Pemesanan Kamar</h1>
        <form action="<?= base_url('/storeBooking') ?>" method="POST" id="bookingForm">
        <input type="hidden" name="id_kamar" value="<?= esc($kamar['id']) ?>">
            <div class="mb-3">
                <label for="tanggal_checkin" class="form-label">Tanggal Check-in</label>
                <input type="date" class="form-control" id="tanggal_checkin" name="tanggal_checkin" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_checkout" class="form-label">Tanggal Check-out</label>
                <input type="date" class="form-control" id="tanggal_checkout" name="tanggal_checkout" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_kamar" class="form-label">Jumlah Kamar</label>
                <input type="number" class="form-control" id="jumlah_kamar" name="jumlah_kamar" required>
            </div>
            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>