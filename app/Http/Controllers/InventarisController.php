<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Http\Requests\StoreInventarisRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateInventarisRequest;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Inventaris::all();
        return view('inventaris/inventaris', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Inventaris;
        return view('inventaris/inventaris', compact('model'));
    }

   
    public function store(StoreInventarisRequest $request)
    {
        Inventaris::create($request->all());
        return redirect ('inventaris');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function show(Inventaris $inventaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = inventaris::find($id);
        return view('inventaris/edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventarisRequest  $request
     * @param  \App\Models\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Inventaris::findOrFail($id)->update($request->all());

        // $model->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Inventaris::find($id);
        $model->delete();
        return redirect('inventaris');
    }
}
