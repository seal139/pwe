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

            <form id="create">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"/>
                </div>

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name"/>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"/>
                </div>               

                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-info" />
                </div>

            </form>

            <div id="responseMessage"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#create').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Serialize the form data
            const formData = $(this).serialize();

            $.ajax({
                url: '<?= base_url('UserController/saveOnCreate') ?>', // Adjust the URL as necessary
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        // Handle success
                        $('#responseMessage').html('<div class="alert alert-success">' + data.message + '</div>');
                        setTimeout(function() {
                            window.location.href = "<?= base_url('UserController') ?>";
                        }, 1000)                   
                    } else {
                        // Handle errors returned from the server
                        let errorMessages = '<div class="alert alert-danger"><ul>';
                        $.each(data.errors, function(index, error) {
                            errorMessages += '<li>' + error + '</li>';
                        });
                        errorMessages += '</ul></div>';
                        $('#responseMessage').html(errorMessages);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                    $('#responseMessage').html('<div class="alert alert-danger">An error occurred while saving.</div>');
                }
            });
        });
    });
</script>

