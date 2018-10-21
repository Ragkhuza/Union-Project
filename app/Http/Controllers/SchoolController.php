<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:school')->only('index');
    }

    public function index()
    {
        $students = auth()->user()->students->all();

        return view('school.home', compact('students'));
    }

    public function profile(School $school)
    {
        return view('school.profile', compact('school'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|string',
            'req_grade' => 'required|min:3|numeric',
            'email' => 'required|min:5|email',
            'interviews' => 'boolean|nullable',
            'password' => 'required|min:8'
        ]);

        $school = School::create([
            'name' => $request->name,
            'email' => $request->email,
            'req_grade' => $request->req_grade,
            'interviews' => ($request->interviews === null) ? false : true,
            'password' => Hash::make($request->password),
        ]);

        if($school) {
            return redirect(route('home'))->with('success', 'successfully added school');
        }
        // if failed return with error
        return redirect()->back()
            ->withInput($request->except('password'));
    }
}
