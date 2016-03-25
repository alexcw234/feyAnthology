@extends('layouts.app')

@section('content')

<!--Angular scripts-->
  <script src="bower_components/angular/angular.js"></script>
  <script src="bower_components/angular-ui-router/release/angular-ui-router.js"></script>


<!--End angular scripts-->



<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Fey Anthology!</div>

                <div class="panel-body">

                    @include('welcome-angular-connector')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
