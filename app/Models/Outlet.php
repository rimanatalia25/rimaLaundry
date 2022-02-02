<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    use HasFactory;
    public $table = 'tb_outlets';
    protected $fillable = ['nama', 
                            'alamat', 
                            'tlp'];
}
