<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web,karyawan');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
   
        $chart_head = [];
        $content = [];
        $create_date = collect(DB::table('transaksi')->select('create_date')->get())->unique('create_date');
        if (empty($create_date->toArray())) {
            $range = CarbonPeriod::create(date('Y-m-d',strtotime(date('Y-m-d'). '-7 day')), date('Y-m-d'));
            foreach ($range as $date) {
                array_push($chart_head,$date->format('Y-m-d'));
                array_push($content,0);
            
            
            }
            
        }else{
            foreach ($create_date as $value) {
                $field = DB::table('transaksi')->where('create_date',$value->create_date)->count();
                array_push($chart_head,$value->create_date);
                array_push($content,$field);
            
            }
        }
        $data = [
            'transaksi' => DB::table('transaksi')->count(),
            'karyawan' => DB::table('karyawan')->count(),
            'item' => DB::table('item')->count(),
            'chart_head' =>$chart_head,
            'chart_content' =>$content,
            'planing' => DB::table('planing')->count(),
        ];
        return view('home',$data);
    }
}
