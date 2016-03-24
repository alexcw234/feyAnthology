@extends('layouts.app')

@section('content')

<!--Angular scripts-->
  <script src="bower_components/angular/angular.min.js"></script>
  <script  src="bower_components/angular/angular-ui-router/release/angular-ui-router.min.js"></script>


<!--End angular scripts-->



<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.

                    @include('welcome-angular-connector')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
