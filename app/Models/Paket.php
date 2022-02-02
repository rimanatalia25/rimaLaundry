<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    
    public $table = 'tb_pakets';
    protected $fillable = ['id_outlet', 'jenis', 'nama_paket', 'harga'];
}
