  <nav class="nav-wrapper" style="background-color:#EF6E73;">
  
            <div class="container">
                <a class="center brand-logo" href="{{ url('/') }}">
                   <b class="white-text"> Movie Paradise</b>
                </a>

               <ul id="nav-mobile" class="left hide-on-med-and-down">
                  <li>
                    <a class="white-text" class="nav-link"  href="/movies">Movies</a>
                  </li>
                  <li>
                    <a class="white-text" class="nav-link" href="/stars">Actors</a>
                  </li>
                  <li>
                    <a class="white-text" class="nav-link" href="/directors">Directors</a>
                  </li>
                  <li>
                    <a class="white-text" class="nav-link" href="/about">About</a>
                  </li>
                </ul>

                    <!-- Right Side Of Navbar -->
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a  style="color:#00FFFF;" href="{{ route('login') }}">Login</a></li>
                    <li><a style="color:#00FFFF;" href="{{ route('register') }}">Register</a></li>
                @else
                     <li class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-trigger" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="/mymovies/{{Auth::user()->id}}">My movies</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
</nav>