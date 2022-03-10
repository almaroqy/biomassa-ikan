<!DOCTYPE html>
<html>
<head>
    <title>Grafik Stok Barang</title>
</head>
<body>
 
    <div class="chart-container" style="position: relative; height:40vh; width:80vw">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src = "<?php echo base_url(); ?>assets/Chartjs/package/dist/chart.min.js"></script>
        
        <canvas id="myChart" ></canvas>
        <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                <?php
                    foreach ($panen as $pan)
                    {
                        
                ?>
                    labels: <?= $pan->tanggal_panen ?>,
                <?php } ?>
                datasets: [{
                    label: '# Jumlah Ikan Hidup',
                    data: [<?= $pan->jumlah_hidup ?>, <?= $pan->jumlah_mati ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
    </div>
</body>
</html>