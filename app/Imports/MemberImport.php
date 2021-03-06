<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MemberImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new Member([
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tlp' => $row['nomor_telepon']
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
