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

    <link rel="stylesheet" href="<?php echo base_url(); ?>tema/css/ubah_biota.css">

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
                    <h1>Ubah Data Biota</h1>
                    <?php
                    foreach ($biota as $bio) {
                    ?>
                        <div class="ubh-bio ">
                            <form action="<?= base_url('biota/update') ?>" autocomplete="off" method="POST">
                                <input type="hidden" name="biota_id" id="biota_id" value="<?= $bio->biota_id ?>">
                                <div class="col-md-6" style="margin-left: 2%;">
                                    <h6>Jenis Ikan:</h6>
                                </div>
                                <input type="text" name="jenis" class="txt-plchd" placeholder="Jenis Ikan" value="<?= $bio->jenis_biota ?>">

                                <div class="col-md-6" style="margin-left: 2%;">
                                    <h6>Bobot Ikan:</h6>
                                </div>
                                <input type="text" name="bobot" class="txt-plchd" placeholder="Bobot Ikan" value="<?= $bio->bobot ?>">

                                <div class="col-md-6" style="margin-left: 7%;">
                                    <h6>Jumlah Ikan yg ditebar:</h6>
                                </div>
                                <input type="text" name="jumlah" class="txt-plchd" placeholder="Jumlah Ikan yg ditebar" value="<?= $bio->jumlah_bibit ?>">

                                <div class="col-md-6" style="margin-left: 2%;">
                                    <h6>Panjang Ikan:</h6>
                                </div>
                                <input type="text" name="panjang" class="txt-plchd" placeholder="Panjang Ikan" value="<?= $bio->panjang ?>">

                                <div class="col-md-6" style="margin-left: 2%;">
                                    <h6>Tanggal Tebar:</h6>
                                </div>
                                <input type="date" name="tggl-tbr" class="txt-plchd" placeholder="Tanggal Tebar" value="<?= $bio->tanggal_tebar ?>">

                                <div class="col-md-6" style="margin-left: 2%;">
                                    <h6>Tanggal Panen:</h6>
                                </div>
                                <input type="date" name="tggl-panen" class="txt-plchd" placeholder="Tanggal Panen" value="<?= $bio->tanggal_panen ?>">
                                
                                <div class="col-md-6" style="margin-left: 7%;">
                                    <h6>ID Asal keramba:</h6>
                                </div>
                                <input type="text" name="asl-keramba" class="txt-plchd" placeholder="ID Asal Keramba" value="<?= $bio->keramba_id ?>">


                                <button type="submit" name="tambah">Ubah</button>
                            </form>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        </main>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/5b9f1690ea.js" crossorigin="anonymous"></script>
</body>

</html>