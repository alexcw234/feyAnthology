@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">About this project:</div>
                <div class="panel-body">
                  <p>Fey Anthology is a categorical database for user-contributed bookmarks.<br>
                  ie. links to stories, websites, etc. having an overarching theme</p>
                  <p>It uses PHP (Laravel), AngularJS, and PostgreSQL</p>

                  <p>
                  Basic user roles:
                  <ul>
                    <li><b>Guests</b> and <b>Registered Users</b> can view and search the database.</li>
                    <li><b>Contributors</b> to a category can submit new links for approval.</li>
                    <li><b>Moderators</b> can approve or reject user submissions and contributor requests, as well as edit or delete existing links.</li>
                    <li><b>Archive Managers</b> can promote new moderators.</li>
                    </ul>
                  </p>
                  <a href="{{ url('/browse') }}">Browse the database</a>

                </div>
            </div>
        </div>
    </div>
</div>





@endsection
