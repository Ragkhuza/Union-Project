<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function profile(User $user)
    {
        $student = $user;
        return view('student.profile', compact('student'));
    }
}
