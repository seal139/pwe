<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Manage Room</title>
  </head>
  <body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <?php if(!empty(session()->getFlashdata('type'))) : ?>

                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('type');?>
                </div>
                    
                <?php endif ?>

                <a href="<?php echo base_url('Kamar/create') ?>" class="btn btn-md btn-success mb-3">Add</a>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Room Type</th>
                            <th>Price</th>
                            <th>Room Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1;
                    foreach ($entity as $row) : ?>
                                <td><?php echo $row->type ?></td>
                                <td><?php echo $row->price ?></td>
                                <td><?php echo $row->roomCount ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('Kamar/edit/'.$row->id) ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="<?php echo base_url('Kamar/delete/'.$row->id) ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>

