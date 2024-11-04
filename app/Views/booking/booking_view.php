<!DOCTYPE html>
<html>
<head>
    <title>Booking Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>   

</head>
<body>
    <div class="container">   

        <h1>Booking Details</h1>

        <table class="table">
            <tbody>
                <tr>
                    <th>Guest ID</th>
                    <td><?= $booking['id_tamu'] ?></td>
                </tr>
                <tr>
                    <th>Room ID</th>
                    <td><?= $booking['id_kamar'] ?></td>
                </tr>
                <tr>
                    <th>Check-in Date</th>
                    <td><?= $booking['tanggal_checkin'] ?></td>
                </tr>
                <tr>
                    <th>Check-out Date</th>
                    <td><?= $booking['tanggal_checkout'] ?></td>
                </tr>
                <tr>
                    <th>Number of Rooms</th>
                    <td><?= $booking['jumlah_kamar'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>