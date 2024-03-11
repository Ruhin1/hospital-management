This is userr profile
    <li class="nav-item">
          <a class="nav-link active" aria-current="page" href= "{{route('user.dashboard')}}">Admin Dashboard</a>
        </li>
            <li class="nav-item">
          <a class="nav-link active" aria-current="page" href= "{{route('user.profile')}}">Admin Profile</a>
        </li>
            <li class="nav-item">
          <a class="nav-link active" aria-current="page" href= "{{route('user.settings')}}">Admin Setting</a>
        </li>
          
        </li>
 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>