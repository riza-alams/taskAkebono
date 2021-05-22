<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('transaksi')
        ->join('item','transaksi.id_item','item.id')
        ->join('lokasi','transaksi.id_lokasi','lokasi.id')
        ->leftjoin('karyawan','transaksi.create_by','karyawan.id')
        ->leftjoin('login','transaksi.create_by','login.id')
        ->select('transaksi.kode',
        'transaksi.create_date',
        'transaksi.qty',
        'item.NamaItem as item_name',
        'item.Kode as item_kode',
        'lokasi.Kode as lokasi_kode',
        'lokasi.NamaLokasi as lokasi_name',
        'karyawan.Npk','karyawan.Nama as karyawan_name',
        'login.username as login_name'
        
        )
        ->get();
           return view('transaksi.view',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           $lokasi = DB::table('lokasi')->get();
           $item = DB::table('item')->get();
        return view('transaksi.input',compact('lokasi','item'));

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
            'qty' => 'required|numeric',
            'tanggal' => 'required|date',
         ]);
      if(auth()->guard('web')->check()){
        $auth = auth()->guard('web')->user()->id;
      }else if(auth()->guard('karyawan')->check()){
        $auth = auth()->guard('karyawan')->user()->id;
      }
      $get = DB::table('transaksi')->max('kode');
      $urutan = (int) substr($get, 3, 3);
      $urutan++;
      $huruf = "TRX";
      $Kode = $huruf . sprintf("%02s", $urutan);
      DB::table('transaksi')->insert([
        'id_item' => $request->item,
        'id_lokasi' => $request->lokasi,
        'qty' => $request->qty,
        'kode' => $Kode,
        'create_by' => $auth,
        'create_date' => $request->tanggal,
      ]);
      return redirect()->route('transaksi.index');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
