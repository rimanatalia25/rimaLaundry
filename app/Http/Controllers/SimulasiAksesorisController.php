<?php

namespace App\Http\Controllers;

use App\Models\SimulasiAksesoris;
use App\Http\Requests\StoreSimulasiAksesorisRequest;
use App\Http\Requests\UpdateSimulasiAksesorisRequest;

class SimulasiAksesorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        return view('aks/aks');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSimulasiAksesorisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSimulasiAksesorisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SimulasiAksesoris  $simulasiAksesoris
     * @return \Illuminate\Http\Response
     */
    public function show(SimulasiAksesoris $simulasiAksesoris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SimulasiAksesoris  $simulasiAksesoris
     * @return \Illuminate\Http\Response
     */
    public function edit(SimulasiAksesoris $simulasiAksesoris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSimulasiAksesorisRequest  $request
     * @param  \App\Models\SimulasiAksesoris  $simulasiAksesoris
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSimulasiAksesorisRequest $request, SimulasiAksesoris $simulasiAksesoris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimulasiAksesoris  $simulasiAksesoris
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimulasiAksesoris $simulasiAksesoris)
    {
        //
    }
}
