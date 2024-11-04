<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>View User</h3>
        </div>
        <div class="card-body">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label for="type">Username</label>
                <label class="form-control"><?= $entity->username; ?></label>
            </div>

            <div class="form-group">
                <label for="price">Name</label>
                <label class="form-control"><?= $entity->nama; ?></label>
            </div>
        </div>
    </div>
</div>