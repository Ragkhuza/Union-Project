@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                @php
                $course = \App\Course::where('id', auth()->user()->course_id)->first();
                $tuition = $course->tuition;
                @endphp
                <div class="card-header bg-info">Balance: <b>₱{{ $tuition }} <small>(tuition fee)</small></b></div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    You are logged in!
                        <a href="{{$basepath}}/convergent/v1/oauth2/authorize?response_type=code&client_id={{$client_id}}&redirect_uri={{$app_redirect_uri}}&scope=payments" class="btn btn-primary">Pay Tuition Now</a>

                </div>
            </div>
        </div>

        <div class="col-md-8 pt-5">
            <div class="card">
                <div class="card-header">Current School</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($schools as $school)
                            @if($school->id == auth()->user()->school_id)
                                <li class="list-group-item"><b>{{ $school->name }}</b> <a href="{{ route('school.profile', $school) }}" class="badge badge-info badge-pill">view</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8 pt-5">
            <div class="card">
                <div class="card-header">Schools</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($schools as $school)
                            @if($school->id != auth()->user()->school_id)
                                <li class="list-group-item"> <b>{{ $school->name }}</b>
                                    <a href="{{ route('transfer.show', [$school]) }}" class="badge badge-primary badge-pill">transfer</a>
                                    <a href="{{ route('school.profile', $school) }}" class="badge badge-info badge-pill">view</a>
                                    <a href="#" style="opacity: 0.4" class="badge badge-warning badge-pill">courses</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
