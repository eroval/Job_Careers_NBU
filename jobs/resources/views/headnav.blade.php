<div class="container-fluid" style="width: 80%;">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @include('link-style')
            <style>
                .nav-menu a{
                    color: black;
                    text-decoration: none;
                    margin-left: 10px;
                }


                .logo{
                    font-family: 'Consolas', serif; 
                    position: relative;
                    border-radius: 10px;
                }

            </style>

                <div class="d-flex justify-content-between align-items-center">
                    <div class='my_link'>
                        @auth
                        @if (Auth::user()->usertype=="CONTRACTOR")
                        <a href="{{ url('/create-jobs') }}">Add Job</a>
                        @endif
                        <a href="{{ route('logout') }}"
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
                            @if(Auth::user()&&Auth::user()->usertype=='CANDIDATE')
                            <a href="{{url('/my-applications')}}">My Applications</a>
                            @endif
                            <a href="{{url('/')}}">Home</a>
                            <a href="{{url('/categories')}}">Categories</a>
                            <a href="{{url('/search-jobs')}}">Search</a>
                    </div>
                </div>
            </div>
    @endif
</div>