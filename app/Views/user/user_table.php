<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Master Produk</title>
  </head>
  <body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <?php if(!empty(session()->getFlashdata('username'))) : ?>

                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('username');?>
                </div>
                    
                <?php endif ?>

                <a href="<?php echo base_url('User/create') ?>" class="btn btn-md btn-success mb-3">Add</a>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Telephone</th>
                            <th>Mail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1;
                    foreach ($entity as $row) : ?>
                                <td><?php echo $row->username ?></td>
                                <td><?php echo $row->name ?></td>
                                <td><?php echo $row->telp ?></td>
                                <td><?php echo $row->mail ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('User/edit/'.$row->id) ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="<?php echo base_url('User/delete/'.$row->id) ?>" class="btn btn-sm btn-danger">Delete</a>
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

