@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning">Dashboard SCHOOLS!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>

        <div class="col-md-8 pt-5">
            <div class="card">
                <div class="card-header bg-info">Adjust Requirements</div>

                <div class="card-body">
                    <form action="{{ route('add.school') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            @for($i = 0; $i < request()->req; $i++)
                            <input type="text" class="form-control" name="name" id="name" placeholder="{{"requirement$i name"}}" value="{{ old("name$i") }}">
                            @endfor
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="{{"requirement$i name"}}" value="{{ old("name$i") }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mb-2 col-md-3 offset-md-9">Confirm</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 pt-5">
            <div class="card">
                <div class="card-header">Student List</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($students as $student)
                            <li class="list-group-item">{{ $student->last_name }} {{ $student->first_name }} <a href="{{ route('student.profile', $student) }}" class="badge badge-primary badge-pill">view</a> <a href="#" class="badge badge-danger badge-pill">remove</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
