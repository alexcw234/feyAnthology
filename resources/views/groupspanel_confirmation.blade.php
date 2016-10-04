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

.fieldnames {
text-align:right;
font-weight:bold;

}

.fieldinfo {



}

.subheadingA
{
font-weight:bolder;
}

ul {
list-style: none;

}
.top-buffer {
  margin-top:20px;
}

</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Modify User Permissions</div>
                <div class="panel-body">
                  <p>{{$confirmThisString}}</p>
                  <div class="row">
                  <div class="col-md-6">
                    <p class="subheadingA">Current:</p>
                      <div class="col-md-4 fieldnames">
                        <ul>
                          <li>
                            Username:
                          </li>
                          <li>
                            Category:
                          </li>
                          <li>
                            Group:
                          </li>
                        </ul>
                      </div>
                      <div class="col-md-8 fieldinfo">
                        <ul>
                          <li>
                            {{$username_select}}
                          </li>
                          <li>
                            {{$catName_current}}
                          </li>
                          <li>
                            {{$groupName_current}}
                          </li>
                        </ul>
                      </div>
                  </div>

                  <div class="col-md-6">
                    <p class="subheadingA">After Changes:</p>
                      <div class="col-md-4 fieldnames">
                        <ul>
                          <li>
                            Username:
                          </li>
                          <li>
                            Category:
                          </li>
                          <li>
                            Group:
                          </li>
                        </ul>
                      </div>
                      <div class="col-md-8 fieldinfo">
                        <ul>
                          <li>
                            {{$username_select}}
                          </li>
                          <li>
                            {{$catName_select}}
                          </li>
                          <li>
                            {{$groupName_select}}
                          </li>
                        </ul>
                      </div>
                  </div>
                  </div>

                  <div class="row top-buffer">
                    <div class="col-md-6">
                    <a href="{{ url('/userperms') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                    <div class="col-md-6">
                    <form method="POST" action="{{ url('/super/change/user/role') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="userID_select" value="{{$userID_select}}">
                      <input type="hidden" name="catID_select" value="{{$catID_select}}">
                      <input type="hidden" name="groupID_select" value="{{$groupID_select}}">

                      <button class="btn btn-primary pull-right" value="Confirm"/>Confirm</button>
                    </form>
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
</div>





@endif

@endsection
