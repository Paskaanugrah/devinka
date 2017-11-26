<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesan;


class ManagePemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() 
    { 
        $this->middleware('auth:admin'); 
    }

    public function index(Request $request)
    {
        
        $pesan = Pesan::orderBy('id','DESC')->paginate(10); 
        return view('managepemesanan.index',compact('pesan')) 
        ->with('i', ($request->input('page', 1) - 1) * 10); 
         
        /*$data =   Teather::where('is_active','=','1')
                ->orderBy('name','desc')
                ->take(3)
                ->get();*/
        //dd($data);
        // $pesan = Pesan::all();
        // return view('managepemesanan.index',compact('pesan'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('managepemesanan.create');    
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
        'nik' => 'required|min:9', 
        'no_telp' => 'required|min:9', 
        'alamat' => 'required',
        'mobil' => 'required', 
        ]); 
        $input = $request->all(); 
        $pesan = Pesan::create($input); 
        return redirect()->route('pemesanan.index') 
        ->with('success','PEMESANAN BARU BERHASIL DITAMBAHKAN!'); 
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesan = Pesan::find($id); 
        return view('managepemesanan.show',compact('pesan')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesan = Pesan::find($id); 
        return view('managepemesanan.edit',compact('pesan'));     
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
        'nik' => 'required|min:9', 
        'no_telp' => 'required|min:9', 
        'alamat' => 'required',
        'mobil' => 'required', 
        ]); 
        $input = $request->all(); 
        $pesan = Pesan::find($id); 
        $pesan->update($input); 
        return redirect()->route('pemesanan.index') 
        ->with('success','Pemesanan Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pesan::find($id)->delete(); 
        return redirect()->route('pemesanan.index') 
        ->with('success','DATA PEMESANAN BERHASIL DIHAPUS!'); 
    }
}
