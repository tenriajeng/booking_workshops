<header id="header" data-transparent="{{ request()->url() == url('/') ? 'true' : '' }}" data-fullwidth="true"
    class="dark submenu-light">
    <div class="header-inner">
        <div class="container">
            <!--Logo-->
            <div id="logo">
                <a href="{{ url('/') }}">
                    <span class="logo-default">
                        <img height="90" style="padding: 20px" src="{{ secure_asset('asset/logo.png') }}">
                    </span>
                    <span class="logo-dark">
                        <img height="90" style="padding: 20px" src="{{ secure_asset('asset/logo.png') }}">
                    </span>
                </a>
            </div>
            <!--End: Logo-->

            <!--Navigation Resposnive Trigger-->
            <div id="mainMenu-trigger">
                <a class="lines-button x"><span class="lines" style="color: black"></span></a>
            </div>
            <!--end: Navigation Resposnive Trigger-->

            <!--Navigation-->
            <div id="mainMenu">
                <div class="container">
                    <nav>
                        <ul class="text-center sm-m-t-50">
                            @guest
                                <li>
                                    <a href="{{ url('/login') }}">
                                        <button class="btn btn-rounded btn-primary">LOGIN</button>
                                    </a>
                                </li>
                            @else
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ route('user.history') }}">History</a></li>
                                <li><a href="{{ route('book') }}">Book</a></li>
                                <li><a href="{{ route('guestproduct') }}">Product</a></li>
                                <li>
                                    <a href="" class="text-center " style="  font-weight: 600;"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Log out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </nav>
                </div>
            </div>
            <!--end: Navigation-->
        </div>
    </div>
</header>
