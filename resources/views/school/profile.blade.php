@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-warning"><b>SCHOOL Profile: {{ $school->name }}</b></div>

          <div class="card-body">
            <img src="http://poppycopyanddesign.com/wp-content/uploads/2015/04/School-for-Peace-logo-no-words.png"
                 class="img-thumbnail" width="150">
            <br>
            <table class="table">
              <thead>
              <tr>
                <th>Year</th>
                <th>Number of Students</th>
                <th>Board Passing Rate</th>
                <th>Tuition</th>
                <th>Ratings</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td scope="row">2017</td>
                <td>400</td>
                <td>90%</td>
                <td>50k</td>
                <td>5.0</td>
              </tr>
              <tr>
                <td scope="row">2016</td>
                <td>500</td>
                <td>91%</td>
                <td>45k</td>
                <td>5.0</td>
              </tr>
              </tbody>
            </table>

            <table class="table">
              <thead>
              <tr>
                <th>Year</th>
                <th>Number of Students</th>
                <th>Board Passing Rate</th>
                <th>Tuition</th>
                <th>Ratings</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td scope="row">2015</td>
                <td>400</td>
                <td>90%</td>
                <td>50k</td>
                <td>5.0</td>
              </tr>
              <tr>
                <td scope="row">2014</td>
                <td>500</td>
                <td>91%</td>
                <td>45k</td>
                <td>5.0</td>
              </tr>
              </tbody>
            </table>

            <table class="table">
              <thead>
              <tr>
                <th>Year</th>
                <th>Number of Students</th>
                <th>Board Passing Rate</th>
                <th>Tuition</th>
                <th>Ratings</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td scope="row">2013</td>
                <td>400</td>
                <td>90%</td>
                <td>50k</td>
                <td>5.0</td>
              </tr>
              <tr>
                <td scope="row">2012</td>
                <td>500</td>
                <td>91%</td>
                <td>45k</td>
                <td>5.0</td>
              </tr>
              </tbody>
            </table>

            <a class="btn btn-warning" href="{{ route('transfer', [$school]) }}">Transfer</a>
            <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
