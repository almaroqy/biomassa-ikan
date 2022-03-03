<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <title>Ubah Password</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>tema/css/lupa_password.css">
</head>

<body id="bg-forget">
    <div class="forget">
        <h2>Ubah Password</h2>
        <form action="<?php echo base_url('lupapass/registration'); ?>" autocomplete="off" method="POST">
            <input type="text" name="user" id="user" placeholder="Masukan Username Anda">

            <button type="submit" name="submit" class="">Konfirmasi</button>
            <p><?= $this->session->flashdata('message'); ?></p>

            <input type="password" name="newpass1" id="newpass1" placeholder="Masukan Password Baru">

            <input type="text" name="newpass" id="newpass2" placeholder="Masukan Kembali Password Baru"><br />

            <button type="submit" name="submit" class="">Ubah</button><br>
            <a href="<?php echo base_url(); ?>signup">Sign Up?</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5b9f1690ea.js" crossorigin="anonymous"></script>
</body>

</html>