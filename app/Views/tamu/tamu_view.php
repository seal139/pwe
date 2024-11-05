<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Lihat Tamu</h3>
        </div>
        <div class="card-body">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label for="nama">Nama</label>
                <label class="form-control"><?= $entity->nama; ?></label>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <label class="form-control"><?= $entity->email; ?></label>
            </div>

            <div class="form-group">
                <label for="notelepon">No Telepon</label>
                <label class="form-control"><?= $entity->no_telpon; ?></label>
            </div>                  
        </div>
    </div>
</div>