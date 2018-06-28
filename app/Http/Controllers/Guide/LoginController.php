<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';
    
    //showRegistrationFormのオーバーロード(きちんとguide/loginが表示される)
    public function showLoginForm()
    {
        return view('guide.login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // ゲストログイン時に使用するguardを指定する必要があります
    public function __construct()
    {
        $this->middleware('guest:guide')->except('logout');
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
