@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <h2 class="text-success">Payment Successful</h2>

                    <a href="{{ route('home') }}" class="btn btn-primary">return to home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
