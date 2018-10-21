<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\School;
use App\User;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request, $role)
    {

        // if students basically
        if ($role !== 'school') {
            $user = User::whereHas('roles', function($q) use($role) {
                $q->where('name', $role);
            });
            Auth::login($user->first());
            return redirect()->intended(route('home'));
        }

        if ($role === 'school') {

            $school = School::first();


            if(Auth::guard('school')->attempt(['email' => $school->email, 'password' => 12345678], $request->remember)) {
                return redirect()->intended(route('school.home'));
            }
        }

        if ($role === 'deped') {
            $schools = School::all();
//            return view('deped.home', compact('schools'));
            return redirect()->intended(route('home'));
        }
        /*$request->validate([
            'email' => 'required|min:5|email',
            'password' => 'required|min:8'
        ]);


        // check if username and password match any roles
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            //user authenticated
            //check if user has role of admin
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended(route('admin.home'));
            }

            return redirect()->intended(route('user.home'));
        } */

        // if failed return with error
        return redirect()->back()
            ->withErrors(['invalid' => 'Invalid username or password.'])
            ->withInput($request->except('password'));
    }
}
