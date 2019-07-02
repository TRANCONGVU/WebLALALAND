<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <h1><a href="{{ url('admincp') }}">Easy <span>Admin</span></a></h1>
    </div>
    <div class="logo-icon text-center">
        <a href="{{ url('admincp') }}"><i class="lnr lnr-home"></i> </a>
    </div>

    <!--logo and iconic logo end-->
    <div class="left-side-inner">

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            <li style="background-color: white">
                    <ul>
                        <li class="dropdown profile_details_drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <div class="profile_img">
                                    <div class="user-name">
                                        <p>{{ Auth::user()->name }}<span>Administrator</span></p>
                                    </div>
                                    <i class="lnr lnr-chevron-down"></i>
                                    <i class="lnr lnr-chevron-up"></i>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            <ul class="dropdown-menu drp-mnu">

                                <li> <a href="{{ route('admin.auth.logout') }}"><i class="fa fa-sign-out"></i> Logout</a> </li>
                            </ul>
                        </li>
                        <div class="clearfix"> </div>
                    </ul>
            </li>
            <li class="active"><a href="index.html"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>
            <li class="menu-list">
                <a href="#"><i class="lnr lnr-cog"></i>
                    <span>Components</span></a>
                <ul class="sub-menu-list">
                    <li><a href="grids.html">Grids</a> </li>
                    <li><a href="widgets.html">Widgets</a></li>
                </ul>
            </li>
            <li><a href="{{asset('admincp/addslider')}}"><i class="lnr lnr-spell-check"></i> <span>Slider</span></a></li>
            <li><a href="tables.html"><i class="lnr lnr-menu"></i> <span>Tables</span></a></li>
            <li class="menu-list"><a href="#"><i class="lnr lnr-envelope"></i> <span>MailBox</span></a>
                <ul class="sub-menu-list">
                    <li><a href="inbox.html">Inbox</a> </li>
                    <li><a href="compose-mail.html">Compose Mail</a></li>
                </ul>
            </li>
            <li class="menu-list"><a href="#"><i class="lnr lnr-indent-increase"></i> <span>Menu Levels</span></a>
                <ul class="sub-menu-list">
                    <li><a href="charts.html">Basic Charts</a> </li>
                </ul>
            </li>
            <li><a href="codes.html"><i class="lnr lnr-pencil"></i> <span>Typography</span></a></li>
            <li><a href="media.html"><i class="lnr lnr-select"></i> <span>Media Css</span></a></li>
            <li class="menu-list"><a href="#"><i class="lnr lnr-book"></i>  <span>Pages</span></a>
                <ul class="sub-menu-list">
                    <li><a href="sign-in.html">Sign In</a> </li>
                    <li><a href="sign-up.html">Sign Up</a></li>
                    <li><a href="blank_page.html">Blank Page</a></li>
                </ul>
            </li>
        </ul>
        <!--sidebar nav end-->
    </div>
</div>