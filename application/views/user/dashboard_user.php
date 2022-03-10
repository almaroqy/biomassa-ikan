<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>tema/css/header_user.css">
    <title>Dashboard</title>
</head>

<body class="bg-body">
    <nav class="sticky">
        <div class="container">
            <div class="row">
                <div class="col py-2">
                    <div class="nv">
                        <h1><a href="<?php echo base_url(); ?>user">NAMA APLIKASI</a></h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>homepage_user">Dashboard</a></li>
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
            <div class="row"></div>
            <div class="row">
                <div class="col-md-12 py-5" style="background-image: url(<?php echo base_url(); ?>tema/img/sea.jpg); background-size: cover;">
                    <div class="bg-wlc">
                        <div class="wlc">
                            <h1>SELAMAT DATANG DI WEBSITE MONITORING BIOMASSA IKAN KERAMBA JARING APUNG BERTINGKAT BULAT (KJABB)</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <br>

    <main class="container">
        <div class="row">
            <div class="col-md-4 py-5">
                <img class="w-100" src="<?php echo base_url(); ?>tema/img/panen.jpg" alt="gambar alam">
            </div>
            <div class="col-md-8 py-5">
                <h1 class="crop"><a href="<?php echo base_url(); ?>panen">Hasil Monitoring Biomassa Ikan
                        Pada Bulan September</a></h1>
                <p>Pada bulan september hasil menunjukan bahwa ikan mengalami pertumbuhan yang pesat dibandingkan dengan bulan juni. Faktor pakan memungkinkan ikan untuk tumbuh lebih cepat.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 py-5">
                <img class="w-100" src="<?php echo base_url(); ?>tema/img/jenis_ikan.jpg" alt="gambar alam">
            </div>
            <div class="col-md-8 py-5">
                <h1 class="fish"><a href="<?php echo base_url(); ?>keramba">Jenis ikan yang sedang dibudidayakan
                        pada KJABB</a></h1>
                <p>Pada keramba KJABB Karimunjawa terdapat satu biota yaitu kerapu macan. Yang mana umurnya masih dua bulan.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 py-5">
                <img class="w-100" src="<?php echo base_url(); ?>tema/img/Pakan.jpg" alt="gambar alam">
            </div>
            <div class="col-md-8 py-5">
                <h1 class="feed"><a href="<?php echo base_url(); ?>pakan">Informasi Pakan Pada budidaya
                        ikan di KJABB</a></h1>
                <p>Pakan yang digunakan di budidaya Kermba Jaring Apung Bulat Bertingkat (KJABB) ini merupakan pakan jenis runcah dan pelet. Pakan pelet merupakan pakan kualitas baik begitu juga dengan pakan runcah yang diambil dari potonga-potinga ikan segar </p>
            </div>
        </div>
    </main>

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