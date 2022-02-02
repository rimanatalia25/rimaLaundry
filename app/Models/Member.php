<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $table = 'Member';
    protected $fillable = ['nama', 'alamat', 'jenis_kelamin', 'tlp'];
}
