<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;


class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("backend.agent.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "name" => "required|min:3|max:50",
            "email" => "required|min:3|max:70",
            "password" => "required|min:8|confirmed",
            "phone_no" => "required|min:3|max:20",
            "address" => "required|min:3",
        ]);
        $image = $request->file('image');
        if($image){
            $name=uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('image/profile'),$name);
            $path='image/profile/'.$name;
        }
        else if ($image == null) {
            $path = null;
        }

        $user = User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'image' => $path
        ]); 
        $user->assignRole('agent');
        return response()->json(['success'=>'Agent created successfully.']);
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
        $agent = User::find($id);
        return response()->json([
            'password' => $agent->password,
            'agent' => $agent
        ]);
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
            "edit_name" => "required|min:3|max:50",
            "edit_email" => "required|min:3|max:70",
            "edit_phone_no" => "required|min:3|max:20",
            "edit_address" => "required|min:3",
        ]);
        $image = $request->file('edit_image');
        if($image){
            $name=uniqid().time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('image/profile'),$name);
            $path='image/profile/'.$name;
        }
        else{
            $path = $request->agent_old_image;
        }

        if ($request->edit_password) {
            $password = Hash::make($request->edit_password);
        }else if ($request->old_password) {
            $password = $request->old_password;
        }
        $agent = User::find($id);
        $agent->name = $request->edit_name;
        $agent->email = $request->edit_email;
        $agent->password = $password;
        $agent->phone_no = $request->edit_phone_no;
        $agent->address = $request->edit_address;
        $agent->image = $path;
        $agent->save();
        return response()->json(['success'=>'Agent Updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $type = User::find($id);
            $type->delete();
            return response()->json(['success'=>'Agent deleted successfully.']);
    }
    public function getAgent(Request $request)
    {
        $agents = User::where('id', '!=', '1')->get();
        return $agents;
    }
}
