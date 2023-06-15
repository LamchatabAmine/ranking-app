 <ul class="navbar-nav dashboard-sidebar">
     <li>
         <span id="sidebar-close">
             <i class="la la-times"></i>
         </span>
     </li>
     <li>
         <a class="sidebar-brand" href="{{ route('home-page') }}">
             <img src="{{ url('images/new-logo.png') }}" alt="logo">
         </a>
     </li>
     <li class="sidebar-heading pt-3">Main</li>
     <li class="nav-item {{ request()->is('dashboard*') ? ' active' : '' }}">
         <a class="nav-link" href="{{ route('admin') }}">
             <i class="la la-dashboard font-size-18 mr-1"></i>
             <span>Dashboard</span>
         </a>
     </li>
     <li class="nav-item{{ request()->is('listings*') ? ' active' : '' }}">
         <a class="nav-link" href="{{ route('dashboardListings') }}">
             <i class="la la-file-text-o font-size-18 mr-1"></i>
             <span>listings</span>
         </a>
     </li>
     <li class="nav-item{{ request()->is('addUser*') ? ' active' : '' }}">
         <a class="nav-link" href="{{ route('addUser') }}">
             <i class="las la-user font-size-18 mr-1"></i>
             <span>Add User</span>
         </a>
     </li>
     <li>
         <hr class="sidebar-divider border-top-color">
     </li>
     <li class="sidebar-heading">Account</li>
     <li class="nav-item {{ request()->is('profile*') ? ' active' : '' }}">
         <a class="nav-link" href="{{ route('profile') }}">
             <i class="la la-user font-size-18 mr-1"></i>
             <span>My Profile</span>
         </a>
     </li>
     <form method="POST" action="{{ route('logout') }}" class="nav-item">
         @csrf
         <a class="nav-link" href="{{ route('logout') }}"
             onclick="event.preventDefault(); this.closest('form').submit();">
             <i class="la la-power-off font-size-18 mr-1"></i>
             <span>Logout</span>
         </a>
     </form>
 </ul>
