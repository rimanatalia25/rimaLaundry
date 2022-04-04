<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OutletExport;
use App\Http\Requests\StoreOutletRequest;
use App\Http\Requests\UpdateOutletRequest;
use App\Imports\OutletImport;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Outlet::all();
        return view('outlet/outlet', compact('data'));
    }


    public function create()
    {
        $model = new Outlet;
        return view('outlet/outlet', compact('model'));
    }

 
    public function store(Request $request)
    {
        Outlet::create($request->all());
        return redirect ('outlet');
    }

  
    public function show(Outlet $Outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $Outlet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Outlet::find($id);
        return view('outlet/edit', compact(
            'model'
        ));
    }

    public function update(Request $request, $id)
    {
        $model = Outlet::findOrFail($id)->update($request->all());

        // $model->save();

        return back();
    }

    public function destroy($id)
    {
        $model = Outlet::find($id);
        $model->delete();
        return redirect('outlet');
    }
    public function exportToExcel(){
        return Excel::download(new OutletExport, 'Outlet.xlsx');
    }
    public function importData(Request $request){
        // dd( $request->file('import'));
        Excel::import(new OutletImport, $request->file('import'));

        return back()->with('success', 'Import Data Outlet Berhasil!!');
    }
}
