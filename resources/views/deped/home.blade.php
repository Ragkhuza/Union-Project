@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success">Dashboard</div>

                <div class="card-body">
                    You are logged in! as Deped
                </div>
            </div>
        </div>

        <div class="col-md-8 pt-5">
            <div class="card">
                <div class="card-header">Add School</div>

                <div class="card-body">
                    <form action="{{ route('add.school') }}" method="post">
                        {{ csrf_field() }}
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Message:</strong> {!! session('success') !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name">Name Of School</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="feutech" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="feutech@gmail.com" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="req_grade">Required Grade</label>
                            <input type="text" class="form-control" name="req_grade" id="req_grade" placeholder="2.0" value="{{ old('req_grade') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" name="interviews" type="checkbox" value="true" id="interviews">
                            <label class="form-check-label" for="interviews">
                                Needs to Interview students?
                            </label>


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
                <div class="card-header">School List</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($schools as $school)
                            <li class="list-group-item">{{ $school->name }} <a href="#" class="badge badge-primary badge-pill">edit</a > <a href="#" class="badge badge-danger badge-pill">delete</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
