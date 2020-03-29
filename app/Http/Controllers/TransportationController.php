<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transportation;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view("backend.transportation.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.type.create");
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
            "transportation_type" => "required|min:3|max:10",
            /*'transportation_image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',*/
        ]);
        Transportation::Create([
            'transportation_type' => $request->transportation_type,
        ]);        
   
        return response()->json(['success'=>'Transportation saved successfully.']);
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
        $type = Transportation::find($id);
        return $type;
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
        $request->validate([
            "edit_transportation_type" => "required|min:3|max:10"
        ]);
        $transportation_id = $request->edit_transportation_id;
        $transportation= Transportation::find($transportation_id);
        $transportation->transportation_type=$request->edit_transportation_type;
        $transportation->save();
        return response()->json(['success'=>'Transportation saved successfully.']);   
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
            $transportation = Transportation::find($id);
            $transportation->delete();
            return response()->json(['success'=>'Transportation deleted successfully.']);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error'=>"You can't delete this transportation.This transportation was used by others"]);
        }
    }

    public function getTransportations(Request $request)
    {
        $types = Transportation::all();
        return $types;
    }
}
