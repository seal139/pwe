<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
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
            <form method="post" action="<?= base_url('Kamar/saveOnCreate') ?>">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="type">Room Type</label>
                    <input type="text" class="form-control" id="type" name="type" value="<?= old('type'); ?>">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?= old('price'); ?>">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="<?= old('description') ?>" />
                </div>

                <div class="form-group">
                    <label for="roomCount">Room Count</label>
                    <input type="text" class="form-control" id="roomCount" name="roomCount" value="<?= old('roomCount') ?>" />
                </div>
                

                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-info" />
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>

