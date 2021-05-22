<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
 
    public function __construct()
    {
        $this->middleware('guest:web,karyawan')->except('logout');
    }
    public function Login(Request $request)
    {
        if($request->login == 'admin'){
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);
        }else if($request->login == 'karyawan'){
            $request->validate([
                'npk' => 'required|string|exists:karyawan,npk',
            ]);
         $karyawan = DB::table('karyawan')->where('npk',$request->npk)->first()->id;

        }else{
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);
        }
    
        $login = [
            'username' => $request->username,
            'password' => $request->password
        ];
        
        
        //LAKUKAN LOGIN
        if (auth()->attempt($login)) {
            //JIKA BERHASIL, MAKA REDIRECT KE HALAMAN HOME
            return redirect()->route('home');
        }else if(auth()->guard('karyawan')->loginUsingId($karyawan)){
            return redirect()->route('home');
            
        }

    }
    public function karyawan()
    {
        return view('vendor.adminlte.auth.auth-karyawan');
    }
}
