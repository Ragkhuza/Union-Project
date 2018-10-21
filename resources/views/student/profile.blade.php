@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-warning"><b>STUDENT Profile: {{ $student->last_name }} {{ $student->first_name }}</b></div>

          <div class="card-body">
            <img src="https://www.mypassportphotos.com/images/blog/passport-photo-example-davd.png"
                 class="img-thumbnail" width="150">
            <br>

            <table class="table">
              <thead>
              <tr>
                <th>Year</th>
                <th>School</th>
                <th>Final Grades</th>
                <th>Ratings</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td scope="row">2017</td>
                <td>UE</td>
                <td>90%</td>
                <td>5.0</td>
              </tr>
              <tr>
                <td scope="row">2016</td>
                <td>UST</td>
                <td>1.0</td>
                <td>5.0</td>
              </tr>
              </tbody>
            </table>

            <table class="table">
              <thead>
              <tr>
                <th>Year</th>
                <th>School</th>
                <th>Final Grades</th>
                <th>Ratings</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td scope="row">2017</td>
                <td>UE</td>
                <td>90%</td>
                <td>5.0</td>
              </tr>
              <tr>
                <td scope="row">2016</td>
                <td>UST</td>
                <td>1.0</td>
                <td>5.0</td>
              </tr>
              </tbody>
            </table>

            <table class="table">
              <thead>
              <tr>
                <th>Year</th>
                <th>School</th>
                <th>Final Grades</th>
                <th>Ratings</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td scope="row">2017</td>
                <td>UE</td>
                <td>90%</td>
                <td>5.0</td>
              </tr>
              <tr>
                <td scope="row">2016</td>
                <td>UST</td>
                <td>1.0</td>
                <td>5.0</td>
              </tr>
              </tbody>
            </table>

{{--            <a class="btn btn-warning" href="{{ route('transfer', [$school]) }}">Transfer</a>--}}
            <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
