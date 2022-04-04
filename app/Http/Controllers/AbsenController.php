<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Http\Requests\StoreAbsenRequest;
use App\Http\Requests\UpdateAbsenRequest;
use App\Exports\AbsenExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Imports\AbsenImport;
use Illuminate\Http\Request;

class AbsenController extends Controller
{

    // pertama kali diakses, dan  juga merupakan fungsi default, jika saat memanggil class tanpa menyebutkan fungsinya. 
    public function index()
    {
        $data = Absen::all();
        return view('absen/absen', compact('data')); 
    }

   //untuk menampilkan form create post
    public function create()
    {
        $model = new Absen;
        return view('absen/absen', compact('model'));
    }

    //  untuk menginputkan table ke database
    public function store(Request $request)
    {
        Absen::create($request->all());
        return redirect ('absen');
    }

    //untuk menampilkan detail dari sebuah post
    public function show(Absen $absen)
    {
        //
    }

    //  untuk menampilkan halaman edit
    public function edit($id)
    {
        $model = Absen::find($id);
        return view('absen/edit', compact(
            'model'
        ));
    }

    //untuk melakukan perubahan data yang dikirim ke database
    public function update(Request $request, $id)
    {
        $model = Absen::findOrFail($id)->update($request->all());

        // $model->save();

        return back();
    }

    //  untuk menghapus data pada table di database
    public function destroy($id)
    {
        $model = Absen::find($id);
        $model->delete();
        return back();
    }

    //  yang digunakan untuk export ke Excel
    public function exportToExcel(){
        return Excel::download(new AbsenExport, 'Absen.xlsx');
    }

    //  yang digunakan untuk cetak atau export ke PDF
    public function cetakPDF()
    {
        $Absen = Absen::all();

        // $pdf = PDF::loadview('Absen_pdf', ['Absen' => $Absen]);
        // return $pdf->download('laporan-Absen-pdf');
    }

    //  yang digunakan untuk mengimport atau mengambil data excel ke table
    public function importData(Request $request){
        // dd( $request->file('import'));
        Excel::import(new AbsenImport, $request->file('import'));

        return back()->with('success', 'Import Data Absen Berhasil!!');
    }
}
