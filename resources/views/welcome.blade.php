@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Fey Anthology</div>
                <div class="panel-body">
                  <p>Fey Anthology is a categorical database for user-contributed bookmarks.<br>
                  ie. links to stories, websites, etc. having an overarching theme</p>
                  <p>It uses PHP (with Laravel), AngularJS, and PostgreSQL</p>

                  <p>
                  Basic user roles:
                  <ul>
                    <li><b>Guests</b> and <b>Registered Users</b> can view and search the database.</li>
                    <li><b>Contributors</b> to a category can submit new links for approval. Users with "contributor+"
                    status have their contributions approved automatically.</li>
                    <li><b>Moderators</b> can approve or reject user submissions and contributor requests</li>
                    <li><b>Archivists</b> can promote new moderators.</li>
                    <li><b>Global Archivists</b> (not yet implemented) will be able to create new categories.
                    </ul>
                  </p>
                  <a href="{{ url('/browse') }}">Browse the database</a>

                    <p>Currently features related to changing user roles are not yet implemented.</p>
                    <p>For the time being, please use the following login info to test contributor and moderator functionalities:</p>
                    <ul>
                      <li>Username: Contributor, Password: Contributor</li>
                      <li>Username: Moderator, Password: Moderator</li>
                      </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
