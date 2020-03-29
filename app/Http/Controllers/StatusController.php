<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use Redirect;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();
        return view("backend.status.index", compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.status.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "status" => "required|min:3|max:30",
        ]);
        Status::create([
            "status" => request('status') ,
        ]);
        return redirect()->route('admin.status.index');
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
        //
        $status = Status::find($id);
        return view('backend.status.edit', compact('status'));
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
        //
        $request->validate([
            "status" => "required|min:3|max:255",
        ]);
        $status= Status::find($id);
        $status->status=request('status');
        $status->save();
        return redirect()->route('admin.status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $status = Status::find($id);
            $status->delete();
            return redirect()->route('admin.status.index');
        } catch (\Illuminate\Database\QueryException $e) {
            $errors = $e->getMessage();
            return Redirect::back()->withErrors("You can't delete this status.This status was used by others");
        }
    }
}
