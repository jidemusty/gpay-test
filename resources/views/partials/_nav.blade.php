<!-- Default Html Navbar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/students">Students</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-na vbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="{{ Request::is('students') ? "active" : "" }}"><a href="/students">Students</a></li>
                        <li class="{{ Request::is('departments') ? "active" : "" }}"><a href="/departments">Departments</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        @if (Auth::check())

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello <strong>{{ Auth::user()->name }}</strong><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </li>

                        @else

                            <a href="{{ route('login') }}" class="btn btn-default" style="margin-top: 7px;">Login</a>

                        @endif

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
