<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all();
        $basepath = "https://api-uat.unionbankph.com/partners/sb/";
        $client_id = "684d855d-e843-4746-9d0d-3860f183b0ea";
        $app_redirect_uri = "http://127.0.0.1:8000/api/unionbank";

        if (auth()->user()->roles !== null) {
            if (auth()->user()->roles->first()->name === 'deped') {


                return view('deped.home', compact('schools'));
            }
        }

        // if authenticated user is school
        /*if (auth()->user() instanceof School) {
            return view('school.home');
        }*/

        return view('home', compact('basepath', 'client_id', 'app_redirect_uri', 'schools'));
    }
}
