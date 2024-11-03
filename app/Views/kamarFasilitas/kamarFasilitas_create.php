<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Room Facility</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">                    
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <form id="create">
                <?= csrf_field(); ?>

                <input type="hidden" name="master" value="<?= $master->id ?>">

                <div class="form-group">
                    <label for="price">Room</label>
                    <label class="form-control"><?= $master->tipe_kamar; ?></label>
                </div>

                <div class="form-group">
                <label for="facility">Facility</label>
                    <select name="facility" id="facility" class="form-control">
                        <option value="">Select a Facility</option> <!-- Default option -->
                        <?php foreach ($facilities as $facility): ?>
                            <option value="<?= $facility->id?>">
                                <?= $facility->nama_fasilitas ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
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
                url: '<?= base_url('KamarFasilitasController/saveOnCreate') ?>', // Adjust the URL as necessary
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        // Handle success
                        $('#responseMessage').html('<div class="alert alert-success">' + data.message + '</div>');
                        setTimeout(function() {
                            window.location.href = "<?= base_url('KamarController') ?>";
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


