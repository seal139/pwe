<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Fasilitas View</h3>
        </div>
        <div class="card-body">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label for="type">Nama Fasilitas</label>
                <label class="form-control"><?= $entity->nama_fasilitas; ?></label>
            </div>

            <div class="form-group">
                <label for="price">Deskripsi</label>
                <label class="form-control"><?= $entity->deskripsi; ?></label>
            </div>


        </div>
    </div>
</div>