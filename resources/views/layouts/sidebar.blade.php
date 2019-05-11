<div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0; text-align:center">
            <a href="index.html" class="site_title">{{ config('app.name') }}</span></a>
          </div>

          <div class="clearfix"></div>

          @include('layouts.sidebar.profile')

          <br />
          @if (auth()->user()->authorizeDisplay(['editor','manager','director','admin']))
            @include('admin.sidebar.menu') 
          @else
            @include('layouts.sidebar.menu') 
          @endif
          

          {{--@include('layouts.sidebar.footerbuttons')--}}

        </div>
      </div>