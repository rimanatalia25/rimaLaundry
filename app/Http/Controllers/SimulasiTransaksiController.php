<?php

namespace App\Http\Controllers;

use App\Models\SimulasiTransaksi;
use App\Http\Requests\StoreSimulasiTransaksiRequest;
use App\Http\Requests\UpdateSimulasiTransaksiRequest;

class SimulasiTransaksiController extends Controller
{
    public function index(){
        return view('simulasitransaksi/test');
    }
}
