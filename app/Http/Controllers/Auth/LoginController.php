<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    // | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo()
    {
        switch(Auth::user()->role_id)
        {
            case 1:$this->redirectTo='/admin/home';
            return $this->redirectTo;
            break;
            case 2:$this->redirectTo='/user/home';
            return $this->redirectTo;
            break;
            case 3:$this->redirectTo='/client/home';
            return $this->redirectTo;
            break;
            default:
            $this->redirctTo='/login';
            return $this->redirectTo;
        }
    }
    protected function loggedOut(Request $request)// A ajouter
    {
        $request->session()->flash('flash','bye');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ],[
            'email.required'=>'email is required',
            'email.email'=>"Enter an email",
            'password.min'=>'password must contain at least 8 char',
            'password.required'=>'password is required',
        ]);
    }
}
