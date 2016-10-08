@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Control Panel</div>
                <div class="panel-body">
                  @if (Auth::user()->globalID == 1)
                  <h4>Options:</h4>
                  <ul>
                    <li><a href="{{ url('/userperms') }}">Change User Permissions</a></li>
                    <li><a href="{{url('/sitesettings')}}">Site Settings</a></li>
                  </ul>
                  @endif

                </div>
            </div>
        </div>
    </div>
</div>




@endsection
