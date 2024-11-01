<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Add New Room</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Periksa Entrian Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= base_url('KamarController/saveOnCreate') ?>">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="type">Room Type</label>
                    <input type="text" class="form-control" id="type" name="type">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" />
                </div>

                <div class="form-group">
                    <label for="roomCount">Room Count</label>
                    <input type="text" class="form-control" id="roomCount" name="roomCount" />
                </div>
                

                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-info" />
                </div>

            </form>
        </div>
    </div>
</div>
<?php if (session()->has('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>


