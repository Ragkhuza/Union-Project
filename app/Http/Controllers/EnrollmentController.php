<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function transfer(Request $request, $school)
    {
        $school = School::find($school);
        $student = auth()->user();

        $student->school_id = $school->id;

        return back()->with('success', 'Transfered Successfully');
    }
}
