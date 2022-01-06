<div class="container-fluid">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @include('link-style')
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');
                .nav-menu a{
                    color: black;
                    text-decoration: none;
                    margin-left: 10px;
                }


                .logo{
                    font-family: 'Consolas', serif;
                    position: relative;
                    top: -10px;
                    border-radius: 10px;
                }

            </style>

            
            <div class="d-flex justify-content-between">
                <div class='my_link'>
                    @auth
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log out</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
                <div class="logo">
                    <h1><a href="{{ url('/') }}" style="text-decoration: none; color:black">Job Careers NBU</a></h1>
                </div>
                <div class="nav-menu">
                        <a href="{{url('/')}}">Newsfeed</a>
                        <a href="#">Tags</a>
                        <a href="{{url('/search-article')}}">Search</a>
                </div>
            </div>
        </div>
    @endif
</div>