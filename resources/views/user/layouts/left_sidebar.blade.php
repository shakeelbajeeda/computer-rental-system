<nav class="side-navbar box-scroll sidebar-scroll" tabindex="1" style="overflow: hidden; outline: none;">
    <!-- Begin Main Navigation -->
    <ul class="list-unstyled">
        <li class="">
            <a href="{{route('user_dashboard')}}"><i class="la la-columns"></i><span>Dashboard</span></a>
        </li>
        <li class="">
            <a href="{{route('edit_profile')}}"><i class="la la-columns"></i><span>Update Profile</span></a>
        </li>
        <li>
            <a href="{{route('my_recharge_history')}}"><i class="la la-list"></i><span>My Recharge History</span></a>
        </li>
        <li>
            <a href="{{route('my_rented_devices')}}"><i class="la la-list"></i><span>My Rented Devices</span></a>
        </li>
        <li class=""><a href="{{route('logout')}}"><i class='la la-unlock'></i><span>Logout</span></a></li>
    </ul>
    <!-- End Main Navigation -->
</nav>
