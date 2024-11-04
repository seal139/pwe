<!DOCTYPE html>
<html>
<head>
    <title>Edit Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>   

</head>
<body>
    <div class="container">   

        <h1>Edit Booking</h1>

        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <?= form_open('bookings/update/' . $booking['id']) ?>
            <div class="mb-3">
                <label for="id_tamu" class="form-label">Guest ID</label>
                <input type="text" class="form-control" id="id_tamu" name="id_tamu" value="<?= set_value('id_tamu', $booking['id_tamu']) ?>">
            </div>

            <div class="mb-3">
                <label for="id_kamar" class="form-label">Room ID</label>
                <input type="text" class="form-control" id="id_kamar" name="id_kamar" value="<?= set_value('id_kamar', $booking['id_kamar']) ?>">
            </div>

            <div class="mb-3">
                <label for="tanggal_checkin" class="form-label">Check-in Date</label>
                <input type="date" class="form-control" id="tanggal_checkin" name="tanggal_checkin" value="<?= set_value('tanggal_checkin', $booking['tanggal_checkin']) ?>">
            </div>

            <div class="mb-3">
                <label for="tanggal_checkout" class="form-label">Check-out Date</label>
                <input type="date" class="form-control" id="tanggal_checkout" name="tanggal_checkout" value="<?= set_value('tanggal_checkout', $booking['tanggal_checkout']) ?>">
            </div>

            <div class="mb-3">
                <label for="jumlah_kamar" class="form-label">Number of Rooms</label>
                <input type="number" class="form-control" id="jumlah_kamar" name="jumlah_kamar" value="<?= set_value('jumlah_kamar', $booking['jumlah_kamar']) ?>">
            </div>

            <button type="submit" class="btn btn-primary">Update Booking</button>
        <?= form_close() ?>
    </div>
</body>
</html>