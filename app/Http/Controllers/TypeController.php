<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view("backend.type.index");
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
            "type" => "required|min:3|max:30",
        ]);
        Type::updateOrCreate(['id' => $request->type_id],
                ['type' => $request->type]);        
   
        return response()->json(['success'=>'Type saved successfully.']);
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
        $type = Type::find($id);
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
        //
        $request->validate([
            "type" => "required|min:3|max:255",
        ]);
        $type= Type::find($id);
        $type->type=request('type');
        $type->save();
        return redirect()->route('admin.type.index');
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
            $type = Type::find($id);
            $type->delete();
            return response()->json(['success'=>'Type deleted successfully.']);
        } catch (\Illuminate\Database\QueryException $e) {
            $errors = $e->getMessage();
            return response()->json(['error'=>"You can't delete this type.This type was used by others"]);
        }
    }

    public function getTypes(Request $request)
    {
        $types = Type::all();
        return $types;
    }
}
