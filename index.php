<?php

require_once 'koneksi.php';
require_once 'Karyawan.php';
require_once 'KaryawanKontrak.php';
require_once 'KaryawanTetap.php';
require_once 'KaryawanMagang.php';

$db = new Koneksi();

$data = $db->conn->query(
    "SELECT * FROM tabel_karyawan"
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Karyawan</title>

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <style>

        body{
            background:
            linear-gradient(
                135deg,
                #0f172a,
                #1e3a8a,
                #3b82f6
            );

            min-height:100vh;
            color:white;
        }

        .card{
            border:none;
            border-radius:20px;
        }

        .glass{
            background:
            rgba(255,255,255,0.1);

            backdrop-filter:blur(20px);

            border:
            1px solid
            rgba(255,255,255,0.2);

            box-shadow:
            0 8px 25px
            rgba(0,0,0,0.2);
        }

    </style>

</head>
<body>

<div class="container py-5">

    <h1 class="text-center mb-5">
        💼 Sistem Manajemen Data Karyawan
    </h1>

    <div class="row">

<?php

while($row = $data->fetch_assoc())
{

    switch($row['jenis_karyawan'])
    {

        case 'Kontrak':

            $karyawan =
            new KaryawanKontrak($row);

            break;

        case 'Tetap':

            $karyawan =
            new KaryawanTetap($row);

            break;

        case 'Magang':

            $karyawan =
            new KaryawanMagang($row);

            break;
    }

?>

        <div class="col-md-4 mb-4">

            <div class="card glass p-4 h-100">

                <h4>
                    <?= $row['nama_karyawan']; ?>
                </h4>

                <hr>

                <p>

                    <b>ID :</b>
                    <?= $row['id_karyawan']; ?>

                    <br>

                    <b>Departemen :</b>
                    <?= $row['departemen']; ?>

                    <br>

                    <b>Jenis :</b>
                    <?= $row['jenis_karyawan']; ?>

                    <br>

                    <b>Hari Kerja :</b>
                    <?= $row['hari_kerja_masuk']; ?>

                    <br>

                    <b>Gaji Dasar :</b>

                    Rp
                    <?= number_format(
                        $row['gaji_dasar_per_hari'],
                        0,
                        ',',
                        '.'
                    ); ?>

                </p>

                <hr>

                <h6>
                    Informasi Khusus
                </h6>

                <p>
                    <?= $karyawan
                    ->tampilkanProfilKaryawan(); ?>
                </p>

                <hr>

                <h5 class="text-warning">

                    Gaji Bersih :

                    Rp
                    <?= number_format(
                        $karyawan
                        ->hitungGajiBersih(),
                        0,
                        ',',
                        '.'
                    ); ?>

                </h5>

            </div>

        </div>

<?php
}
?>

    </div>

</div>

</body>
</html>