@extends('layouts.app')

@section('content')

<!--Angular scripts-->
  <script src="bower_components/angular/angular.js"></script>
  <script src="bower_components/angular-ui-router/release/angular-ui-router.js"></script>


<!-- Angular plugins-->
  <script type="text/javascript" src="bower_components/ng-tags-input/ng-tags-input.min.js"></script>
<!-- End angular plugins-->

<!--End angular scripts-->


@include('welcome-angular-connector')


@endsection
