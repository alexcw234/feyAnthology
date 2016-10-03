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
                <div class="panel-heading">User Permissions Control Panel</div>
                <div class="panel-body">
                  <p>
                    Select a user, category and group. Upon Submission, User's group will be changed for that category.
                    If they are not part of that category yet, they will be added to that category.
                    To change global permissions, select category 1 : Default.
                  </p>
                <form method="POST" action="{{ url('super/confirmthis') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <table border="1" >
                    <tr >
                      <th >
                        User
                      </th>
                      <th >
                        Category
                      </th>
                      <th >
                        Group
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <select size="10" class="ScrollyDropDown">
                        <option value="">--------</option>
                          @foreach ($users as $user)
                        <option value="{{$user->userID}}">{{$user->userID}} : {{$user->username}}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <select size="10" class="ScrollyDropDown">
                        <option value="">--------</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->catID}}">{{$category->catID}} : {{$category->catName}}</option>
                        @endforeach
                        </select>
                      </td>
                      <td>
                        <select size="10" class="ScrollyDropDown">
                        <option value="">--------</option>
                        @foreach ($groups as $group)
                        <option value="{{$group->groupID}}">{{$group->groupID}} : {{$group->groupName}}</option>
                        @endforeach
                        </select>
                      </td>
                      <td>
                      <input type="submit">
                    </td>
                    </tr>


                  </table>
                </form>



                </div>
            </div>
        </div>
    </div>
</div>





@endif

@endsection
