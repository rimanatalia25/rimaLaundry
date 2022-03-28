<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::all();
        return view('barang/barang', compact('data')); 
    }

    public function create()
    {
        $model = new Barang;
        return view('barang/barang', compact('model'));
    }

   
    public function store(Request $request)
    {
        Barang::create($request->all());
        return redirect ('barang');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Barang::find($id);
        return view('barang/edit', compact(
            'model'
        ));
    }

    public function update(Request $request, $id)
    {
        $model = Barang::findOrFail($id)->update($request->all());

        // $model->save();

        return back();
    }

    public function destroy($id)
    {
        $model = Barang::find($id);
        $model->delete();
        return back();
    }
}
