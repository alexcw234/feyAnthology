@extends('layouts.app')

@section('content')

@if (Auth::user()->globalID == 1)


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Site Settings</div>
                <div class="panel-body">
                  <p>
                        <div>
                          <h4>Edit the site's text:</h4>
                              <form name="settingsForm">

                                <div class="Form_Elem">
                                  <div data-toggle="collapse" data-target="#header" class="btn btn-primary Form_Elem_Title">Header Text:</div>

                                  <div id="header" class="collapse Form_Elem_Wrapper Form_Elem_Wrapper_Long">
                                      <input class="Form_Elem_Input" value="{{$headertext}}"></input>
                                    </div>
                                </div>

                                <div class="Form_Elem">
                                  <div data-toggle="collapse" data-target="#description" class="btn btn-primary Form_Elem_Title">Front Page Text (HTML):</div>
                                  <div id="description" class="collapse Form_Elem_Wrapper Form_Elem_Wrapper_VLarge">
                                      <textarea class="Form_Elem_Text_Area">{{$frontpage_description}}</textarea>
                                    </div>
                                </div>

                                <div class="Form_Elem">
                                  <div data-toggle="collapse" data-target="#about" class="btn btn-primary Form_Elem_Title">About Page Text (HTML):</div>
                                  <div id="about" class="collapse Form_Elem_Wrapper Form_Elem_Wrapper_VLarge">
                                      <textarea class="Form_Elem_Text_Area">{{$about}}</textarea>
                                    </div>
                                </div>

                                <div class="Form_Elem">
                                  <div data-toggle="collapse" data-target="#updates" class="btn btn-primary Form_Elem_Title">Updates Page Text (HTML):</div>
                                  <div id="updates" class="collapse Form_Elem_Wrapper Form_Elem_Wrapper_VLarge">
                                      <textarea class="Form_Elem_Text_Area">{{$updates}}</textarea>
                                    </div>
                                </div>

                                <div style="margin:20px"></div>
                              <button type="button" class="btn btn-success pull-right">
                                Submit Changes</button>
                                <button type="button" class="btn btn-secondary pull-right">
                                  Cancel</button>
                             </form>
                           </div>
                  </p>

                </div>
            </div>
        </div>
    </div>
</div>








@endif

@endsection
