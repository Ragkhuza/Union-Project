@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info">Dashboard</div>

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
                            <li class="list-group-item"><b>{{ $school->name }}</b> <a href="{{ route('school.profile', $school) }}" class="badge badge-info badge-pill">view</a></li>
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
                            <li class="list-group-item"> <b>{{ $school->name }}</b> <a href="{{ route('transfer', [$school]) }}" class="badge badge-primary badge-pill">transfer</a> <a href="{{ route('school.profile', $school) }}" class="badge badge-info badge-pill">view</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
