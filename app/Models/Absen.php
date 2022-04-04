<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    //Atribut yang mendefinisikan table yang akan digunakan
    public $table = 'Absen'; 

    //property fillable digunakan untuk mendaftarkan Field/ Atribut yang boleh dimasukin data.
    protected $fillable = ['nama', 'tgl_masuk', 'waktu_masuk', 'status', 'waktu_selesai']; 
}
