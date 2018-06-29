<?php

namespace App\Http\Controllers\Guide;

use App\Guide;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use RegistersUsers;
    
    protected $redirectTo = '/';

    //showRegistrationFormのオーバーロード(きちんとguide/registerが表示できる)
    public function showRegistrationForm()
    {
        return view('guide.register');
    }
     
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    
    protected function create(array $data)
    {
        //Guide(ガイド)用の登録データの新規作成
        return Guide::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    
    // ログインに使用するguardを明示するため、guard()をオーバーライド
    protected function guard()
    {
        return Auth::guard('guide');
    }

    // ログアウトに使用するguardを明示するため、logout()をオーバーライド
    public function logout(Request $request)
    {
        Auth::guard('guide')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
 
        return redirect('/');
    }
}
