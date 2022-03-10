<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
        .sticky.is-active {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%
        }
    </style>

    <link rel="stylesheet" href="<?php echo base_url(); ?>tema/css/ubah_pakan.css">

    <title>Panen</title>
</head>

<body style="background-color: azure;">
    <nav class="sticky">
        <div class="container">
            <div class="row">
                <div class="col py-4">
                    <div class="nv">
                        <h1><a href="<?php echo base_url(); ?>user">NAMA APLIKASI</a></h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>user">Dashboard</a></li>
                            <li><a href="<?php echo base_url(); ?>biota">Biota</a></li>
                            <li><a href="<?php echo base_url(); ?>pakan">Pakan</a></li>
                            <li><a href="<?php echo base_url(); ?>keramba">Keramba</a></li>
                            <li><a href="<?php echo base_url(); ?>panen">Panen</a></li>
                            <li><a href="<?php echo base_url(); ?>riwayat">Riwayat</a></li>
                            <li><a href="<?php echo base_url(); ?>logout">log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header>

    </header>
    <br>

    <main">
        <div class="container text-center">
            <div class="row">
                <div class="col py-5"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <h1>Ubah Data Pakan</h1>
                    <div class="ubh-pakan ">
                        <?php
                        foreach ($pakan as $pak) {
                        ?>
                            <form form action="<?= base_url('pakan/update') ?>" autocomplete="off" method="POST">
                                <input type="hidden" name="pak-id" id="pak-id" value="<?= $pak->pakan_id ?> ">
                                <div class="col-md-6" style="margin-left: 2%;">
                                    <h6>Nama Pakan:</h6>
                                </div>
                                <input type="text" name="nama-pak" id="nama-pak" class="txt-plchd" placeholder="Nama Pakan" value="<?= $pak->jenis_pakan ?> ">
                                <small>
                                    <?= form_error('nama-ker') ?>
                                </small>

                                <div class="col-md-6" style="margin-left: 3%;">
                                    <h6>Deskripsi Pakan:</h6>
                                </div>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="txt-plchd" placeholder="Deskripsi Pakan"><?= $pak->deskripsi ?> </textarea>
                                <small>
                                    <?= form_error('nama-ker') ?>
                                </small><br>
                                
                                <input type="hidden" name="id-user-pakan" id="id-user-pakan" class="txt-plchd" placeholder="ID yang menambahkan pakan" value="<?= $pak->user_id ?> ">
                                <small>
                                    <?= form_error('id-user-pakan') ?>
                                </small>

                                <button type="submit" name="tambah">Update</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        </main>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/5b9f1690ea.js" crossorigin="anonymous"></script>
</body>

</html>