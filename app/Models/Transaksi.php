<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
    public $table = 'tb_transaksis';
    protected $fillable = ['id_outlet', 
                            'kode_invoice', 
                            'id_member', 
                            'tgl', 
                            'batas_waktu',
                            'tgl_bayar',
                            'biaya_tambahan',
                            'diskon',
                            'pajak',
                            'status',
                            'dibayar',
                            'id_user'];
}
