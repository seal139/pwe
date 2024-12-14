<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembayaran</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Detail Pembayaran</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Booking</th>
                    <th>ID Kamar</th>
                    <th>Jumlah Kamar</th>
                    <th>Harga Per Malam</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($pesan) && count($pesan) > 0): ?>
                    <?php foreach ($pesan as $row): ?>
                        <?php 
                            $kamar = (new \App\Models\KamarModel())->find($row['id_kamar']);
                            $subtotal = $row['jumlah_kamar'] * $kamar->harga;
                        ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['id_kamar'] ?></td>
                            <td><?= $row['jumlah_kamar'] ?></td>
                            <td>Rp <?= number_format($kamar->harga, 2, ',', '.') ?></td>
                            <td>Rp <?= number_format($subtotal, 2, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data pembayaran</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-end">Total Pembayaran</th>
                    <th>Rp <?= number_format($totalBayar, 2, ',', '.') ?></th>
                </tr>
            </tfoot>
        </table>

        <a href="/" class="btn btn-primary">Kembali</a>
    </div>
</body>
</html>