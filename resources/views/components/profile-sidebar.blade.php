<div class="col-lg-3 mb30">
    <div class="card p-4 rounded-5">
        <div class="profile_avatar">
            <div class="profile_img">
                <img src="{{  asset('front-assets/images/profile/1.jpg')}}" alt="">
            </div>
            <div class="profile_name">
                <h4>
                    Monica Lucas
                    <span class="profile_username text-gray">monica@rentaly.com</span>
                </h4>
            </div>
        </div>
        <div class="spacer-20"></div>
        <ul class="menu-col">
            <li><a href="{{ route('profile.dashboard') }}" class="{{ request()->is('profile/dashboard') ? 'active': '' }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li><a href="{{ route('profile.index') }}" class="{{ request()->is('profile') ? 'active': '' }}"><i class="fa fa-user"></i>My Profile</a></li>
            <li><a href="account-booking.html" class="{{ request()->is('profile/bookings') ? 'active': '' }}"><i class="fa fa-calendar"></i>My Orders</a></li>
            <li><a href="login.html"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
    </div>
</div>
