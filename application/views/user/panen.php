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

    <link rel="stylesheet" href="<?php echo base_url(); ?>tema/css/panen.css">

    <title>Panen</title>
</head>

<body style="background-color: azure;">
    <nav class="sticky">
        <div class="container">
            <div class="row">
                <div class="col py-2">
                    <div class="nv">
                        <h1><a href="<?php echo base_url(); ?>user">NAMA APLIKASI</a></h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>user">Dashboard</a></li>
                            <li><a href="<?php echo base_url(); ?>biota">Biota</a></li>
                            <li><a href="<?php echo base_url(); ?>pakan">Pakan</a></li>
                            <li><a href="<?php echo base_url(); ?>keramba">Keramba</a></li>
                            <li><a href="<?php echo base_url(); ?>panen">Panen</a></li>
                            <li><a href="<?php echo base_url(); ?>logout">log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header>
        <div class="container">
            <div class="row">
                <div class="col py-5 "></div>
            </div>
            <div class="row">
                <div class="col-md-12 px-5 py-4">
                    <div class="bg-wlc">
                        <div class="wlc-bio">
                            <h1>PANEN</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <br>

    <main class="container"><br>
        <div class="row">
            <div class="col-md-12 py-5">

                <div class="table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>

                                <th>Tanggal Panen</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($panen as $pan) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>

                                    <td><?= $pan->tanggal_panen ?></td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main><br>

    <footer class="container text-white">
        <div class="row">
            <div class="col-12 py-4 " style="background-color: #3C8D9E;">
                <p>Alamat <br>
                    Provisi: Jawa Tengah, Kabupaten: Jepara, Kecamatan: Karimun Jawa, Desa: Karimun Jawa
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5b9f1690ea.js" crossorigin="anonymous"></script>
</body>

</html>