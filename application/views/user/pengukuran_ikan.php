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

    <link rel="stylesheet" href="<?php echo base_url(); ?>tema/css/pengukuran_ikan.css">

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
                    <h1>Pengukuran Ikan</h1>
                    <div class="tmbh-bio ">
                        <form action="<?= base_url('pengukuranikan/registration') ?>" autocomplete="off" method="POST">
                            <input type="text" name="jenis" id="jenis" class="txt-plchd" placeholder="Jenis Ikan" value="<?= set_value('jenis') ?>">
                            <small>
                                <?= form_error('jenis') ?>
                            </small>

                            <input type="text" name="bobot" id="bobot" class="txt-plchd" placeholder="Bobot Ikan" value="<?= set_value('bobot') ?>">
                            <small>
                                <?= form_error('bobot') ?>
                            </small>

                            <input type="text" name="jumlah" id="jumlah" class="txt-plchd" placeholder="Jumlah Ikan yg ditebar" value="<?= set_value('jumlah') ?>">
                            <small>
                                <?= form_error('jumlah') ?>
                            </small>

                            <input type="text" name="panjang" id="panjang" class="txt-plchd" placeholder="Panjang Ikan" value="<?= set_value('panjang') ?>">
                            <small>
                                <?= form_error('panjang') ?>
                            </small>

                            <div class="col-md-6" style="margin-left: 2%;">
                                <h6>Tanggal Tebar:</h6>
                            </div>
                            <input type="date" name="tggl-tbr" id="tggl-tbr" class="txt-plchd" placeholder="Tanggal Tebar" value="<?= set_value('tggl-tbr') ?>">
                            <small>
                                <?= form_error('tggl-tbr') ?>
                            </small>

                            <div class="col-md-6" style="margin-left: 2%;">
                                <h6>Tanggal Panen:</h6>
                            </div>
                            <input type="date" name="tggl-panen" id="tggl-panen" class="txt-plchd" placeholder="Tanggal Panen" value="<?= set_value('tggl-panen') ?>">
                            <small>
                                <?= form_error('tggl-panen') ?>
                            </small>
                            <input type="text" name="asl-keramba" id="asl-keramba" class="txt-plchd" placeholder="Asala keramba" value="<?= set_value('asl-keramba') ?>">
                            <small>
                                <?= form_error('asl-keramba') ?>
                            </small>

                            <button type="submit" name="tambah">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </main>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/5b9f1690ea.js" crossorigin="anonymous"></script>
</body>

</html>