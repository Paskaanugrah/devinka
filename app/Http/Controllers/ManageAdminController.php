<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Admin; 
use Hash;

class ManageAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admins = Admin::orderBy('id','DESC')->paginate(5); 
        return view('manageadmins.index',compact('admins')) 
        ->with('i', ($request->input('page', 1) - 1) * 5); 
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manageadmins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 
        'name' => 'required', 
        'email' => 'required|email|unique:admins,email', 
        'job_title' => 'required', 
        'password' => 'required|min:6|same:confirm-password', 
        ]); 
        $input = $request->all(); 
        $input['password'] = Hash::make($input['password']); 
        $admin = Admin::create($input); 
        return redirect()->route('manageadmins.index') 
        ->with('success','Admin berhasil ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id); 
        return view('manageadmins.show',compact('admin')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id); 
        return view('manageadmins.edit',compact('admin')); 
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
        $this->validate($request, [ 
        'name' => 'required', 
        'email' => 'required|email', 
        'job_title' => 'required', 
        'password' => 'same:confirm-password', 
        ]); 
        $input = $request->all(); 
        if(!empty($input['password'])){ 
        $input['password'] = Hash::make($input['password']); 
        }else{ 
        $input = array_except($input,array('password')); 
        } 
        $admin = Admin::find($id); 
        $admin->update($input); 
        return redirect()->route('manageadmins.index') 
        ->with('success','Admin berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete(); 
        return redirect()->route('manageadmins.index') 
        ->with('success','Admin berhasil dihapus'); 
    }
    
    public function __construct() 
    { 
        $this->middleware('auth:admin'); 
    }
}
