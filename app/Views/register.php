
<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Form Register</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sticky-footer/">


    
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sticky-footer/sticky-footer.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
    <script>
        function myFunction(x) {
            var x = document.getElementById(x);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Register Form</h1>
            Silahkan Daftarkan Identitas Anda
            <hr />
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h4>Periksa Entrian Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url(); ?>RegisterController/process">

                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="username" class="form-label">UserName</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Input  Username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="Password" class="form-control" id="Password" name="Password" placeholder="Input Password Min 8 Karakter">
                    <input type="checkbox" onclick="myFunction('Password')"> Show Password
                </div>
                <div class="mb-3">
                    <label for="password_conf" class="form-label">Confirm Password</label>
                    <input type="Password" class="form-control" id="Password_conf" name="Password_conf" placeholder="Ketik ulang password">
                    <input type="checkbox" onclick="myFunction('Password_conf')"> Show Password
                </div>
                <div class="mb-3">
                    <label for="nmlengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Input  Nama Lengkap">
                </div>
                
                <div class="mb-3">
                    <label for="nmemail" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Input  Email">
                </div>

                <div class="mb-3">
                    <label for="notelp" class="form-label">No. Telp</label>
                    <input type="text" class="form-control" id="telp" name="telp" placeholder="Input  No. Telp">
                </div>
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>                    
                </div>
            </form>
            <hr />

        </div>
    </main>
    <div class="col-auto">

</div>
    <footer class="jumbotron jumbotron-fluid mt-5 mb-0">
        <div class="container text-center">Copyright &copy <?= Date('Y') ?> Hotel Mercubuna</div>
    </footer>


</body>
<script src="<?= base_url('js/jquery.min.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

</html>