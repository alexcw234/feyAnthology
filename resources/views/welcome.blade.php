@extends('layouts.app')

@section('content')

<div class="homepage_content">
  <div class="homepage_image_wrapper">
    <div class="homepage_image_outer">
  <img width="100%" src="img/defaultmainimg.jpg"/>
      <div class="homepage_image_text">
          <div class="homepage_image_header">{{$headertext}}</div>
            {!!$frontpage_description!!}
        </div>
    </div>
  </div>
<div class="featuredContent">
  <div class="container-fluid">
    <div class="row">
      <h2>Featured Content</h2>

      @foreach ($featured as $feature)

              <div class="col-xs-6 col-md-4">
                <div class="thumbnail">
                  <div class="caption">
                    <h3>{{$feature['info']['Title']}}</h3>
                    @if (isset($feature['creator']))
                    <p><strong>{{$feature['creator']}}</strong></p>
                    @endif
                    @if (isset($feature['description']))
                    <p><em>{{$feature['description']}}</em></p>
                    @endif
                  </div>
                  <div class="text-right">
                      <a href="http://{{$featured[0]['url']}}" class="btn btn-primary" role="button">Link</a>
                  </div>
                </div>
              </div>

      @endforeach


    </div>
  </div>
</div>

</div>
@endsection
