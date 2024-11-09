<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>View Room</h3>
        </div>
        <div class="card-body">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label for="type">Facility Name</label>
                <label class="form-control"><?= $name; ?></label>
            </div>

            <div class="form-group">
                <label for="price">Description</label>
                <label class="form-control"><?= $description; ?></label>
            </div>
        </div>
    </div>
</div>