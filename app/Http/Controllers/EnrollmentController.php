<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function showTransfer(School $school)
    {
        return view('school.transfer', compact('school'));
    }

    public function transfer(Request $request)
    {
//        dd($request->all());
        $school = School::find($request->school_id);
        $student = auth()->user();
        $student->course_id = $request->course_id;
        $student->school_id = $school->id;
        $student->save();

        return redirect(route('home'))->with('success', 'successfully transferred');
    }
}
