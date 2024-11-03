<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>View Room</h3>
        </div>
        <div class="card-body">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label for="type">Room Type</label>
                <label class="form-control"><?= $entity->tipe_kamar; ?></label>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <label class="form-control"><?= $entity->harga; ?></label>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <label class="form-control"><?= $entity->deskripsi; ?></label>
            </div>

            <div class="form-group">
                <label for="roomCount">Room Count</label>
                <label class="form-control"><?= $entity->jumlah_kamar; ?></label>
            </div>
            
            <a href="<?= base_url('KamarFasilitasController/detail/' . $entity->id); ?>">
                Edit Facility
            </a>
        </div>
    </div>
</div>