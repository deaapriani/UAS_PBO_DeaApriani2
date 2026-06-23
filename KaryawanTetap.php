<?php
require_once 'Karyawan.php';

class KaryawanTetap extends Karyawan
{
    protected $tunjanganKesehatan;
    protected $opsiSahamId;

    public function __construct($data)
    {
        parent::__construct($data);

        $this->tunjanganKesehatan =
            $data['tunjangan_kesehatan'];

        $this->opsiSahamId =
            $data['opsi_saham_id'];
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