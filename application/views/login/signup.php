<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>tema/css/signup.css">
</head>

<body id="bg-signup">
    <div class="signup">
        <h1>SIGN - UP</h1>
        <form action="<?= base_url('signup/registration') ?>" autocomplete="on" method="POST">
            <h4>Masukan Username</h4>
            <input type="text" name="user" id="user" value="<?= set_value('user') ?>">
            <small><?= form_error('user') ?></small>

            <h4>Masukan Password</h4>
            <input type="password" name="pass1" id="pass1">
            <small><?= form_error('pass1') ?></small>

            <h4>Masukan Kembali Password</h4>
            <input type="password" name="pass2" id="pass2">
            <small><?= form_error('pass2') ?></small><br />

            <button type="submit" name="submit" class="">SignUp</button><br>
            <a href="<?php echo base_url(); ?>login">Sudah memiliki akun? Silahkan Log In</a>
        </form>
    </div>
</body>

</html>