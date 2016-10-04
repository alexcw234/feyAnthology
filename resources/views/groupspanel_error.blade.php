@extends('layouts.app')

@section('content')

@if (Auth::user()->globalID == 1)

<style>
table, th, td {
  border: 1px solid black;
  padding: 5px;
}
table {
  width: 100%;
  border-spacing: 15px;
}

.ScrollyDropDown{
overflow-y: scroll;
width: 95%;
}


</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Error</div>
                <div class="panel-body">
                  {{$confirmThisString}}
                </div>
            </div>
        </div>
    </div>
</div>





@endif

@endsection
