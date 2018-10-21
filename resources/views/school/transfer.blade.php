@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning">Transfer</div>

                <div class="card-body">
                    <form action="{{ route('transfer') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="school">School</label>
                            <input type="text" class="form-control" id="school" value="{{ $school->name }}">
                            <input type="hidden" name="school_id" value="{{ $school->id }}">
                        </div>
                        <div class="form-group">
                            <label for="course">Courses</label>
                            <select class="custom-select" name="course_id" id="course">
                                <option selected>Select one</option>
                                @foreach($school->courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Transfer</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
