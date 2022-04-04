<?php

namespace App\Imports;

use App\Models\Outlet;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OutletImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new Outlet([
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'tlp' => $row['no_telepon']
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
