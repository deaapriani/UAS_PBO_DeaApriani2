<?php
require_once 'Karyawan.php';

class KaryawanMagang extends Karyawan
{
    protected $uangSakuBulanan;
    protected $sertifikatKampusMerdeka;

    public function __construct($data)
    {
        parent::__construct($data);

        $this->uangSakuBulanan =
            $data['uang_saku_bulanan'];

        $this->sertifikatKampusMerdeka =
            $data['sertifikat_kampus_merdeka'];
    }

    public function hitungGajiBersih()
    {
        // Akan diisi pada Tahap 5
    }

    public function tampilkanProfilKaryawan()
    {
        // Akan diisi pada Tahap 6
    }
}
?>