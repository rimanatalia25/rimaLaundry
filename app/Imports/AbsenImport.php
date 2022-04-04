<?php

namespace App\Imports;

use App\Models\Absen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsenImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new Absen([
            'nama' => $row['nama_karyawan'],
            'tgl_masuk' => $row['tanggal_masuk'],
            'waktu_masuk' => $row['waktu_masuk'],
            'status' => $row['status'],
            'waktu_selesai' => $row['waktu_kerja_selesai'],
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
