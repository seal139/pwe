<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Booking Details</h3>
        </div>
        <div class="card-body">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label for="type">Guest</label>
                <label class="form-control"><?= $guest; ?></label>
            </div>

            <div class="form-group">
                <label for="price">Room Type</label>
                <label class="form-control"><?= $room; ?></label>
            </div>

            <div class="form-group">
                <label for="description">Check In</label>
                <label class="form-control"><?= $entity->tanggal_checkin; ?></label>
            </div>

            <div class="form-group">
                <label for="roomCount">Check Out</label>
                <label class="form-control"><?= $entity->tanggal_checkout; ?></label>
            </div>

            <div class="form-group">
                <label for="roomCount">Numbers Of Rooms</label>
                <label class="form-control"><?= $entity->jumlah_kamar; ?></label>
            </div>
        </div>
    </div>
</div>