<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{ asset('bower_components/gentelella/production/images/user.png') }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>{{ auth()->user()->name }}</span>
        <h2>
            @if (Auth::user()->authorizeDisplay('user'))
                {{--Auth::user()->hasCustomer()->name--}}
            @endif
        </h2>
    </div>
    <div class="clearfix"></div>
</div>
<!-- /menu profile quick info -->