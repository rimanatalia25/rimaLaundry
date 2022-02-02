<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    public $table = 'tb_detail_transaksis';
    protected $fillable = ['id-transaksi', 'id_paket', 'qty', 'keterangan'];
}
