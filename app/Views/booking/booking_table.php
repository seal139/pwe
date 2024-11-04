<!DOCTYPE html>
<html>
<head>
    <title>Booking Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>   

</head>
<body>
    <div class="container">   

        <h1>Booking Table</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Guest ID</th>
                    <th>Room ID</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Number of Rooms</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking) : ?>
                    <tr>
                        <td><?= $booking['id'] ?></td>
                        <td><?= $booking['id_tamu'] ?></td>
                        <td><?= $booking['id_kamar'] ?></td>
                        <td><?= $booking['tanggal_checkin'] ?></td>
                        <td><?= $booking['tanggal_checkout'] ?></td>
                        <td><?= $booking['jumlah_kamar'] ?></td>
                        <td>
                            <a href="<?= base_url('bookings/edit/' . $booking['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?= base_url('bookings/delete/' . $booking['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>