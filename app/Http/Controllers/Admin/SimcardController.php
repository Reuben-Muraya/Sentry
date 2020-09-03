<?php

namespace App\Http\Controllers\Admin;

use App\Simcard;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SimcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $simcards = Simcard::latest()->get();
        return view('admin.simcard.index', compact('simcards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.simcard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $simcard = new Simcard();
        $simcard->name = $request->name;
        $simcard ->save();

        Toastr::success('Simcard Type Successfully Saved','Success');
        return redirect()->route('simcard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $simcard = Simcard::findOrFail($id);
        return view('admin.simcard.edit', compact('simcard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $simcard = Simcard::findOrFail($id);
        $simcard->name = $request->name;
        $simcard->save();

        Toastr::success('Simcard Type Successfully Updated','Success');
        return redirect()->route('simcard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $simcards = Simcard::findOrFail($id)->delete();
        // Toastr::success('Simcard Type Successfully Deleted', 'Success');
        // return redirect()->back();
        $simcards = Simcard::findOrfail($id);
        $simcards->delete();
        return redirect()->back();
    }
}
