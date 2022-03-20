<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjemputan extends Model
{
    use HasFactory;

    public $table = 'penjemputan';
    protected $fillable = ['nama', 'alamat', 'tlp', 'petugas', 'status'];
}
