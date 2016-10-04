@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Control Panel</div>
                <div class="panel-body">
                  @if (Auth::user()->globalID == 1)
                    <a href="{{ url('/userperms') }}">Change User Permissions</a>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>




@endsection