@extends('layouts.app')

@section('content')

<!--Angular scripts-->
  <script src="bower_compontents/angular/angular.min.js"></script>
  <script src="bower_compontents/angular/angular-ui-router/release/angular-ui-router.min.js"></script>
<!--End angular scripts-->
@include('welcome.angular');

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
