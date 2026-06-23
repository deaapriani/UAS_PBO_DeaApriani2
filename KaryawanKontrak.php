<?php
require_once 'Karyawan.php';

class KaryawanKontrak extends Karyawan
{
    protected $durasiKontrakBulan;
    protected $agensiPenyalur;

    public function __construct($data)
    {
        parent::__construct($data);

        $this->durasiKontrakBulan =
            $data['durasi_kontrak_bulan'];

        $this->agensiPenyalur =
            $data['agensi_penyalur'];
    }

    public function hitungGajiBersih()
    {
        return $this->hariKerjaMasuk
               * $this->gajiDasarPerHari;
    }

    public function tampilkanProfilKaryawan()
    {

    }
}
?>