<?php

namespace App\Imports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\ToModel;

class PatientsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Patient([
            'full_name' => $row[0],       // Pastikan indeks sesuai dengan kolom Excel
            'gender' => $row[1],
            'age' => $row[2],
            'admission_date' => \Carbon\Carbon::parse($row[3]), // Ubah format tanggal sesuai format di Excel
            'diagnosis' => $row[4],
            'doctor' => $row[5],
            'kode' => $row[6],
            'status' => $row[7],
        ]);
    }
}
