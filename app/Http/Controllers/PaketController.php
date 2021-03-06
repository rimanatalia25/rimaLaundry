<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaketExport;
use App\Imports\PaketImport;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;

class PaketController extends Controller
{
    public function index()
    {
        $data = Paket::with('outlet')->get();
     
        $outlet = Outlet::get();
        return view('paket/paket', compact('data', 'outlet'));
    }


    public function create()
    {
        $model = new Paket;
        return view('paket/paket', compact('model'));
    }

 
    public function store(Request $request)
    {
        Paket::create($request->all());
        return redirect ('paket');
    }   //
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $Paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $Paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $Paket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Paket::find($id);
        return view('paket/edit', compact(
            'model'
        ));
    }

    public function update(Request $request, $id)
    {
        $model = Paket::findOrFail($id)->update($request->all());

        // $model->save();

        return back();
    }

    public function destroy($id)
    {
        $model = Paket::find($id);
        $model->delete();
        return redirect('paket');
    }

    
    public function exportToExcel(){
        return Excel::download(new PaketExport, 'Paket.xlsx');
    }

    public function importData(Request $request){
        // dd( $request->file('import'));
        Excel::import(new PaketImport, $request->file('import'));

        return back()->with('success', 'Import Data Paket Berhasil!!');
    }
}
