@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">About This Project:</div>
                <div class="panel-body">
                  {!!$about!!}
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
