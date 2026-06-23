<?php

abstract class Karyawan
{
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hariKerjaMasuk;
    protected $gajiDasarPerHari;

    public function __construct($data)
    {
        $this->id_karyawan =
            $data['id_karyawan'];

        $this->nama_karyawan =
            $data['nama_karyawan'];

        $this->departemen =
            $data['departemen'];

        $this->hariKerjaMasuk =
            $data['hari_kerja_masuk'];

        $this->gajiDasarPerHari =
            $data['gaji_dasar_per_hari'];
    }

    abstract public function hitungGajiBersih();

    abstract public function tampilkanProfilKaryawan();
}

?>