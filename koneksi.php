<?php

class Koneksi
{
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli(
            "localhost",
            "root",
            "",
            "db_uas_pbo_trpl1b_deaapriani"
        );

        if ($this->conn->connect_error) {
            die(
                "Koneksi gagal: " .
                $this->conn->connect_error
            );
        }

        echo "Koneksi berhasil";
    }
}

?>