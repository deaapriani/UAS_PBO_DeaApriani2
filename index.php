<?php
require_once 'koneksi.php';
require_once 'Karyawan.php';
require_once 'KaryawanKontrak.php';
require_once 'KaryawanTetap.php';
require_once 'KaryawanMagang.php';

$db = new Koneksi();

$data = $db->conn->query("SELECT * FROM tabel_karyawan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Data Karyawan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            min-height:100vh;
            background: linear-gradient(
                135deg,
                #dbeafe,
                #93c5fd,
                #60a5fa,
                #3b82f6
            );
            font-family:'Segoe UI', sans-serif;
        }

        .header{
            text-align:center;
            margin-bottom:50px;
        }

        .header h1{
            color:#0f172a;
            font-weight:700;
            margin-bottom:10px;
        }

        .header p{
            color:#334155;
            font-size:18px;
        }

        .glass-card{
            background: rgba(255,255,255,0.25);
            backdrop-filter: blur(15px);
            border:1px solid rgba(255,255,255,0.4);
            border-radius:25px;
            padding:30px;
            box-shadow:0 10px 30px rgba(59,130,246,0.25);
            transition:0.3s;
            height:100%;
        }

        .glass-card:hover{
            transform:translateY(-8px);
        }

        .nama{
            color:#1e3a8a;
            font-weight:700;
            margin-bottom:20px;
        }

        .label{
            color:#2563eb;
            font-size:14px;
            font-weight:600;
        }

        .isi{
            color:#0f172a;
            margin-bottom:15px;
        }

        .khusus{
            background:rgba(255,255,255,0.3);
            border-radius:15px;
            padding:15px;
            margin-top:20px;
        }

        .gaji{
            margin-top:25px;
            text-align:center;
            background:rgba(255,255,255,0.4);
            padding:15px;
            border-radius:15px;
        }

        .gaji h4{
            color:#2563eb;
            font-weight:bold;
            margin-bottom:5px;
        }

        .gaji small{
            color:#475569;
        }
    </style>

</head>
<body>

<div class="container py-5">

    <div class="header">
        <h1>💼 Dashboard Data Karyawan</h1>
        <p>Sistem Informasi Manajemen Karyawan Berbasis PHP OOP</p>
    </div>

    <div class="row">

        <?php
        while($row = $data->fetch_assoc())
        {
            switch($row['jenis_karyawan'])
            {
                case 'Kontrak':
                    $karyawan = new KaryawanKontrak($row);
                    break;

                case 'Tetap':
                    $karyawan = new KaryawanTetap($row);
                    break;

                case 'Magang':
                    $karyawan = new KaryawanMagang($row);
                    break;
            }
        ?>

        <div class="col-md-4 mb-4">

            <div class="glass-card">

                <h3 class="nama">
                    👤 <?= $row['nama_karyawan']; ?>
                </h3>

                <div class="label">ID Karyawan</div>
                <div class="isi">
                    <?= $row['id_karyawan']; ?>
                </div>

                <div class="label">Departemen</div>
                <div class="isi">
                    <?= $row['departemen']; ?>
                </div>

                <div class="label">Jenis Karyawan</div>
                <div class="isi">
                    <?= $row['jenis_karyawan']; ?>
                </div>

                <div class="label">Hari Kerja Masuk</div>
                <div class="isi">
                    <?= $row['hari_kerja_masuk']; ?> Hari
                </div>

                <div class="label">Gaji Dasar Per Hari</div>
                <div class="isi">
                    Rp <?= number_format(
                        $row['gaji_dasar_per_hari'],
                        0,
                        ',',
                        '.'
                    ); ?>
                </div>

                <div class="khusus">

                    <h6 class="text-primary fw-bold mb-3">
                        📋 Informasi Khusus
                    </h6>

                    <?= $karyawan->tampilkanProfilKaryawan(); ?>

                </div>

                <div class="gaji">

                    <h4>
                        Rp
                        <?= number_format(
                            $karyawan->hitungGajiBersih(),
                            0,
                            ',',
                            '.'
                        ); ?>
                    </h4>

                    <small>Total Gaji Bersih</small>

                </div>

            </div>

        </div>

        <?php
        }
        ?>

    </div>

</div>

</body>
</html>