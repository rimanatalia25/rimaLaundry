<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Exports\MemberExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Imports\MemberImport;

class MemberController extends Controller
{
    public function index()
    {
        $data = Member::all();
        return view('member/member', compact('data')); 
    }

    public function create()
    {
        $model = new Member;
        return view('member/member', compact('model'));
    }

   
    public function store(Request $request)
    {
        Member::create($request->all());
        return redirect ('member');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $Member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $Member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $Member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Member::find($id);
        return view('member/edit', compact(
            'model'
        ));
    }

    public function update(Request $request, $id)
    {
        $model = Member::findOrFail($id)->update($request->all());

        // $model->save();

        return back();
    }

    public function destroy($id)
    {
        $model = Member::find($id);
        $model->delete();
        return back();
    }

    public function exportToExcel(){
        return Excel::download(new MemberExport, 'member.xlsx');
    }

    public function cetakPDF()
    {
        $member = Member::all();

        // $pdf = PDF::loadview('member_pdf', ['member' => $member]);
        // return $pdf->download('laporan-member-pdf');
    }

    public function importData(Request $request){
        // dd( $request->file('import'));
        Excel::import(new MemberImport, $request->file('import'));

        return back()->with('success', 'Import Data Member BErhasil!!');
    }
}
