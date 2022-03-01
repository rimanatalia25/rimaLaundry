<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Exports\MemberExport;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Member::all();
        return view('member/member', compact('data')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Member;
        return view('member/member', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect('member');
    }

    public function exportToExcel(){
        return Excel::download(new MemberExport, 'member.xlsx');
    }
}
