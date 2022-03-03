<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>tema/css/signin.css">
    <title>LOG-IN</title>
</head>

<body id="bg-login">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="login">
                    <h2><a href="<?= base_url('homepage') ?>">LOG - IN</a></h2>
                    <p><?= $this->session->flashdata('message'); ?></p>

                    <form action="<?= base_url('login/registration') ?>" method="POST" autocomplete="off" method="POST">
                        <input type="text" name="user" id="user" placeholder="Username" value="<?= set_value('user') ?>">
                        <small><?= form_error('user') ?></small>

                        <input type="password" name="pass" id="pass" placeholder="Password">
                        <small><?= form_error('pass') ?></small><br />

                        <button type="submit" name="submit" class="">Login</button>
                    </form>
                    <a href="<?php echo base_url(); ?>signup">Belum memiliki akun? Sign Up</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5b9f1690ea.js" crossorigin="anonymous"></script>
</body>



</html>