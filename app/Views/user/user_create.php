<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Add New User</h3>
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
            <form method="post" action="<?= base_url('User/saveOnCreate') ?>">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= old('username'); ?>">
                </div>

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= old('name'); ?>">
                </div>

                <div class="form-group">
                    <label for="telp">Telp</label>
                    <input type="text" class="form-control" id="telp" name="telp" value="<?= old('telp') ?>" />
                </div>

                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="text" class="form-control" id="mail" name="mail" value="<?= old('mail') ?>" />
                </div>
                

                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-info" />
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>

