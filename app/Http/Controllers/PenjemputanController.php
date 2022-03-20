<?php

namespace App\Http\Controllers;

use App\Models\penjemputan;
use Illuminate\Http\Request;
use App\Http\Requests\StorepenjemputanRequest;
use App\Http\Requests\UpdatepenjemputanRequest;

class PenjemputanController extends Controller
{
    public function index()
    {
        $data = Penjemputan::all();
        return view('penjemputan/penjemputan', compact('data')); 
    }

    public function create()
    {
        $model = new Penjemputan;
        return view('penjemputan/penjemputan', compact('model'));
    }

   
    public function store(Request $request)
    {
        Penjemputan::create($request->all());
        return redirect ('penjemputan');
    }
 
    public function show(penjemputan $penjemputan)
    {
        //
    }

  
    
    public function edit($id)
    {
        $model = Penjemputan::find($id);
        return view('penjemputan/edit', compact(
            'model'
        ));
    }

    public function update(Request $request, $id)
    {
        $model = Penjemputan::findOrFail($id)->update($request->all());

        // $model->save();

        return back();
    }

    public function destroy($id)
    {
        $model = Penjemputan::find($id);
        $model->delete();
        return back();
    }
}
