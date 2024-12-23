<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // Jika nama tabel kamu adalah plural atau tidak mengikuti konvensi, kamu bisa mendeklarasikan nama tabel
    // protected $table = 'patients';

    // Jika kolom di tabel tidak mengikuti konvensi (misalnya timestamp menggunakan nama berbeda),
    // kamu dapat menambahkan properti berikut
    // public $timestamps = false;

    // Tentukan kolom mana yang boleh diisi secara mass-assignment
    protected $fillable = [
        'full_name', 
        'gender', 
        'age', 
        'admission_date', 
        'diagnosis', 
        'doctor', 
        'kode', 
        'status'
    ];

}
