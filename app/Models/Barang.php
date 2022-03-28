<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public $table = 'Barang';
    protected $fillable = ['barang', 'qty', 'harga', 'waktu', 'supplier', 'status', 'waktu_update'];
}
